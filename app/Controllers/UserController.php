<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.08.2018
 * Time: 10:14
 */

namespace App;


use App\Models\Siti;
use App\Models\Users;

class UserController extends DefaultController
{
    public function actionIndex(){
        $title = 'Управление пользователями';
        $users = new Users();
        $userlist = $users->getAllUser();
        $sities = new Siti();
        $siti = $sities->getCiti();
        return $this->view->render('index',[
            'title'=>$title,
            'userlist' => $userlist,
            'siti'=>$siti,
        ]);
    }

    public function actionCreate(){
        $title = 'Добавление пользователя';
        $sities = new Siti();
        $siti = $sities->getCiti();
        if($_POST['saveuser']){
            $user = new Users();
            $user->createUser($_POST);
        }

        return $this->view->render('create',[
            'title'=>$title,
            'siti'=>$siti,
        ]);
    }

    public function actionEdit(){
        return $this->view->render('edit',[]);
    }

}