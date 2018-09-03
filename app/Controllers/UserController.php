<?php

namespace App;


use App\Models\Siti;
use App\Models\Users;

class UserController extends DefaultController
{
    public function actionIndex(){

        self::rangUser();

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
        self::rangUser();
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

    public function actionEdit($id){
        self::rangUser();
        $userList=new Users();
        $user = $userList->getOneUser($id);
        $sities = new Siti();
        $siti = $sities->getCiti();

        if($_POST['saveuser']){
            $user = new Users();
            $user->updateUser($id,$_POST);
        }
        return $this->view->render('edit',[
            'user'=>$user,
            'siti'=>$siti,
            ]);
    }

    public function actionDrop($id){
        self::rangUser();
        $user= new Users();
        $user->dropUser($id);
    }

    public function rangUser(){
        if (Users::getUserAccess()['access']!=1){
            echo 'Ваши права ограничены!';
            exit();
        }
    }
}