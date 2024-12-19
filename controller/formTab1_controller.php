<?php
/**
    * @file        formTab1_Controller.php
    * @author      Ümit Yildirim hopes61@icloud.com
    * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
    * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
    * @version     1.0.0
    * @since       2024-12-18
*/


    class FT1_Controller /* FormTab1 */
    {
        private $model;
        function __construct($model)
        {
            $this->model = $model;
        }
        function handleRequest($data=[])
        {
            if(!empty($data))
            {
                echo var_dump($data);
                die();
            }
            $this->model->renderView();
            
        }
    }