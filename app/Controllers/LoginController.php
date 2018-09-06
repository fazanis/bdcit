<?php
namespace App;
use App\DefaultController;
use App\Core\View;
use App\Models\Users;
class LoginController extends DefaultController
{
    public function actionIndex(){
        $title = 'Компьютерный парк организаций образования Павлодарской области';
        $errors = false;
        $user = new Users();
        if(isset($_POST['butpost'])){
            if($_POST['login']) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $userId = $user->userSingin($login, $password);
            }elseif($_POST['id']){
                $id = $_POST['id'];
                $password = $_POST['password'];
                $userId = $user->userSinginById($id, $password);
            }
            if($userId==false){
                $errors[] = 'Введены не верные данные';
            }else{
                header("Location: /");
            }
        }
            return $this->view->render('index', [
                'errors'=> $errors,
                'title'=>$title,
            ]);

    }

    public function actionLogout(){
        $_SESSION['user'] = '';
        header('Location: /');
    }

    public function actionUser(){
        return $this->view->render('user',[]);
    }
}