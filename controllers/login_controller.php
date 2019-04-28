<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        
class LoginController {
    
    public function register() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once('views/login/register.php');
    }
    else {
        $user = Login::findUser($_POST['email']);   
        if ($user['email'] && ($user['username'])) {
            return "The username or email is already registered.<br>";
        }
         $validEmail = $_POST['email'];  
        if (!filter_var($validEmail, FILTER_VALIDATE_EMAIL)) {
          return "Invalid email format";
            call('pages', 'error');
        }
        
        try {
                Login::create();
                $user = Login::getUser($_POST['username']);
                echo "<div class='alert alert-info'>";
                 echo "Thanks for registering!";
                 echo "</div>";
                require_once('views/login/userProfile.php');
                 
        }catch (Exception $ex) {
            return call('pages','error');
        }
    }
    }
        
    //this is accessing the login form
public function login(){
    //we expect a form of ?controller=login&action=login to show the login page
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once('views/login/login.php');
    } else {
               /* if(isset($_POST['username'])&& $_POST['username']!="") {
        $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }  
    $username = $filteredUsername;*/
        $login= Login::login($_POST['username'], $_POST['password'], $_POST['email']);
      
        if ($login){  
           Login::setSession($login);
           $user = Login::getUser($_POST['username']);
            require_once('views/login/userProfile.php');
        //echo "<div class='alert alert-info'>";
        //echo "Successfully logged in.";
    //echo "</div>";
}
    }
}

public function logout() {

    //if($_SERVER['REQUEST_METHOD'] == 'GET') {
        Login::logout();
        require_once('views/login/logout.php');
    }


public function userProfile() {
        if(!isset($_SESSION['username']))
             return call('pages','error');
    
        try {
         $user = Login::getUser($_SESSION['username']);
        
        require_once('views/login/userProfile.php');
    } 
    catch (Exception $ex){
        return call('pages','error');
    }
}


public function editProfile() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
         if(!isset($_SESSION['username'])) 
             return call('pages','error');
         
         $user = Login::getUser($_SESSION['username']);
         
         require_once('views/login/editProfile.php');
        } 
    else 
        {
        $username = $_SESSION['username'];
        Login::update($username);
        
        $user = Login::getUser($username);
        require_once('views/login/userProfile.php');
    }
}

 public function deleteUser() {
            Login::delete($_GET['id']);
            Login::logout();
            require_once('views/login/logout.php');
        } 
}
