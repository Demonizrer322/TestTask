<?php
    namespace controllers;
    use controllers\baseController;
    use models\userModel;

    class userController extends baseController {
        public function loginAction(){
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if ($user = userModel::varification($_POST['Email']))
                {
                    $userPassword = new userModel;
                    $userPassword->Password = $_POST['Password'];
                    $password = $userPassword::passwordHasher();
                    if($password == $user->Password)
                    {
                        $this->autorizationAction($user->Email, $user->Id);
                        $this->render('views/user/loginRegister.php', ['layout'=>True]);
                    } else {
                        $this->render('views/user/loginRegister.php', ['layout'=>True]);
                        echo('Wrong Password, please try again!');
                    }
                } else {
                    $this->render('views/user/loginRegister.php', ['layout'=>True]);
                    echo('Wrong Email, please try again!');
                }
            }
        }
        public function registrationAction(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $userVarification = userModel::varification($_POST['Email']);
                if(empty($userVarification)){
                    $user = new userModel;
                    if($user->tryMap($_POST)){
                        $user->insert();
                        $this->autorizationAction($user->Email, $user->Id);
                        $this->render('views/user/loginRegister.php', ['layout'=>True]);
                    }
                } else {
                    echo('User with this email already exists!');
                    $this->render('views/user/loginRegister.php', ['layout'=>True]);
                }
            }
        }
        public function logoutAction(){
            if(!isset($_SESSION)) session_start();        
            session_destroy();
            $_SESSION['Email'] = NULL;
            $this->render('views/user/loginRegister.php', ['layout'=>True]);
        }
        public function loginRegisterAction(){
            $this->render('views/user/loginRegister.php', ['layout'=>True]);
        }
        public function autorizationAction($Email, $Id){
            if (session_status()<>2) session_start();
            $_SESSION["Autorization"] = TRUE;
            $_SESSION["Email"] = $Email;
            $_SESSION["Id"] = $Id;
        }
    }
?>