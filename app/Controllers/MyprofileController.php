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

        $users = new Users();
        $user = $users->loggedUser();
        $test = $users->takePespondentData($user[0],$user[1]);
        if($test==true) {
            $alt = 'Необходимо заполнить личные данные';
        }

        return $this->view->render('index',[
            'title'=>$title,
            'myProfile'=>$myProfie,
            'alt'=>$alt,
        ]);
    }

    public function actionEdit(){

        $title = 'Редактирование профиля пользователя';

        $user_id = $_SESSION['user'];
        $userClass = new Users();
        $user=$userClass->getOneUser($user_id[0],$user_id[1]);

        if($_POST['saveuser']){
            $userClass->updateProfile($user_id,$_POST);
            header('Location: /myprofile/');
        }

        return $this->view->render('edit',[
            'title'=>$title,
            'user'=>$user,
        ]);
    }
}