<?php
namespace App;
use App\DefaultController;
use App\Core\View;
use App\Models\Users;
class LoginController extends DefaultController
{
    public function actionIndex(){

        return $this->view->render('index',[]);
    }

    public function actionUser(){
        return $this->view->render('user',[]);
    }
}