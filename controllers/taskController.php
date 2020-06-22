<?php
    namespace controllers;
    use controllers\baseController;
    use models\taskModel;

    class taskController extends baseController {
        public function addingATaskAction(){
            $this->render('views/task/addingATask.php', ['layout'=>True]);
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $newTask = new taskModel;
                if($newTask->tryMap($_POST)){
                    $newTask->taskInsert();
                    ?>
                        <script>alert('Your task has been successfully added!');</script>
                    <?php
                }
            }
        }
        public function  taskEditAction(){
            $model = taskModel::selectSingleTask($_GET['TaskId']);
            $this->render('views/task/taskEdit.php', ['layout'=>True, 'model'=>$model]);
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $newTask = new taskModel;
                if($newTask->tryMap($_POST)){
                    $newTask->addAModifiedTask($_GET['TaskId']);
                    ?>
                        <script>alert('Task has been successfully changed!');</script>
                    <?php
                    header("Refresh: 0");
                }
            }
        }
    }
