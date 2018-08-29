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

   public static function getOneUser($id){
       $db = DB::Connection();

       $select = 'Select * FROM user WHERE id=:id';
       $result = $db->prepare($select);
       $result->bindParam(':id',$id,\PDO::PARAM_STR);
       $result->execute();

       $user = $result->fetch(\PDO::FETCH_ASSOC);

       return $user;
   }

   public function getAllUser(){
       $db = DB::Connection();

       $select = 'Select * FROM user';
       $result = $db->prepare($select);
       $result->bindParam(':id',$id,\PDO::PARAM_STR);
       $result->execute();
        $i = 1;
//       $user = $result->fetch(\PDO::FETCH_ASSOC);
       while ($row = $result->fetch(\PDO::FETCH_ASSOC)){
           $user[$i] = $row;
           $i++;
       }

       return $user;
   }

   public function createUser(array $data){
       $db = DB::Connection();
       $insert = "INSERT INTO user (name,email,login,password,access) VALUES (:name2,:email,:login,:password,:access)";
       $result = $db->prepare($insert);
       $result->bindParam(':name2',$data['name'],\PDO::PARAM_STR);
       $result->bindParam(':email',$data['email'],\PDO::PARAM_STR);
       $result->bindParam(':login',$data['login'],\PDO::PARAM_STR);
       $result->bindParam(':password',$data['password'],\PDO::PARAM_STR);
       $result->bindParam(':access',$data['access'],\PDO::PARAM_INT);
       $result->execute();
   }
}