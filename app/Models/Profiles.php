<?php


namespace App\Models;


use App\Core\DB;

class Profiles
{
    public function getMyProfiles($id){
        $db = DB::Connection();

        $select = 'SELECT * FROM user WHERE id=:id';
        $result = $db->prepare($select);
        $result->bindParam(':id',$id,\PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(\PDO::FETCH_ASSOC);

    }

}