<?php


/*
* @file        hostConfig_form.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/

    function hostConfig_form()
    {

?>
        <form id="form-tab2" name="host" method="post" action="">
    <h2 class="form-label">Host-Einstellungen</h2>

    <!-- Virtualisierung -->
    <div class="mb-4">
        <h4>Virtualisierung</h4>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="virtualHost" name="virtualHost">
            <label class="form-check-label" for="virtualHost">Virtualisierungs-Host</label>
        </div>
        <div class="mb-3">
            <label for="product" class="form-label">Produkt <i class="fas fa-info-circle tooltip-icon" data-bs-toggle="tooltip" title="Name des Virtualisierungsprodukts"></i></label>
            <input type="text" class="form-control" id="product" name="product">
        </div>
        <div class="mb-3">
            <label for="version" class="form-label">Version <i class="fas fa-info-circle tooltip-icon" data-bs-toggle="tooltip" title="Version des Virtualisierungsprodukts"></i></label>
            <input type="text" class="form-control" id="version" name="version">
        </div>
    </div>

    <!-- IP-Adresse für GLORIOX ERP -->
    <div class="mb-4">
        <h4>IP-Adresse für GLORIOX ERP</h4>
        <div class="mb-3">
            <label for="erpIp" class="form-label">IP-Adresse</label>
            <input type="text" class="form-control" id="erpIp" name="erpIp">
        </div>
        <div class="mb-3">
            <label for="subnet" class="form-label">Subnetzmaske</label>
            <input type="text" class="form-control" id="subnet" name="subnet">
        </div>
        <div class="mb-3">
            <label for="gateway" class="form-label">Gateway</label>
            <input type="text" class="form-control" id="gateway" name="gateway">
        </div>
        <div class="mb-3">
            <label for="dns" class="form-label">DNS</label>
            <input type="text" class="form-control" id="dns" name="dns">
        </div>
    </div>

    <!-- IP-Adresse für die Datensicherung -->
    <div class="mb-4">
        <h4>IP-Adresse für die Datensicherung</h4>
        <label class="form-label d-block">Protokoll</label>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="backupProtocol[]" value="SFTP" id="backupSFTP">
            <label class="form-check-label" for="backupSFTP">SFTP</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="backupProtocol[]" value="FTP" id="backupFTP">
            <label class="form-check-label" for="backupFTP">FTP</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="backupProtocol[]" value="SMB" id="backupSMB">
            <label class="form-check-label" for="backupSMB">SMB</label>
        </div>
        <div class="mb-3">
            <label for="backupIp" class="form-label">IP-Adresse</label>
            <input type="text" class="form-control" id="backupIp" name="backupIp">
        </div>
        <div class="mb-3">
            <label for="backupShare" class="form-label">Freigabename</label>
            <input type="text" class="form-control" id="backupShare" name="backupShare">
        </div>
        <div class="mb-3">
            <label for="backupUser" class="form-label">Benutzername</label>
            <input type="text" class="form-control" id="backupUser" name="backupUser">
        </div>
        <div class="mb-3">
            <label for="backupPass" class="form-label">Passwort</label>
            <input type="password" class="form-control" id="backupPass" name="backupPass">
        </div>
    </div>

    <!-- IP-Adresse für Verbindung externer Laufwerke -->
    <div class="mb-4">
        <h4>IP-Adresse für die Verbindung externer Laufwerke</h4>
        <label class="form-label d-block">Protokoll</label>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="externalProtocol[]" value="SFTP" id="externalSFTP">
            <label class="form-check-label" for="externalSFTP">SFTP</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="externalProtocol[]" value="FTP" id="externalFTP">
            <label class="form-check-label" for="externalFTP">FTP</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="externalProtocol[]" value="SMB" id="externalSMB">
            <label class="form-check-label" for="externalSMB">SMB</label>
        </div>
        <div class="mb-3">
            <label for="externalIp" class="form-label">IP-Adresse</label>
            <input type="text" class="form-control" id="externalIp" name="externalIp">
        </div>
        <div class="mb-3">
            <label for="externalShare" class="form-label">Freigabename</label>
            <input type="text" class="form-control" id="externalShare" name="externalShare">
        </div>
        <div class="mb-3">
            <label for="externalUser" class="form-label">Benutzername</label>
            <input type="text" class="form-control" id="externalUser" name="externalUser">
        </div>
        <div class="mb-3">
            <label for="externalPass" class="form-label">Passwort</label>
            <input type="password" class="form-control" id="externalPass" name="externalPass">
        </div>
    </div>
</form>

<?php
    }