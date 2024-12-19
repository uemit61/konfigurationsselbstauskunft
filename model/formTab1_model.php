<?php

/**
    * @file        index.php
    * @author      Ümit Yildirim hopes61@icloud.com
    * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
    * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
    * @version     1.0.0
    * @since       2024-12-19
*/

class FT1_Model
{
    private $view;
    private $pdo;

    function __construct($view,$pdo)
    {
        $this->view=$view;
        $this->pdo=$pdo;
    }

    function renderView()
    {
        $this->view->render();
    }
}