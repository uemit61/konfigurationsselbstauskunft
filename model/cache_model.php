<?php

 class Cache_Model
 {
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function save_json_to_db($data)
    {
        try
        {
            // echo var_dump($data);
            $con = $this->pdo->connect_to_db();
            session_start();
                $customer_id = $_SESSION['Customer_ID'];
            session_write_close();

            $query = "UPDATE `json_cache` SET `Json_Data` = :j_data WHERE `json_cache`.`Json_Cache_ID` = 1 AND `json_cache`.`Customer_ID` = :Customer_ID; ";
    
            $stmt = $con->prepare($query);
            $stmt->bindValue(':j_data', $data);
            $stmt->bindValue(':Customer_ID',$customer_id);
            $stmt->execute();

            echo "Daten wurden erfolgreich zwischen gespeichert.";
    
            $con =null;
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
      

    }

 }