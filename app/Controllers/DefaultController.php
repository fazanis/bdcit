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

        $users = new Users();
        $user = $users->loggedUser();
        $username = $users->getOneUser($user);

        $title = 'Главная страница администрирования';
        return $this->view->render('index', [
            'title' => $title,
            'username' => $username['name'],
            'access' => $username['access'],
        ]);
    }
    
}