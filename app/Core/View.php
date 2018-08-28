<?php


namespace App\Core;



class View
{
    public function render(string $filename, array $data){
        extract($data);
        $folder = explode('/',$_SERVER['REQUEST_URI']);

        if (empty($folder[1])){
            $folder = 'main';
        }else{
            $folder = $folder[1];
        }

        require_once __DIR__.'/../Views/'.$folder.'/'.$filename.'.php';
    }

}