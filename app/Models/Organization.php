<?php


namespace App\Models;


use App\Core\DB;

class Organization
{

    public function getAllType(){
        $db=DB::Connection();
        $select = "SELECT * FROM type_org";
        $result = $db->prepare($select);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllOrganization(){
        $db=DB::Connection();
        $select = "SELECT * FROM orobrazovania";
        $result = $db->prepare($select);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createOrganization($data){
        $db=DB::Connection();
        $insert = "INSERT INTO orobrazovania (id_org,raion,name_ru,name_kz,type,password) VALUE (:id_org,:raion,:name_ru,:name_kz,:type,:password)";
        $result = $db->prepare($insert);
        $result->bindParam(':id_org',$data['id_org'],\PDO::PARAM_INT);
        $result->bindParam(':raion',$data['raion'],\PDO::PARAM_INT);
        $result->bindParam(':name_ru',$data['name_ru'],\PDO::PARAM_STR);
        $result->bindParam(':name_kz',$data['name_kz'],\PDO::PARAM_STR);
        $result->bindParam(':type',$data['type'],\PDO::PARAM_INT);
        $result->bindParam(':password',$data['password'],\PDO::PARAM_STR);
        $result->execute();
    }
}