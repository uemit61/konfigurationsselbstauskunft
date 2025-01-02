<?php

    class Start_Model
    {
        private $token = null;
        private $view = null;
        private $pdo = null;
        private $customer_id = null;
        private $token_id = null;
        private $token_is_active = false;

        function __construct($token = null,$view,$pdo=null)
        {
            $this->token = $token;
            $this->pdo = $pdo;
            $this->view = $view;
        }

        function get_db_infos()
        {

        }

        function check_token()
        {
            $result = '';

            if($this->token == 'index.php')
            {
                return;
            }
            try
            {
                $con = $this->pdo->connect_to_db();

            $query = "SELECT * FROM `token` where `Token_Key` = :Token";

            $stmt = $con->prepare($query);

            $stmt->bindValue(':Token', $this->token, PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e)
            {
?>
                <script> console.log("Fehler: <?php echo $e->getMessage(); ?> ");</script>
<?php
            }

            $con = null;

            if(!$result)
            {
?>
                <script> console.log('Das Token <?php echo $this->token; ?> ist nicht gültig. Umleitung zum Login_Formular.');</script>
<?php
            }
            else if($result['Used'] == 0)
            {
?>

                <script> console.log('Das Token ist gültig. Passwortseite wird geöffnet.');</script>
<?php 
                $this->token_is_active = true;
                session_start();
                    $_SESSION['Token_ID'] = $result['Token_ID'];
                    $_SESSION['Customer_ID'] = $result['Customer_ID']; 
                session_write_close();
            }
          
        }

        function save_password($password)
        {
            define('CODE', 'maypass61');
            $passwordWithPepper = $password . CODE;
            $hashedPassword = password_hash($passwordWithPepper, PASSWORD_ARGON2ID);
            $password = explode('p=1$', $hashedPassword)[1];

            session_start();
                $this->customer_id= $_SESSION['Customer_ID'];
                $this->token_id = $_SESSION['Token_ID'];
            session_write_close();


            try
            {
                $con = $this->pdo->connect_to_db();
                $query = "UPDATE `customer` SET `Password` = :Password  WHERE `customer`.`Customer_ID` = 1 AND `customer`.`Glorixx_Customer_ID` = :Customer_ID "; 
                $stmt = $con->prepare($query);
                $stmt->bindValue(':Password', $password, PDO::PARAM_STR);
                $stmt->bindValue(':Customer_ID', $this->customer_id, PDO::PARAM_STR);
                $stmt->execute();
                
                echo "passwort gespeichert";
            }
            catch (PDOException $e)
            {
                echo "Error: ".$e->getMessage();
            }
            
            $con = null;
            echo "connection closed";

            $this->set_used_token();
            $this->token_is_active = false;
        }

        function set_used_token()
        {
            try
            {
                $con = $this->pdo->connect_to_db();
                $query = "UPDATE `token` SET `Used` = '1'  WHERE `token`.`Token_ID` = :Token_ID AND `token`.`Customer_ID` = :Customer_ID";
                $stmt = $con->prepare($query);
                $stmt->bindValue(':Token_ID', $this->token_id, PDO::PARAM_INT);
                $stmt->bindValue(':Customer_ID', $this->customer_id, PDO::PARAM_INT);
                $stmt->execute();

            }
            catch(PDOException $e)
            {
                echo "Error: ".$e->getMessage();
            }
            $con = null;
            echo "connection closed";
        }

        function check_password($user,$password)
        {
            try
            {
                $con=$this->pdo->connect_to_db();

                $query = "SELECT Customer_ID , Password FROM `customer`  WHERE `Loginname` = :Loginname";
                $stmt = $con->prepare($query);
                $stmt->bindValue(':Loginname',$user, PDO::PARAM_STR);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $con = null;
                echo '<script>console.log("Verbindung erfolgreich.");</script>';
                
                
            }
            catch(PDOException $e)
            {
                echo "Fehler: ".$e->getMessage();
            }
            $con = null;

            define('DECODE', 'maypass61');
            $pepperPass = $password. DECODE;
            $test = $result['Password'] ?? 'fehler';
            if(password_verify($pepperPass,'$argon2id$v=19$m=65536,t=4,p=1$'.$test))
            {
                echo "<script>console.log('Login erfolgreich.');</script>";
                session_start();
                    $_SESSION['page']= 'form_page';
                    $_SESSION['Customer_ID']= $result['Customer_ID'];
                    $this->customer_id=$result['Customer_ID'];
                session_write_close();

                try
                {
                    $con = $this->pdo->connect_to_db();
                    $query = "SELECT Json_Data FROM `json_cache` WHERE Customer_ID = :Customer_ID ";
    
                    $stmt = $con->prepare($query);
                    $stmt->bindValue(':Customer_ID',$this->customer_id);
                    $stmt->execute();
                    $con =null;

                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    $file = fopen("C:\\xampp\\htdocs\\konfigurationsselbstauskunft\\temp\\session\\mySession","w+");
                    fwrite($file, $result['Json_Data']);
                    fclose($file);


                    

                    
                    
                }
                catch (PDOException $e)
                {

                }
               


                
               
                

            }
            else
            {
                session_start();
                    $_SESSION['page']= 'start_page';
                session_write_close();
                echo "<script>console.log('Login fehlgeschlagen.');</script>";
                
            }
        }

        function update_view($valid_pass=false)
        {
            $this->view->render($this->token_is_active,$valid_pass);
        }
    }