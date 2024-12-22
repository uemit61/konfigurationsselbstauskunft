<?php

/**
 * @file        connection.php
 * @author      Ümit Yildirim hopes61@icloud.com
 * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
 * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
 * @version     1.0.0
 * @since       2024-12-19
 */
    class Connection
    {
        private $servername = "127.0.0.1:3306";
        private $db = "config_self_disclosure";
        private $username = "root";
        private $pw = "";
        private $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false];
        private $pdo;
        private $dsn;
        
       function connectionToDb() 
       {
            $this->dsn = "mysql:host=$this->servername;dbname=$this->db;charset=utf8";
            

            try 
            {
                $this->pdo = new PDO($this->dsn, $this->username, $this->pw,$this->options);
                echo "Connection established";
            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }

            return $this->pdo;
       }

       function closeConnection()
       {
            $this->pdo =null;
            echo "Connection closed";
       }
           
        
    }
    
        
    
   

