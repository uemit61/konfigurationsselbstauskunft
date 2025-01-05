<?php

/**
    * @file        index.php
    * @author      Ümit Yildirim hopes61@icloud.com
    * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
    * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
    * @version     1.0.0
    * @since       2024-12-19
*/

class Customer_Model
{
    private $view;
    private $pdo;

    private $customer_id;
    private $contact_information_id;
    private $contact_person_id;
    private $address_id;
    private $is_saved;
    private $contact_information=['Contact_Information_ID'=>'','CompanyName'=>'','Phone'=>'','Email'=>'','Saved' => '','Customer_ID'=>''];
    private $contact_person=['Contact_Person_ID'=>'','Gender'=>'','PersonName'=>'','Surname'=>'','Contact_Information_ID'=>''];
    private $address=['Address_ID'=>'','Street'=>'','House_Number'=>'','Postcode'=>'','City'=>'','Contact_Information_ID'=>''];

    function __construct($view,$pdo)
    {
        $this->view=$view;
        $this->pdo=$pdo;
        session_start();
            $this->customer_id = $_SESSION['Customer_ID'];
            $this->contact_information['Customer_ID'] = $this->customer_id;
        session_write_close();
    }

    function create_database_infos($data)   
    {
        foreach($data as $arrKey => $arrVal)
        {
          foreach($this->contact_information as $key => $val) 
          {
                if($arrKey == $key)
                {
                    $this->contact_information[$key] =$arrVal;
                }
          }
          foreach($this->contact_person as $key => $val) 
          {
                if($arrKey == $key)
                {
                    $this->contact_person[$key] =$arrVal;
                }
          }
          foreach($this->address as $key => $val) 
          {
                if($arrKey == $key)
                {
                    $this->address[$key] =$arrVal;
                }
          }
        }
        
    }

    function loading_infos()
    {
        try
        {
            $con = $this->pdo->connect_to_db();

            $query= "SELECT `address`.`Address_ID`,`contact_person`.`Contact_Person_ID`,
                            `contact_information`.`Contact_Information_ID`, `contact_information`.`Saved`
                            '
                    FROM   `contact_information`, `contact_person`,`address`, `glorixx_customer`,
                    WHERE  `contact_information`.`Customer_ID` = :customer_id 
                    OR `glorixx_customer`.`Gorixx_Customer_ID` = :glorixx_customer_id";

            $stmt = $con->prepare($query);
            $stmt->bindValue('customer_id', $this->customer_id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(empty($result['Saved']))
            {
                $this->is_saved = false;
                $this->contact_information['Saved'] = true;
            }
            else
            {
                $this->is_saved = true;
                $this->contact_information_id = $result['Contact_Information_ID'];
                $this->contact_information['Contact_Information_ID'] = $this->contact_information_id;

                $this->contact_person_id = $result['Contact_Person_ID'];
                $this->contact_person['Contact_Person_ID'] = $this->contact_person_id;
                $this->contact_person['Contact_Information_ID'] = $this->contact_information_id;

                $this->address_id = $result['Address_ID'];
                $this->address['Address_ID'] = $this->address_id;
                $this->address['Contact_Information_ID'] = $this->contact_information_id;
            }
            echo 'Data loaded successfully. Connection  closed successfully.';
        }
        catch (PDOException $e)
        {
            echo 'Fehler Loading: ' . $e->getMessage();
        }
        $con = null;
       
    }
    function save_to_database()
    {
        try
        {
            $con = $this->pdo->connect_to_db();
            $query='';


            if($this->is_saved)
            {
                $query ="UPDATE `contact_information` 
                         SET CompanyName = :CompanyName, Phone = :Phone, Email = :Email, Saved = :Saved 
                         WHERE Contact_Information_ID = :Contact_Information_ID
                         AND Customer_ID = :Customer_ID;";
                $stmt= $con->prepare($query);
                $stmt->execute($this->contact_information);

                $query ="UPDATE `contact_person` 
                         SET Gender = :Gender, PersonName = :PersonName, Surname = :Surname 
                         WHERE Contact_Person_ID = :Contact_Person_ID 
                         AND Contact_Information_ID = :Contact_Information_ID ";
                $stmt = $con->prepare($query);
                $stmt->execute($this->contact_person);

                $query = "UPDATE `address` 
                         SET `Street` = :Street, `House_Number` = :House_Number, `Postcode` = :Postcode, `City` = :City 
                         WHERE `address`.`Address_ID` = :Address_ID
                         AND `address`.`Contact_Information_ID` = :Contact_Information_ID";
                $stmt = $con->prepare($query);
                $stmt->execute($this->address);
            }
            else
            {
                $con = $this->pdo->connect_to_db();
                $query ='INSERT INTO `contact_information` (`Contact_Information_ID`, `CompanyName`, `Phone`, `Email`, `Saved`, `Customer_ID`) 
                         VALUES (:Contact_Information_ID, :CompanyName, :Phone, :Email, :Saved, :Customer_ID)';

                $stmt = $con->prepare($query);
                $stmt->execute($this->contact_information);

                $query ='SELECT Contact_Information_ID FROM `contact_information` WHERE `Customer_ID` = :Customer_ID';
                $stmt = $con->prepare($query);
                $stmt->bindValue(':Customer_ID',$this->customer_id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->contact_information_id = $result['Contact_Information_ID'];
                $this->contact_person['Contact_Information_ID'] = $this->contact_information_id;
                $this->address['Contact_Information_ID'] = $this->contact_information_id;
                

            
                $query = 'INSERT INTO `contact_person` (`Contact_Person_ID`, `Gender`, `PersonName`, `Surname`, `Contact_Information_ID`) 
                VALUES (:Contact_Person_ID, :Gender , :PersonName, :Surname, :Contact_Information_ID)';

                $stmt = $con->prepare($query);
                $stmt->execute($this->contact_person);


                $query = 'INSERT INTO `address` (`Address_ID`, `Street`, `House_Number`, `Postcode`, `City`, `Contact_Information_ID`) 
                          VALUES (:Address_ID, :Street, :House_Number, :Postcode, :City, :Contact_Information_ID)';

                $stmt = $con->prepare($query);
                $stmt->execute($this->address);

                
            }
            echo "Successfully saved to database.";
            


           
        }
        catch (PDOException $e)
        {
            $this->contact_information['Saved'] = false;
            echo "Fehler ".$e->getMessage();
        }

        $con = null;
        echo "Connection Closed.";
    }

    function updateView()
    {
            $this->view->render();
    }
}