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
        //go from here...    
        if ($user['email'] && ($user['username'])) {
            return "The username or email is already regsitered.<br>";
        }
        
        try {
                Login::create();
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
                if(isset($_POST['username'])&& $_POST['username']!="") {
        $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }  
    $username = $filteredUsername;
        $login= Login::login($username);
          /*if($role->role_id==1) {
             require_once('../views/pages/admin.php');  
             echo "<div class='alert alert-info'>";
             echo "Successfully logged in.";
             echo "</div>";
            } elseif ($role->role_id==2) {
                require_once('../views/pages/userProfile.php');
                echo "<div class='alert alert-info'>";
                echo "Successfully logged in.";
                echo "</div>";
            }
         else{
                   $access_denied=true;
            }*/
        
        if ($login){  
            Login::setSession($login);
            require_once('views/pages/userProfile.php');
            print_r($_SESSION);
           // print_r($list);
        //echo "<div class='alert alert-info'>";
        //echo "Successfully logged in.";
    //echo "</div>";
}
    }
}

public function getLogout() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        Login::logout();
        require_once('views/pages/home.php');
    }
}



public function editProfile() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!isset($_GET['id']))
        return call('pages', 'error');
        Login::update();
    }
}
}