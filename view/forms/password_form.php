<?php

    function password_form()
    {
?>
        <div class="container">
            <h4 class="login-header">Passwort erstellen</h4>
            <div class="login-container bg-light p-4 ">
            <form id="form_password" class="row g-3" name="password_set" method="post" action="">
                
                    <label for="Loginname" class="form-label">Neues Passwort</label>
                        <div class="mb-3 position-relative input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input onkeyup="password_input_validation()" type="password" class="form-control" id="password" name="Password" required>
                            
                        </div>
                        <div class="invalid-feedback mb-3" id="password_feedback" sh></div>

                    <label for="Password" class="form-label">Passwort Wiederholen</label>
                    <div class="mb-3 position-relative input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input onkeyup="password_input_validation()" type="password" name="password" class="form-control" id="confirm_password">
                        
                    </div>
                    <div class="invalid-feedback mb-3" id="confirm_password_feedback"></div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-success" name="btn" value="Speichern" id="save_password" disabled></input>
                    </div>
                    
            </form>
                    
            </div>
        </div>

<?php
    }