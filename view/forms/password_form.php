<?php

    function password_form()
    {
?>
        <div class="container">
            <h4 class="login-header">Passwort erstellen</h4>
            <form class="row g-3" method="post" action="" novalidate>
                <div class="login-container bg-light p-4 ">
                    <label for="Loginname" class="form-label">Neues Passwort</label>
                        <i class="fa-solid fa-circle-info"  data-toggle="tooltip" data-placement="top" title="asdfgarfg"></i> 

                        <div class="mb-3 position-relative input-group">
                            <input type="password" class="form-control" id="password" name="Password" required>
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <div class="invalid-feedback mb-3" id="password_feedback"></div>

                    <label for="Password" class="form-label">Passwort Wiederholen</label>
                    <div class="mb-3 position-relative input-group">
                        <input type="password" class="form-control" id="confirm_password">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <div class="invalid-feedback mb-3" id="confirm_password_feedback"></div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success" id="save_password" disabled>Speichern</button>
                    </div>
                </div>
            </form>
        </div>

<?php
    }