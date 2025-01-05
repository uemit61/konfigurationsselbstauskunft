
<?php

/*
* @file        header_login.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-22
*/
    function login_header()
    
    {
?>
        <header class="bg-white p-3">
            <nav class="navbar navbar-dark bg-white d-flex  justify-content-center  align-items-center">
                <!-- Logo -->
                <a class="navbar-brand">
                    <img src="" alt="Logo" class="logo" style="max-width: 150px;">
                </a>
            </nav>
        </header>

<?php
    }

    function logout_header()
    {
?>
        <header class="bg-white p-3">
            <nav class="navbar navbar-dark bg-white d-flex  justify-content-between  align-items-center">
                <!-- Logo -->
                <a class="navbar-brand disabled">
                    <img src='/view/images/LogoHeintze.png' alt="Logo" class="logo" style="max-width: 150px;"> // Logo des Kunden
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
<?php
    }