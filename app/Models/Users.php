<?php
namespace App\Models;
use App\Core\DB;

class Users
{
   public function loggedUser(){
       if($_SESSION['user']){
           return $_SESSION['user'];
       }
       header('Location: /login');
   }

   public function userSingin($login,$password){
       $db = DB::Connection();

       $select = 'SELECT * FROM user WHERE login = :login and password = :password';
       $result = $db->prepare($select);
       $result->bindParam(':login',$login, \PDO::PARAM_STR);
       $result->bindParam(':password',$password, \PDO::PARAM_STR);
       $result->execute();

       $user = $result->fetch(\PDO::FETCH_ASSOC);
       if($user){
           $_SESSION['user'] = $user['id'];
           return $user['id'];
       }
   }

   public function getOneUser($id){
       $db = DB::Connection();

       $select = 'Select * FROM user WHERE id=:id';
       $result = $db->prepare($select);
       $result->bindParam(':id',$id,\PDO::PARAM_STR);
       $result->execute();

       $user = $result->fetch(\PDO::FETCH_ASSOC);

       return $user;
   }

}