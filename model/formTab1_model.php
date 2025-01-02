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

    private $customer_id;
    private $sub_id;
    private $contact_information=['Contact_Information_ID'=>'','CompanyName'=>'','Phone'=>'','Email'=>'','Customer_ID'=>''];
    private $contact_person=['Contact_Person_ID'=>'','Gender'=>'','Name'=>'','Surname'=>'','Contact_Information_ID'=>''];
    private $address=['Address_ID'=>'','Street'=>'','House_Number'=>'','Postcode'=>'','City'=>'','Contact_Information_ID'=>''];

    function __construct($view,$pdo)
    {
        $this->view=$view;
        $this->pdo=$pdo;
        session_start();
            $this->customer_id = $_SESSION['Customer_ID'];
        session_write_close();
    }

    function create_database_infos($data)   
    {
        echo 'cont: ';
        echo var_dump($data);
        foreach($data as $arrkey)
        {
          foreach($this->contact_information as $key => $val) 
          {
                if($arrkey['name'] == $key)
                {
                    $this->contact_information[$key] =$arrkey['value'];
                }
          }
          foreach($this->contact_person as $contact => $val) 
          {
                if($arrkey['name'] == $contact)
                {
                    $this->contact_person[$contact] =$arrkey['value'];
                }
          }
          foreach($this->address as $contact => $val) 
          {
                if($arrkey['name'] == $contact)
                {
                    $this->address[$contact] =$arrkey['value'];
                }
          }
           
        }
        
        $this->contact_information['Customer_ID'] = $this->customer_id;
        $this->contact_person['Customer_ID'] = $this->customer_id;
        $this->address['Customer_ID'] = $this->customer_id;

        session_start();
            $_SESSION['contact_information'] = $this->contact_information;
        session_write_close();
        
        echo var_dump($this->contact_information);
        echo var_dump($this->contact_person);
        echo var_dump($this->address);
    }

    function load_from_database()
    {
        $con = $this->pdo->connectionToDb();

        $query ='SELECT Contact_Information_ID FROM `customer` WHERE Customer_ID = :customer_id';

        $stmt = $con->prepare($query);
        $stmt->bindValue('customer_id', $this->customer_id, PDO::PARAM_INT);
        
        
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $con = null;

        echo 'Data loaded successfully. Connection  closed successfully.';


    }
    function save_to_database()
    {
        try
        {
            $con = $this->pdo->connectionToDb();
            $sql='';

            if(empty($this->sub_id))
            {
                $sql ='INSERT INTO ...';
            }
            else
            {
                $sql ='UPDATE ...';
            }
            
            $stmt = $con->prepare($sql);
            $stmt->execute();
            
            echo "Successfully saved to database.";
            
            $con->closeConnection();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function updateView()
    {
            $this->view->render();
    }
}