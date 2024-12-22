<?php

/**
* @file        functions.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/


class Own_Functions
{
        
    function sanitizeVariable($page)
    {
        $page = preg_replace('/[^a-zA-Z]/', '', $page);
        $page = trim($page);
        $page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');
        return $page;
    }


    function stripTags($array)
    {
        foreach($array as $key => $value)
        {
            // $array[$key] = htmlspecialchars_decode($value, ENT_QUOTES);
            $array[$key] = strip_tags($array[$key]);
        }

        return $array;
    }   
}


?>