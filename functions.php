<?php

/**
* @file        functions.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/


/**
* Die Funktion `sanitizeArray` bereinigt jeden Wert in einem Array, in dem sie führende und nachfolgende
* Leerzeichen entfernt und Sonderzeichen in HTML-Entitäten umwandelt.
* 
* @param data Die Funktion `sanitizeArray` nimmt ein Array `` als Eingabe und bereinigt jeden Wert im
* Array, indem sie führende und nachfolgende Leerzeichen entfernt und Sonderzeichen in HTML-Entitäten
* umwandelt, indem sie die Funktion `htmlspecialchars` mit den angegebenen Parametern (ENT_QUOTES und
* UTF-8-Codierung) verwendet.
* 
* @return Die Funktion `sanitizeArray` gibt das bereinigte Array zurück, bei dem jeder Wert getrimmt und
* HTML-Sonderzeichen in ihre jeweiligen HTML-Entitäten umgewandelt wurden, indem die Funktion
* `htmlspecialchars` mit den angegebenen Parametern verwendet wurde.
*/


/**
* Die Funktion bereinigt eine Variable, indem sie nicht-alphabetische Zeichen entfernt, Leerzeichen trimmt und
* Sonderzeichen in HTML-Entitäten umwandelt.
* 
* @param page Die Funktion `sanititizenVariable` nimmt eine Variable `` als Eingabe und führt die
* folgenden Bereinigungsschritte durch:
* 
* @return Die Funktion `sanititizenVariable` nimmt eine Variable ``, entfernt alle Zeichen, die
* keine Buchstaben sind (sowohl Groß- als auch Kleinbuchstaben), trimmt Leerzeichen und wandelt dann
* Sonderzeichen in HTML-Entitäten um, indem sie `htmlspecialchars` verwendet. Die bereinigte Variable ``
* wird dann zurückgegeben.
*/
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

?>