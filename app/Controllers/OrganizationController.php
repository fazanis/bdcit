<?php

namespace App;

use App\Models\Organization;
use App\Models\Raion;
use App\Models\Users;



class OrganizationController extends DefaultController
{

    public function actionIndex()
    {
        self::rangUser();
        $title = 'Организации образования';

        $org = new Organization();
        $orgs = $org->getAllOrganization();

        return $this->view->render('index',[
            'title'=>$title,
            'orgs'=>$orgs,
        ]);
    }

    public function actionCreate()
    {
        self::rangUser();
        $title = 'Добавление организации образования';
        $type = new Organization();
        $types = $type->getAllType();

        $raion = new Raion();
        $raiones = $raion->getAllRaion();

        if($_POST['saveorg']){
            $type->createOrganization($_POST);
            header('Location: /organization/');
        }
        return $this->view->render('create',[
            'title'=>$title,
            'types'=>$types,
            'raiones'=>$raiones,
        ]);
    }

    public function rangUser(){
        if (Users::getRoleUser()['role']!='admin'){
            header('Location: /');
            exit();
        }
    }

}