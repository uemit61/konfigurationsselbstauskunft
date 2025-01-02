<?php

    class Start_Controller
    {
        private $model =null;

        function __construct($model)
        {
            $this->model = $model;
        }

        function handleRequest()
        {
           

            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $action = $_POST['btn'];

                if($action  === "Speichern")
                {
                    
                    $this->model->save_password($_POST['password']);
                    session_start();
                        $_SESSION['page']= 'form_page';
                    session_write_close();
                    header('Location: ./index.php');
                    exit();
                }
                else if($action === "Anmelden")
                {
                    // echo '<script>console.log("'.$_POST['Loginname'].$_POST['Password'].'");</script>';
                    $this->model->check_password($_POST['Loginname'],$_POST['Password']);
                    header('Location: ./index.php');
                    exit();
                }
            }
            else
            {
                $this->model->check_token();
                $this->model->update_view(null,false);
                exit();
            }
            
            
            
        }
    }