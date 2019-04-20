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
    public $active;
    
    public function __construct($id, $username, $email, $password, $role, $active) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role_id = $role;
        $this->active = $active;
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
    if($user['email'] && ($user['username'])) {
        echo "Username or email is already registered. <br>Please try again or log in.<br>" ;
    } else {
        return false;
    }
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
    }
    
    public static function login() {
        if($_POST) {
            $db = Db::getInstance();
            $login = new Login ($db);
            //check if email and password are in the db
            $login->email = $_POST['email'];
            $email_exists = $login->emailExists();
            }
        if ($email_exists && password_verify($_POST['password'], $login->password) && $login->active==1){
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $login->id;
            $_SESSION['role_id'] = $login->role_id;
            $_SESSION['username'] = htmlspecialchars($login->username, ENT_QUOTES, 'UTF-8');
            //if role id is admin then redirect to Admin page
            if($login->role_id=='admin') {
             require_once('views/pages/admin.php');   
            } else {
                require_once('views/pages/home.php');
            }
        } else {
            //if username does not exist or password is wrong
            echo "Username or password is incorrect. Please try again.";
        }
    }
    
    public static function logout($id) {
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