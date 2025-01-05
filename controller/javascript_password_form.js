

/**
* @file        javascript_start_form.js
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/
$(document).ready(function () 
{
    console.log('loading');
    // Prüfung der Passwort Erstellung (mit jeder Buchtabeneingabe keyup)


        /**
        * The function `password_input_validation` checks the validity of a password input field based
        * on length, character requirements, and matching confirmation password.
        * * @author      Ümit Yildirim hopes61@icloud.com
        * @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
        * @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
        * @version     1.0.0
* @since       2024-12-18
         */
        function password_input_validation()
        {
            const password = $('#password').val();
            const confirmPassword = $('#confirm_password').val();

            let regex = /^(?=.*[A-Z])(?=.*[!$%^&*(),.?:{}|])[a-zA-Z0-9!$%^&*(),.?:{}|]+$/ 
            let regex2 = /[@#'<>"=]/;  // Nur Zeichen, die nicht @#'<>= enthalten

            if(password.length <8)
            {   
                if(password.length > 0)
                {
                    $('#password').removeClass('is-valid').addClass('is-invalid');
                    $('#password_feedback').removeClass('valid-feedback','green').addClass('invalid-feedback','red');
                    $('#password_feedback').text('Das Passwort muss mindesten 8 Zeichen lang sein.').show();
                    $('#save_password').prop('disabled', true);
                    
                }
                else
                {
                    $('#password').removeClass('is-invalid');
                    $('#password').removeClass('is-valid');
                    $('#password_feedback').text('').show();
                    $('#save_password').prop('disabled', true);
                }
                
            }
            else if(regex2.test(password))
                {
                    $('#password').removeClass('is-valid').addClass('is-invalid');
                    $('#password_feedback').removeClass('valid-feedback','green').addClass('invalid-feedback','red');
                    $('#password_feedback').text('Das Passwort darf keines der folgenden Zeichen enthalten: @ # \' < > " =').show();
                    $('#save_password').prop('disabled', true);
                }
            else if(!regex.test(password))
            {
                $('#password').removeClass('is-valid').addClass('is-invalid');
                $('#password_feedback').removeClass('valid-feedback','green').addClass('invalid-feedback','red');
                $('#password_feedback').text('Das Passwort muss mindestens ein Großbuchtaben und ein Sonderzeichen enthalten').show();
                $('#save_password').prop('disabled', true);
            }
            else
            {
                $('#password').removeClass('is-invalid').addClass('is-valid');
                $('#password_feedback').removeClass('invalid-feedback','red').addClass('valid-feedback','green');

                $('#password_feedback').text('Is correct!').show();

                if(password !== confirmPassword)
                {
                    if(confirmPassword.length>0)
                    {
                        $('#confirm_password').removeClass('is-valid').addClass('is-invalid');
                        $('#confirm_password_feedback').removeClass('valid-feedback').addClass('invalid-feedback');
                        $('#confirm_password_feedback').text("Die Passwörter stimmen nicht überein.").show();
                        $('#save_password').prop('disabled', true);
                    }
                    else
                    {
                        $('#confirm_password').removeClass('is-valid',);
                        $('#confirm_password').removeClass('is-invalid');
                        $('#confirm_password_feedback').text("").show();
                    }
                    
                }
                else
                {
                    $('#confirm_password').removeClass('is-invalid').addClass('is-valid');
                    $('#confirm_password_feedback').removeClass('invalid-feedback','red').addClass('valid-feedback','green');
                    $('#confirm_password_feedback').text('Is correct').show();
                    $('#save_password').prop('disabled', false);
                }
            }
        }
        window.password_input_validation = password_input_validation;
});
