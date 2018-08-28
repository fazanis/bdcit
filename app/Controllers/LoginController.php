<?php
namespace App;
use App\DefaultController;
use App\Core\View;
use App\Models\Users;
class LoginController extends DefaultController
{
    public function actionIndex(){
        $errors = false;
        if(isset($_POST['butpost'])){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = new Users();
            $userId= $user->userSingin($login,$password);

            if($userId==false){
                $errors[] = 'Введены не верные данные';
            }else{
                header("Location: /");
            }
        }
            return $this->view->render('index', [
                'errors'=> $errors,
            ]);

    }

    public function actionUser(){
        return $this->view->render('user',[]);
    }
}