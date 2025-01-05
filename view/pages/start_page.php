<?php
    /**
    * @file        main_form.php
    * @author      Ümit Yildirim hopes61@icloud.com
    * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
    * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
    * @version     1.0.0
    * @since       2024-12-18
    */

    require 'C:/xampp/htdocs/kundenselbstauskunft.lions.de/view/own_templates/heads.php';
    require 'C:/xampp/htdocs/kundenselbstauskunft.lions.de/view/own_templates/headers.php';
    require 'C:/xampp/htdocs/kundenselbstauskunft.lions.de/view/forms/login_form.php';
    require 'C:/xampp/htdocs/kundenselbstauskunft.lions.de/view/forms/password_form.php';

    class Login_Page
    {
        private $logo = null;

        function __construct()
        {
            
        }
        function render($token_active=false,$go_to_main_form)
        {
            
?>          
            <!-- Head  -->
            <?php bootstrap_jquery(); ?>

            <body>
                
                <!-- Header -->
                <?php login_header(); ?>

                <main>
                    <?php 
                        if($token_active)
                        {
                            password_form();
                        }
                        else
                        {
                            login_form();
                        }
                    ?>
                </main>

                <!-- Footer -->

                    <!-- DOMPurify enthält Funktionen die vor CSS schützen-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>

                <!-- Eigene JavaScript  -->
                <script src=/kundenselbstauskunft.lions.de/controller/javascript_start_form.js"></script>
            </body>
            </html>
<?php
                
        }
    }   