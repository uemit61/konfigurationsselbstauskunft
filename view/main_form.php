<?php

/**
* @file        main_form.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/

require 'form/customerInfo_form.php';
require 'form/hostConfig_form.php';

class MainForm
{
    
    function render($userData =[])
    {
        
        // // JSON-Antwort
        // if(!empty($userData))
        // {
        //     header('Content-Type: application/json');
        //     echo json_encode($userData);
            
        //     session_start();
        //         // Todo Array abspeichern
        //     session_write_close();
            
        // }
        

?>

        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Kundenselbstauskunft</title>
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

                <!-- Font Awesome for Icons -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

                <!-- Custom CSS -->
                <link href="./view/css/styles.css" rel="stylesheet">

                <!-- JQUERY-->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            </head>
            
            <body>
            
                <header class="bg-white p-3">
                    <nav class="navbar navbar-dark bg-white d-flex  justify-content-between  align-items-center">
                        <!-- Logo -->
                        <a class="navbar-brand disabled">
                            <img src="./view/image/LogoHeintze.png" alt="Logo" class="logo" style="max-width: 150px;">
                            
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Abmelden-Button in der Navbar -->
                        <div class=" d-flex align-items-center ">
                            <a id="logoutIcon"  class="text-decoration-none d-flex align-items-center ms-3">
                                <fa-2x class="fa-solid fa-right-from-bracket "></fa-solid> <!-- Abmelden-Icon -->
                                <div class="ms-2">Abmelden</div>
                            </a>
                        </div>
                    </nav>
                </header>

                <main>
                    
                    <div class="container mt-5">
                        <h2 class="text-center mb-4">Kundenselbstauskunft</h2>
                        <!-- Tabs Navigation -->
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="nav-item">
                                <span class="nav-link active" data-tab="1" data-name="Kontaktdaten">1. Kontaktdaten</span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" data-tab="2" data-name="Host-Einstellungen">2. Host-Einstellungen</span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" data-tab="3" data-name="Mandanten">3. Mandanten</span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" data-tab="3" data-name="ERP-Einstellungen">4. ERP-Einstellung</span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" data-tab="3" data-name="Import">5. Import</span>
                            </li>
                        </ul>

                        <!-- Tabs Inhalte -->
                        <div class="tab-content mt-4">
                            <!-- Tab 1 Kontaktdaten Inhalt -->

                            <!--Die Klassen show und active werden beim Blättern der Form removed
                                und beim nächsten Tab geadded siehe Unten JavaScript Jquery -->
                            <div class="tab-pane fade show active" id="tab1">
                                <h5 >Kontaktdaten</h5>

                                <!--Laden des Form-Tabs -->
                                <?php contactInfo_form(); ?> 
                            </div>

                            <!-- Platzhalter für Tab 2 !Keine show und active Klassen Bem. s.O -->
                            <div class="tab-pane fade" id="tab2">
                                <h5>Host-Einstellungen</h5>
                                <?php hostConfig_form(); ?>
                            </div>

                            <!-- Platzhalter für Tab 3 !Keine show und active Klassen Bem. s.O -->
                            <div class="tab-pane fade" id="tab3">
                                <h5>Mandanten</h5>
                                <p>Hier kommen die Mandanten-Daten hin...</p>
                            </div>

                            <!-- Platzhalter für Tab 4 !Keine show und active Klassen Bem. s.O -->
                            <div class="tab-pane fade" id="tab3">
                                <h5>ERP-Einstellungen</h5>
                                <p>Hier kommen die Mandanten-Daten hin...</p>
                            </div>

                            <!-- Platzhalter für Tab 5 !Keine show und active Klassen Bem. s.O -->
                            <div class="tab-pane fade" id="tab3">
                                <h5>Import</h5>
                                <p>Hier kommen die Mandanten-Daten hin...</p>
                            </div>

                        </div>

                        <!-- Navigation -->
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-secondary" id="prevBtn">Zurück</button>
                            <button class="btn btn-success" id="btn">Kontaktdaten speichern</button>
                            <button class="btn btn-primary" id="nextBtn">Weiter</button>
                        </div>
                    </div>
                </main>
                <footer>
                </footer>
                <!-- Lade das DOMPurify CDN-Skript zuerst -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>

                <script type="module" src='./controller/mainForm.js'></script>
            </body>
        </html>
<?php
    }
}
