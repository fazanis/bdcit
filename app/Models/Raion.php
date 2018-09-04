<?php


namespace App\Models;


use App\Core\DB;

class Raion
{
    public function getAllRaion(){
        $db = DB::Connection();
        $select = "SELECT * FROM raioni WHERE id!=1";
        $result = $db->prepare($select);
        $result->execute();

        $i=1;
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $raionList[$i] = $row;
            $i++;
        }
        return $raionList;

    }

    public function createRaion($data){
        $db = DB::Connection();

        $insert = "INSERT INTO raioni (name) VALUES (:name)";
        $result = $db->prepare($insert);
        $result->bindParam(':name',$data['name']);
        $result->execute();
    }

    public static function getNameSitiById($id){
        $db = DB::Connection();
        $select = 'SELECT * FROM raioni WHERE id=:id';
        $result = $db->prepare($select);
        $result->bindParam('id',$id,\PDO::PARAM_INT);
        $result ->execute();
        $siti = $result->fetch(\PDO::FETCH_ASSOC);
        return $siti['name'];
    }

    public function editRaion($id,$data){
        $db = DB::Connection();

        $insert = "UPDATE raioni SET name=:name WHERE id = :id";
        $result = $db->prepare($insert);
        $result->bindParam(':id',$id);
        $result->bindParam(':name',$data['name']);
        $result->execute();

        header('Location: /raion/');
    }

    public function getOneRaionById($id){
        $db = DB::Connection();

        $select = "SELECT * FROM raioni WHERE id = :id";
        $result = $db->prepare($select);
        $result->bindParam(':id',$id,\PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(\PDO::FETCH_ASSOC);

    }

    public static function getCollRaion(){
        $db = DB::Connection();
        $select = "SELECT COUNT(*) FROM raioni WHERE id!=1";
        $result = $db->prepare($select);
        $result->execute();
        $coll = $result->fetch();
        return $coll[0];
    }

    public function dropRaionById($id){
        $db = DB::Connection();

        $drop = "DELETE FROM raioni WHERE id = :id";
        $rezult = $db->prepare($drop);
        $rezult->bindParam(':id',$id,\PDO::PARAM_INT);
        $rezult->execute();
        header('Location: /raion/');
    }
}