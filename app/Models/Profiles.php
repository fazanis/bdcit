<?php


namespace App\Models;


use App\Core\DB;

class Profiles
{
    public function getMyProfiles($id){
        $db = DB::Connection();
        if($id[1]=='login') {
            $select = 'SELECT * FROM user WHERE id=:id';
        }elseif($id[1]=='id'){
            $select = 'SELECT *,id_org AS login FROM orobrazovania WHERE id=:id';
        }
        $result = $db->prepare($select);
        $result->bindParam(':id',$id[0],\PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(\PDO::FETCH_ASSOC);

    }

}