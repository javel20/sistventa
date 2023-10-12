<?php
    class PageController extends Controller{
        public function home(){
            // echo 'estoy en home';
            // require_once(__DIR__ .'/../Views/home.view.php');
            $this->render('home',[],'site');
        }

        public function listar(){
            // echo 'estoy en listar';
            $this->render('listar');
        }
        public function modificar(){
            // echo 'estoy en modificar';
            $this->render('modificar');
        }
        public function nuevo(){
            // echo 'estoy en nuevo';
            $this->render('nuevo');
        }
    }
?>