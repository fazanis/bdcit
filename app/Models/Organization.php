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
        $select = "SELECT
        orobrazovania.id,
        orobrazovania.id_org,
        orobrazovania.password,
        orobrazovania.name_ru,
        orobrazovania.name_kz,
        raioni.name AS name_raion,
        type.name AS name_type
        FROM orobrazovania  LEFT JOIN raioni ON orobrazovania.raion = raioni.id
        LEFT JOIN type_org AS type ON orobrazovania.type=type.id ORDER BY id DESC";
        $result = $db->prepare($select);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getOneOrgById($id){
        $db=DB::Connection();
        $select = "SELECT * FROM orobrazovania WHERE id=:id";
        $result = $db->prepare($select);
        $result->bindParam(':id',$id,\PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    public function createOrganization($data){
        $db=DB::Connection();
        $insert = "INSERT INTO orobrazovania (id_org,raion,name_ru,name_kz,type,password) VALUES (:id_org,:raion,:name_ru,:name_kz,:type,:password)";
        $result = $db->prepare($insert);
        $result->bindParam(':id_org',$data['id_org'],\PDO::PARAM_INT);
        $result->bindParam(':raion',$data['raion'],\PDO::PARAM_INT);
        $result->bindParam(':name_ru',$data['name_ru'],\PDO::PARAM_STR);
        $result->bindParam(':name_kz',$data['name_kz'],\PDO::PARAM_STR);
        $result->bindParam(':type',$data['type'],\PDO::PARAM_INT);
        $result->bindParam(':password',$data['password'],\PDO::PARAM_STR);
        return $result->execute();

    }

    public function editOrganization($id,$data){
        $db=DB::Connection();
        $update = "UPDATE orobrazovania SET id_org=:id_org, raion=:raion,name_ru=:name_ru,name_kz=:name_kz,type=:type,password=:password WHERE id = :id";
        $result = $db->prepare($update);
        $result->bindParam(':id',$id,\PDO::PARAM_INT);
        $result->bindParam(':id_org',$data['id_org'],\PDO::PARAM_STR);
        $result->bindParam(':raion',$data['raion'],\PDO::PARAM_STR);
        $result->bindParam(':name_ru',$data['name_ru'],\PDO::PARAM_STR);
        $result->bindParam(':name_kz',$data['name_kz'],\PDO::PARAM_STR);
        $result->bindParam(':type',$data['type'],\PDO::PARAM_INT);
        $result->bindParam(':password',$data['password'],\PDO::PARAM_INT);
        $result->execute();
    }
}