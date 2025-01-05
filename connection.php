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
      private $pdo = null;
      private $dsn = null;
      private $ajax_procedure = null;

      function __construct($ajax_procedure=false)
      {
         $this->ajax_procedure = $ajax_procedure;
      }
      function connect_to_db() 
      {
         $this->dsn = "mysql:host=$this->servername;dbname=$this->db;charset=utf8";
         
         try 
         {
            $this->pdo = new PDO($this->dsn, $this->username, $this->pw,$this->options);

            if($this->ajax_procedure)
            {
               echo ("Verbindung zur Datenbank erfolglreich.\n");  // Wird in die console.log vom ajax arg[0][success] eingefügt. 
            }
            else
            {
?>
   <!DOCTYPE html>
   <html lang="en">
   <script>console.log("Verbindung zur Datenbank erfolglreich.");</script>
<?php
               }
            } 
            catch (PDOException $e) 
            {
               echo 'Connection to database failed: '. $e->getMessage();

               die();
            }

            return $this->pdo;
      }

      function closeConnection()
      {
         $this->pdo =null;
         echo "Connection closed";
      }

   }


