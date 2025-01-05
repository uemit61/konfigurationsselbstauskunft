<?php

/**
* @file        main_form.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/


require './view/own_templates/heads.php';
require './view/own_templates/headers.php';
require './view/forms/customerInfo_form.php';
require './view/forms/hostConfig_form.php';
require './view/forms/mandanten_form.php';
require './view/forms/erp_form.php';
require './view/forms/import_form.php';
require './view/own_templates/footer.php';


class Form_Page
{
    
    function render($userData =[])
    {
?>
        
            <!-- Head -->
            <?php bootstrap_jquery(); ?>
            
            <body>
                    <!-- Header -->
                    <?php logout_header(); ?>
                
                <main>
                    
                    <div class="container mt-5">
                        <h2 class="text-center mb-3">Kundenselbstauskunft</h2>
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
                        <div class="tab-content mt-3">
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
                                <?php mandanten_form(); ?> 
                            </div>

                            <!-- Platzhalter für Tab 4 !Keine show und active Klassen Bem. s.O -->
                            <div class="tab-pane fade" id="tab3">
                                <h5>ERP-Einstellungen</h5>
                                <?php erp_form(); ?> 
                            </div>

                            <!-- Platzhalter für Tab 5 !Keine show und active Klassen Bem. s.O -->
                            <div class="tab-pane fade" id="tab3">
                                <h5>Import</h5>
                                <?php import_form(); ?> 
                            </div>

                        </div>

                        <!-- Navigation -->
                        <div class="d-flex justify-content-between mt-4">
                            <button onclick="tap_back()" class="btn btn-secondary" id="prevBtn">Zurück</button>
                            <button onclick="save_tabFrom_to_Db()" class="btn btn-success" id="btn">Kontaktdaten speichern</button>
                            <button onclick="tap_forward()" class="btn btn-primary" id="nextBtn">Weiter</button>
                        </div>
                    </div>
                </main>
                <footer>b
                </footer>
                

                <!-- DOMPurify enthält Funktionen die vor CSS schützen-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
                <script type="module" src='/kundenselbstauskunft_lions_de/controller/javascript_main_form.js'></script>
            </body>
        </html>
<?php
    }
}
