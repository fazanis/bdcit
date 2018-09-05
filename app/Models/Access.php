<?php


namespace App\Models;


use App\Core\DB;

class Access
{
    public static function getRoleById($id){
        $db = DB::Connection();
        $select = 'SELECT * FROM role WHERE id=:id';
        $result = $db->prepare($select);
        $result->bindParam('id',$id,\PDO::PARAM_INT);
        $result ->execute();
        $siti = $result->fetch(\PDO::FETCH_ASSOC);
        return $siti['name'];
    }
    public function getAllRole(){
        $db = DB::Connection();
        $select = "SELECT * FROM role";
        $result = $db->prepare($select);
        $result->execute();

        $i=1;
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $roleList[$i] = $row;
            $i++;
        }
        return $roleList;

    }
}