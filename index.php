
<!-- 
    * @file        index.php
    * @author      Ümit Yildirim hopes61@icloud.com
    * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
    * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
    * @version     1.0.0
    * @since       2024-12-19
-->
<!DOCTYPE html>
<html lang="en">
<?php 
  
    require './own_functions.php';
    require './connection.php';
    
    $data = json_decode(file_get_contents('php://input'), true);


    $token =null;


    if(!empty($_GET))
    {
        $page = 'errorpage1';
    }
    
    $uri = $_SERVER['REQUEST_URI'];
    $parts = explode("/", $uri);
    $last_part = implode("/", array_slice($parts, 2));
    if (preg_match("#^/konfigurationsselbstauskunft/([^'=\"]+)$#", $_SERVER['REQUEST_URI'], $matches)) 
    {
        $token = $matches[1];
    }
    else if(!empty($last_part))
    {
        $page = 'errorpage2';
    }
    
    
        if($data == null)
        {
            session_start();
            $page = $_SESSION['page'] ?? 'start_page';
          
        }
        else
        {  
            session_start();
                $page = $data['page'] ?? 'start_page';
        }
        $_SESSION['page']=null;
        session_write_close();
        


    switch ($page)
    {
        case 'start_page':
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/model/start_model.php';
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/view/pages/start_page.php';
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/controller/start_controller.php';
            $controller = new Start_Controller(new Start_Model($token,new Login_Page(), new Connection()));
            $controller->handleRequest();
        break;

        case 'form_page':
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/model/customerInfo_form_model.php';
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/view/pages/form_page.php';
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/controller/customer_controller.php';
            $controller =new Customer_Controller(new Customer_Model(new Form_Page(),new Connection()));
            $controller->start();
        break;

        case 'customerInfo':
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/model/customerInfo_form_model.php';
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/view/pages/form_page.php';
            $model = new Customer_Model(new Form_Page(),new Connection());
            $model->loading_infos();
            $model->create_database_infos($data['json_form_data'] ?? '');
            $model->save_to_database();
            die();
        break;

        case 'host':
          
        break;

        case 'client':

        break;

        case 'erp':

        break;

        case 'import':
        
        break;

        case 'test':
            require './test.php';
        break;

        case 'save_json_cache':
            require 'C:/xampp/htdocs/konfigurationsselbstauskunft/model/cache_model.php';
            $model = new Cache_Model(new Connection());
            $model->save_json_to_db($data['json_form_data']);
            die();
        break;

    }

