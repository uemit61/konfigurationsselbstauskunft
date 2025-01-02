

/**
* @file        mainForm.js
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/


$(document).ready(function()
{
 
    console.log('Login erfolgreqdqdqedich.');

    $.ajax
    (
        {
            url: './temp/session/mySession',
            type: 'GET',
            success: function(data)
            {
                var form_data = JSON.parse(data);
                    Object.keys(form_data).forEach
                    (
                        function(formId)   
                        {
                            Object.keys(form_data[formId]).forEach
                            (
                                function(inputId)
                                {
                                    $(formId).find('#' + inputId).val(form_data[formId][inputId]);
                                }
                            )
                        }
                    )
            },
            error: function(error)
            {
                console.log(error);
            } ,
            complete: function()
            {
                console.log('finished');
            }      
        }
    );

    let currentTabIndex = 0;
    const tabs = $('#tabs .nav-link');
    const tabContents = $('.tab-pane');
    const tabId = $(this).data('tab-id');
    const formTabId = '#formTab'+(currentTabIndex+1);
    let formId = '#form-tab'+(currentTabIndex+1);
    let urlStr = '/.controller/formTab'+currentTabIndex+'_Controller.php';
    let btnTxt = '';
    var form_ids = ['form-tab1','form-tab2','form-tab3','form-tab4','form-tab5'];
    
 
    function sanitizeInput(formId)
    {
        return $(formId).serializeArray().reduce
                (
                    function(acc, field) 
                    {
                        acc[field.name] = DOMPurify.sanitize(field.value.trim()) ?? '';
                        return acc;
                    }     
                    ,
                    {}
                );
    };
    


    function updateTabs() 
    {    
        tabs.removeClass('active');
        tabContents.removeClass('show active');
        $(tabs[currentTabIndex]).addClass('active');
        $(tabContents[currentTabIndex]).addClass('show active');
        btnTxt =  $('.nav-link.active').data('name') + ' speichern';
        $('#btn').text(btnTxt);
        formId = '#form-tab'+(currentTabIndex+1);
    };



    // Navigation "Weiter"
    function tap_forward() 
    {
        if (currentTabIndex < tabs.length - 1) 
        {
            currentTabIndex++;
            updateTabs();
        }
    };

    

    // Navigation "Zurück"
    function tap_back() 
    {
        if (currentTabIndex > 0) {
            currentTabIndex--;
            updateTabs();
        }
    };

    function save_tabFrom_to_Db() 
    {

        const formData =sanitizeInput(formId);
        console.log(formId);
        $.ajax
        ({
            url: './index.php',
            method: 'POST',
            contentType: 'application/json',
            data:  JSON.stringify({ formJson: formData, page: $(formId).attr('name')}),
            success: function () {
                console.log('Daten erfolgreich gesendet:');
            },
            error: function (error) {
                console.error('Fehler bei der Anfrage:');
            },
            complete: function () 
            {
                console.log('Daten wurden erfolgreich in die Datenbank geschrieben:');
            }
        });
        
    };


        setInterval
        (
            function()
            {

                var form_data ={};
                $.each
                (
                    form_ids, 
                    function(i,form_id)
                    {
                        var form_id = '#'+form_id;
                        form_data[form_id] =sanitizeInput(form_id);
                    }
                );

                
                $.ajax
                (
                    { 
                        url: './index.php',
                        method: 'POST',
                        contentType: 'application/json',
                        data:  JSON.stringify({json_form_data: JSON.stringify(form_data), 'page':'save_json_cache'} ),
                        success: function (response) 
                        {
                            var line = response.split('\n');
                            console.log
                            (
                                'Daten erfolgreich gesendet. ',
                                line[13]
                            );
                        },
                        error: function (xhr, status, error) 
                        {
                            console.error
                            (
                                'Fehler bei der Anfrage:', 
                                error
                            );
                        },
                        complete: function ()
                        {
                            console.log
                            (
                                "Die Daten wurden nur in ein  Cache gespeichert,\n"
                                +"um in die Datenbank zu speichern,\n"
                                +"drücken Sie auf die Speicherbuttons.\n"
                                +"Nächste Speicherung in 5 sekunden"
                                
                            );
                        }
                    }
                );
            },
            
            5000
        );  

    // $.ajax // könnte auch über eien $_SESSION verwirklicht werden Kommentar nicht vergessen!
    // ({
    //     url: './view/main_form.php',
    //     method: 'GET',
    //     /* 
    //         Die `success`-Funktion im bereitgestellten Codeausschnitt verarbeitet die Antwort, die von einer
    //         AJAX-GET-Anfrage an '/main_form.php' empfangen wurde. Hier ist eine Aufschlüsselung dessen, was sie tut: 
    //     */
    //     success: function (response) 
    //     {

    //         if (!response || Object.keys(response).length === 0)    
    //         {
    //             return;
    //         }
        
    //         /* Wenn Daten vorhanden sind, das Formular füllen */
    //         Object.entries(response).forEach(([key, value]) => {
    //             const sanitizedValue = $('<div>').text(value).html();
    //             $($formId + `[name=${key}]`).val(sanitizedValue);
    //         });
    //     },
    //     error: function () 
    //     {
    //         alert('Fehler beim Laden der Benutzerdaten.');
    //     }
    // });

    window.tap_back = tap_back;
    window.tap_forward = tap_forward;
    window.save_tabFrom_to_Db = save_tabFrom_to_Db;
    
});
 

