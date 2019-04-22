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
   // public $active;
    
    public function __construct($username, $email, $password, $role) {
        
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role_id = $role;

    }
    

   
    
    public static function create() {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO user(role_id, email, password, username, active) VALUES (:role_id, :email, :password, :username, :active)");
        $req->bindParam(':role_id', $role);
        $req->bindParam(':email', $email);
        $req->bindParam (':password', $password);
        $req->bindParam (':username', $username);
        $req->bindParam (':active', $active);  
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
$active = '1';
$req->execute();
echo "<div class='alert alert-info'>";
        echo "Successfully registered. <a href='?controller=login&action=login'>Please login</a>.";
    echo "</div>";
    }
    
    
    


    public static function login($username) {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * from user WHERE username=:username");

        //$req->bindParam (':username', $username);
        $req->execute(array('username'=>$username));
        $user = $req->fetch ();
        if ($user) {
            return new Login($user['username'], $user['password'], $user['email'], $user['role_id']);
            
        // Validate credentials
                 //if (password_verify($_POST['password'], $user['password'])){
                    
                     // Password is correct, so start a new session
                            
    }else{
        throw new Exception('The email or passowrd is incorrect.');
    }
    }
                        

    Public static function setSession($login){
        //login is verified, so start a new session

                                 $_SESSION["loggedin"] = true;
                                $_SESSION["username"] = $_POST ['username']; 
                                $_SESSION["role_id"] = $login->role_id;
                                
    }
    
    
    
    public static function logout() {
        $_SESSION = array();
        session_destroy();
        require_once('views/pages/home.php');
    }
    
    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update user set email=:email, password=:password, username=:username, active=:active where ID=:id");
        $req->bindParam(':email', $email);
        $req->bindParam (':password', $password);
        $req->bindParam (':username', $username);
        $req->bindParam (':active', $active);
    
// set parameters and execute
    if(isset($_POST['email'])&& $_POST['email']!=""){
        $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }
    if(isset($_POST['username'])&& $_POST['username']!=""){
        $filteredUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['password'])&& $_POST['password']!=""){
        $filteredPassword = filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$email = $filteredEmail;
$username = $filteredUsername;
$password = $filteredPassword;
$active = '1'; //default boolean value means account is active
$req->execute();
    }
    
    //maybe change the variable below to username rather than id
    public static function delete($id) {
        $db = Db::getInstance();
      //make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('delete FROM user WHERE ID = :id');
      // the query was prepared, now replace :id with the actual $id value
      $req->execute(array('id' => $id));
    }
}