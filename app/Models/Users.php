<?php
namespace App\Models;
use App\Core\DB;

class Users
{
    // Авторизация пользователя

   public function loggedUser(){
       if($_SESSION['user']){
           return $_SESSION['user'];
       }
       header('Location: /login');
   }

   //Проверка логина и пароля после авторизации
   public function userSingin($login,$password){
       $db = DB::Connection();

       $select = 'SELECT * FROM user WHERE login = :login';
       $result = $db->prepare($select);
       $result->bindParam(':login',$login, \PDO::PARAM_STR);
       $result->execute();
       $user = $result->fetch(\PDO::FETCH_ASSOC);
       if(password_verify($password,$user['password'])){
           $_SESSION['user'] = $user['id'];
           return $user['id'];
       }

   }

    public function userSinginById($id_org,$password){
        $db = DB::Connection();
        $select = 'SELECT * FROM orobrazovania WHERE id_org = :id_org';
        $result = $db->prepare($select);
        $result->bindParam(':id_org',$id_org, \PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch(\PDO::FETCH_ASSOC);
        if(password_verify($password,$user['password'])){
            $_SESSION['user'] = $user['id'];
            return $user['id'];
        }

    }

   // Получение прав пользователя
   public static function getUserAccess(){
       $db = DB::Connection();
       $id = $_SESSION['user'];
       $select = 'SELECT * FROM user WHERE id = :id';
       $result = $db->prepare($select);
       $result->bindParam(':id',$id, \PDO::PARAM_STR);
       $result->execute();
       $user = $result->fetch(\PDO::FETCH_ASSOC);
       return $user;
   }
   public static function getRoleUser(){
       $role_id = self::getUserAccess()['access'];
       $db = DB::Connection();
       $select = 'SELECT * FROM role WHERE id = :role_id';
       $result = $db->prepare($select);
       $result->bindParam(':role_id',$role_id, \PDO::PARAM_STR);
       $result->execute();
       $user = $result->fetch(\PDO::FETCH_ASSOC);
       return $user;
   }

   //Получение данных одного пользователя по id
   public function getOneUser($id){
       $db = DB::Connection();
       $select = 'SELECT * FROM user WHERE id=:id';
       $result = $db->prepare($select);
       $result->bindParam(':id',$id,\PDO::PARAM_STR);
       $result->execute();

       $user = $result->fetch(\PDO::FETCH_ASSOC);

       return $user;
   }

   //Получение списка пользователей
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

   //Добавление пользователей
   public function createUser(array $data){
       $db = DB::Connection();

       $insert = "INSERT INTO user (fio,name,email,phone,login,password,access) VALUES (:fio,:name,:email,:phone,:login,:password,:access)";
       $result = $db->prepare($insert);
       $result->bindParam(':fio',$data['fio'],\PDO::PARAM_STR);
       $result->bindParam(':name',$data['name'],\PDO::PARAM_STR);
       $result->bindParam(':email',$data['email'],\PDO::PARAM_STR);
       $result->bindParam(':phone',$data['phone'],\PDO::PARAM_STR);
       $result->bindParam(':login',$data['login'],\PDO::PARAM_STR);
       $result->bindParam(':password',password_hash($data['password'],PASSWORD_DEFAULT),\PDO::PARAM_STR);
       $result->bindParam(':access',$data['access'],\PDO::PARAM_INT);
       $result->execute();
   }

   // Изменение пользователей
   public function updateUser($id,array $data){
       $db = DB::Connection();

       if($data['password']==''){
           $update = "UPDATE user SET fio=:fio, name=:name,email=:email,phone=:phone,login=:login,access=:access WHERE id = :id";
           $result = $db->prepare($update);
           $result->bindParam(':id',$id,\PDO::PARAM_INT);
           $result->bindParam(':name',$data['name'],\PDO::PARAM_STR);
           $result->bindParam(':fio',$data['fio'],\PDO::PARAM_STR);
           $result->bindParam(':email',$data['email'],\PDO::PARAM_STR);
           $result->bindParam(':phone',$data['phone'],\PDO::PARAM_STR);
           $result->bindParam(':login',$data['login'],\PDO::PARAM_STR);
           $result->bindParam(':access',$data['access'],\PDO::PARAM_INT);
       }else {
           $update = "UPDATE user SET fio=:fio, name=:name,email=:email,phone=:phone ,login=:login,password=:password,access=:access WHERE id = :id";
           $result = $db->prepare($update);
           $result->bindParam(':id',$id,\PDO::PARAM_INT);
           $result->bindParam(':name',$data['name'],\PDO::PARAM_STR);
           $result->bindParam(':fio',$data['fio'],\PDO::PARAM_STR);
           $result->bindParam(':email',$data['email'],\PDO::PARAM_STR);
           $result->bindParam(':phone',$data['phone'],\PDO::PARAM_STR);
           $result->bindParam(':login',$data['login'],\PDO::PARAM_STR);
           $result->bindParam(':password', password_hash($data['password'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
           $result->bindParam(':access', $data['access'], \PDO::PARAM_INT);
       }
       $result->execute();

       header('Location: /user/');

   }

   public function dropUser($id){
        $db = DB::Connection();

        $drop = "DELETE FROM user WHERE id = :id";
        $rezult = $db->prepare($drop);
        $rezult->bindParam(':id',$id,\PDO::PARAM_INT);
        $rezult->execute();
        header('Location: /user/');
   }

   //Получение общего числа пользователей
   public static function getCollParam(){
       $db = DB::Connection();
       $select = "SELECT COUNT(*) FROM user";
       $result = $db->prepare($select);
       $result->execute();
       $coll = $result->fetch();
       return $coll[0];
   }
}