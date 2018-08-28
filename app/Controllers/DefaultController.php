<?php

namespace App;

use App\core\View;
use App\Models\Users;

class DefaultController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {

        $user = Users::loggedUser();

        echo "<pre>";
        print_r($user);
        die();

        return $this->view->render('index', []);
    }
}