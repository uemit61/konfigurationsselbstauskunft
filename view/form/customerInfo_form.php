<?php

/*
* @file        customerInfo_form.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/
    function contactInfo_form()
    {

?>
        <form id="form-tab1" name="customerInfo" method="post" action="">
            <div class="mb-3">
                <label for="firma" class="form-label">Firma</label>
                
                <input type="text" class="form-control" id="company" name="CompanyName" placeholder="Firmenname">
            </div>
            <div class="mb-3">
                <label class="form-label">Ansprechpartner</label>
                <div class="row">
                    <div class="col-3">
                        <select class="form-select" name="Gender">
                            <option value="">Anrede</option>
                            <option value="Herr">Herr</option>
                            <option value="Frau">Frau</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="Name" placeholder="Vorname">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" name="Surname" placeholder="Nachname">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefon</label>
                <input type="text" class="form-control" id="phone" name="Phone" placeholder="Telefon">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="Email" placeholder="E-Mail">
            </div>
            <div class="mb-3">
                <label class="form-label">Anschrift</label>
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" name="Street" placeholder="Straße">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="House_Number" placeholder="Hausnummer">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="Postcode" placeholder="PLZ">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="City" placeholder="Ort">
                    </div>
                </div>
            </div>
        </form>
<?php
    }
