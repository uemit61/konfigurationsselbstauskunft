<?php

    function login_form()
    {
?>
         <div class="container">
            <h4 class="login-header">Anmeldung</h4>
            <div class="login-container bg-light p-3 ">
                <form method="post" id="form_login" name="login_page" action="">
                    
                    <label for="Loginname" class="form-label">Benutzername oder email adresse</label>
                    <div class="mb-2 position-relative input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="username" name="Loginname">
                    </div>  

                    <label for="Password" class="form-label">Password</label>
                    <div class="mb-2 position-relative input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="Password">
                    </div>  
                    <div class="d-grid">
                        <input type="submit" id="loginBtn" name="btn" value="Anmelden" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

<?php
    }