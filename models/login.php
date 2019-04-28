<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login {
    public $id;
    public $username;
    public $email;
    public $password;
    public $role_id;
    
    public function __construct($id, $username, $email, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role_id = $role;
    }
    
    //check if a given email already exists in the db
    public static function findUser($email){
      
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * from user WHERE email=:email OR username=:username");
        
    if(isset($_POST['email'])&& $_POST['email']!="") {
        $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }
    if(isset($_POST['username'])&& $_POST['username']!="") {
        $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }  
    $email = $filteredEmail;
    $username = $filteredUsername;
    $req->execute(array('email' => $email,
                    'username' => $username));
    $user = $req->fetch();
    if($user['email'] || ($user['username'])) {
        echo "Username or email is already registered. <br>Please try again or log in.<br>" ;
    } else {
        return false;
    }
    }
    
    public static function getUser($username) {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM user WHERE username =:username');
        $req->execute(array('username'=>$username));
        $user = $req->fetch();
        
        if($user) {
            return new Login($user['id'],$user['username'], $user['email'], $user['password'], $user['role_id']);
        } else {
            throw new Exception('User not found.');
        }
    }
    
    public static function create() {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO user(id, role_id, email, password, username) VALUES (:id, :role_id, :email, :password, :username)");
        $req->bindParam(':id', $id);
        $req->bindParam(':role_id', $role);
        $req->bindParam(':email', $email);
        $req->bindParam (':password', $password);
        $req->bindParam (':username', $username);  
        
     
// set parameters and execute
    if(isset($_POST['email'])&& $_POST['email']!="")
        {$filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);}
    if(isset($_POST['password'])&& $_POST['password']!="")
        {$filteredPassword = filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS);}
    if(isset($_POST['username'])&& $_POST['username']!="")
        {$filteredUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_SPECIAL_CHARS);}
$role = '2';    
$email = $filteredEmail;
$username = $filteredUsername;
$password = $filteredPassword;
$req->execute();
    }
    
    public static function login($username, $password, $email) {
        
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * from user WHERE username=:username AND password=:password AND email=:email");
    
    if(isset($_POST['password'])&& $_POST['password']!="") {
        $filteredPassword = filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['username'])&& $_POST['username']!="") {
        $filteredUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['email'])&& $_POST['email']!="") {
        $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    }
    $username = $filteredUsername;
    $password = $filteredPassword;
    $email = $filteredEmail;
        $req->execute(array('username'=>$username,
                            'password'=>$password,
                            'email'=>$email));
        $user = $req->fetch ();
        if (!$user) {
            die('User not found. Please check your credentials and try again.');
        } else {
            return new Login($user['id'], $user['username'], $user['password'], $user['email'], $user['role_id']);
        }
    }
                        
    Public static function setSession($login){
        //login is verified, so start a new session

                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $_POST ['username']; 
                                $_SESSION['role_id'] = $login->role_id;
                                
                                
    }
    
    public static function logout() {
        session_destroy();
    }
    
      
    
    public static function update($username) {
        $db = Db::getInstance();

        $req = $db->prepare("Update user set username=:username, email=:email, password=:password, role_id=:role_id where username=:username");
        $req->bindParam (':username', $username);
        $req->bindParam(':email', $email);
        $req->bindParam (':password', $password);
        $req->bindParam(':role_id', $role);
    
// set parameters and execute
    if(isset($_POST['username'])&& $_POST['username']!=""){
        $filteredUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['email'])&& $_POST['email']!=""){
        $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }
    if(isset($_POST['password'])&& $_POST['password']!=""){
        $filteredPassword = filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$role = '2';
$email = $filteredEmail;
$username = $filteredUsername;
$password = $filteredPassword;
$req->execute(array('username'=>$username,
                    'email'=>$email,
                    'password'=>$password,
                    'role_id'=>$role));


        if (!empty($_FILES[self::InputKey]['name'])) {
        Login::uploadFile($username);
        }
}

const AllowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $username) {

        if (empty($_FILES[self::InputKey])) {
            //die("File Missing!");
            trigger_error("File Missing!");
        }

        if ($_FILES[self::InputKey]['error'] > 0) {
            trigger_error("Handle the error! " . $_FILES[self::InputKey]['error']);
        }


        if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
            trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
        }
//changed the $path location  - implfied it to only views/images/
        $tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = "views/images/profiles/";
        $destinationFile = $path . $username . '.jpeg';

        if (!move_uploaded_file($tempFile, $destinationFile)) {
            trigger_error("Handle Error");
        }

        //Clean up the temp file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }
    }
    
    
    //maybe change the variable below to username rather than id
    public static function delete($id) {
        $db = Db::getInstance();
      //make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare("delete FROM user WHERE id = :id");
      // the query was prepared, now replace :id with the actual $id value
      $req->execute(array('id'=>$id));
    }
}