<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        
class LoginController {

    //this is accessing the login form
public function login(){
    //we expect a form of ?controller=login&action=login to show the login page
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once('views/login/login.php');
    } else {
        Login::login();
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
            require_once('views/pages/userProfile.php');
        echo "<div class='alert alert-info'>";
        echo "Successfully logged in.";
    echo "</div>";

    }
}

public function Logout() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        Login::logout();
        require_once('views/pages/home.php');
    }
}



public function register() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once('views/login/register.php');
    }
    else {
        Login::create();
        
            require_once('views/pages/home.php');
        //here add a link to the user homepage?
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