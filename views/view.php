<?php
    namespace views;

    class view {
        private $viewPath;
        public function __construct($viewPath, array $parameters){
            $this->viewPath = $viewPath;
            $this->view($parameters);
        }
        private function view(array $parameters){
            extract($parameters);
            if(isset($layout) && $layout == True)
            {
                require_once('views/shared/header.php');
            }
            require_once $this->viewPath;
            if(isset($layout) && $layout == True)
            {
                require_once('views/shared/footer.php');
            }
        }
    }
?>