<?php

namespace App;


use App\Models\Access;
use App\Models\Raion;
use App\Models\Users;

class UserController extends DefaultController
{
    public function actionIndex(){

        self::rangUser();

        $title = 'Управление пользователями';
        $users = new Users();
        $userlist = $users->getAllUser();
        $sities = new Raion();
        $siti = $sities->getAllRaion();
        return $this->view->render('index',[
            'title'=>$title,
            'userlist' => $userlist,
            'siti'=>$siti,
        ]);
    }

    public function actionCreate(){
        self::rangUser();
        $title = 'Добавление пользователя';
        $role = new Access();
        $roles = $role->getAllRole();
        if($_POST['saveuser']){
            $user = new Users();
            $user->createUser($_POST);
            header('Location: /user/');
        }

        return $this->view->render('create',[
            'title'=>$title,
            'roles'=>$roles,
        ]);
    }

    public function actionEdit($id){
        self::rangUser();
        $userList=new Users();
        $user = $userList->getOneUser($id);
        $role = new Access();
        $roles = $role->getAllRole();

        if($_POST['saveuser']){
            $user = new Users();
            $user->updateUser($id,$_POST);
        }
        return $this->view->render('edit',[
            'user'=>$user,
            'roles'=>$roles,
            ]);
    }

    public function actionDrop($id){
        self::rangUser();
        $user= new Users();
        $user->dropUser($id);
    }

    public function rangUser(){
        if (Users::getRoleUser()['role']!='admin'){
            header('Location: /');
            exit();
        }
    }
}