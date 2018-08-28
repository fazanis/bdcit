<?php
namespace App\Models;
class Users
{
   static function loggedUser(){
       if($_SESSION['user']){
           return $_SESSION['user'];
       }
       header('Location: /login');
   }

}