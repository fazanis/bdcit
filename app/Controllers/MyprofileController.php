<?php


namespace App;


use App\Models\Profiles;
use App\Models\Users;

class MyprofileController extends DefaultController
{

    public function actionIndex(){

        $title='Ваш профиль';
        $user_id = $_SESSION['user'];
        $profil = new Profiles();
        $myProfie = $profil->getMyProfiles($user_id);
        return $this->view->render('index',[
            'title'=>$title,
            'myProfile'=>$myProfie,
        ]);
    }

    public function actionEdit(){

        $title = 'Редактирование профиля пользователя';

        $user_id = $_SESSION['user'];
        $userClass = new Users();
        $user=$userClass->getOneUser($user_id);

        if($_POST['saveuser']){
            $userClass->updateUser($user_id,$_POST);
            header('Location: /myprofile/');
        }

        return $this->view->render('edit',[
            'title'=>$title,
            'user'=>$user,
        ]);
    }
}