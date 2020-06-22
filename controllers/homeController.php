<?php
    namespace controllers;
    use controllers\baseController;
    use models\taskModel;
    use models\userModel;
    
    class homeController extends baseController {
        public function indexAction(){
            if(!empty($_GET['sortby'])){
                $model = taskModel::selectAll($_GET['sortby'],$_GET['direction']);
            } else {
                $_GET['sortby'] = 'TaskId';
                $model = taskModel::selectAll($_GET['sortby'],NULL);
            }
            $userRole = userModel::selectRole();
            $this->render('views/home/index.php', ['layout'=>True, 'model'=>$model, 'userRole'=>$userRole]);
        }
    }
?>