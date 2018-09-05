<?php


namespace App;


use App\Models\Raion;
use App\Models\Users;
class RaionController extends DefaultController
{

    public function actionIndex(){

        self::rangUser();
        $title = "Работа с районами области";
        $raion = new Raion();
        $raionList = $raion->getAllRaion();

        return $this->view->render('index',[
            'title'=>$title,
            'raionList'=>$raionList,
        ]);
    }

    public function actionCreate(){

        self::rangUser();
        $title = "Добавление районов";
        if ($_POST['saveraion']){
            $raion = new Raion();
            $raion->createRaion($_POST);
        }

        return $this->view->render('create',[
            'title'=>$title,
        ]);
    }

    public function actionEdit($id){

        self::rangUser();
        $title = "Редактирование районов";
        $raion = new Raion();
        $gorod = $raion->getOneRaionById($id);
        if ($_POST['saveraion']){
            $raion->editRaion($id,$_POST);
        }
        return $this->view->render('edit',[
            'title'=>$title,
            'gorod'=>$gorod,
        ]);
    }

    public function actionDrop($id){
        self::rangUser();
        $raion = new Raion();
        $raion->dropRaionById($id);
    }
    public function rangUser(){
        if (Users::getRoleUser()['role']!='admin'){
            header('Location: /');
            exit();
        }
    }
}