<?php


namespace App\Models;


use App\Core\DB;

class Siti
{
    public function getCiti(){
        $db = DB::Connection();

        $select = 'SELECT * FROM raioni';
        $result = $db->prepare($select);
        $result ->execute();
        $i=1;
        while($row = $result->fetch(\PDO::FETCH_ASSOC)){
            $siti[$i] = $row;
            $i++;
        }
        return $siti;
    }

    public static function getSitiById($id){
        $db = DB::Connection();

        $select = 'SELECT * FROM raioni WHERE id=:id';
        $result = $db->prepare($select);
        $result->bindParam('id',$id,\PDO::PARAM_INT);
        $result ->execute();
        $siti = $result->fetch(\PDO::FETCH_ASSOC);

        return $siti['name'];
    }
}