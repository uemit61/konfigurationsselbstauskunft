<?php

/**
* @file        functions.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/


   
    function sanitizeVariable($var)
    {
        return htmlspecialchars(trim(strip_tags(preg_replace("/['=\"\\^]+/", '', $var), ENT_QUOTES))); 
    }


    function sanitizeArray($array)
    {
        foreach($array as $key => $value)
        {
            $array[$key] = sanitizeVariable($value);
        }

        return $array;
    }   



?>