<?php 
    /**
        * @file        index.php
        * @author      Ümit Yildirim hopes61@icloud.com
        * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
        * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
        * @version     1.0.0
        * @since       2024-12-19
    */

    /*
        Dieser Codeblock überprüft, ob eine Sitzung noch nicht gestartet wurde (`PHP_SESSION_NONE`), 
        dann setzt er den Sitzungs-Speicherpfad auf `./temp/session`, startet die Sitzung, weist den 
        Sitzungsnamen und die Sitzungs-ID dem Superglobal-Array zu und schließt schließlich die Sitzung 
        für das Schreiben. Dieser Code ist verantwortlich für die Initialisierung einer Sitzung in PHP 
        und das Speichern von sitzungsbezogenen Informationen. 
    */
    // if (session_status() == PHP_SESSION_NONE) 
    // {   
    //     session_save_path('./temp/session');    
    //     session_start();
    //         $_SESSION['sessionName'] = session_name(); 
    //         $_SESSION['sessionId'] = session_id();
    //     session_write_close();
    // }

    require './functions.php';
    require './connection.php';
    require './model/formTab1_model.php';
    require './controller/formTab1_controller.php';
    require './view/main_form.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $pdo = null;
    $page = $data['page'] ?? 'start';

    var_dump($data);    

    $view = new MainForm();

    switch ($page)
    {

        case 'start':
            $controller1 =new FT1_Controller(new FT1_Model($view,$pdo));
            $controller1->handleRequest();
        break;

        case 'customerInfo':
            $controller1 =new FT1_Controller(new FT1_Model($view,$pdo));
            $controller1->handleRequest($data['formJson']);
        break;

        case 'host':
            // $controller2->handleRequest();
            echo 'drin in host';
        break;

       
    }

