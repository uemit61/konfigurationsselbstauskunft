
/**
* @file        formTab1_Controller.php
* @author      Ümit Yildirim hopes61@icloud.com
* @copyright   Copyright (c) 2024, Ümit Yildirim. Alle Rechte vorbehalten.
* @license     Diese Datei darf nicht ohne Zustimmung des Autors weitergegeben oder verändert werden.
* @version     1.0.0
* @since       2024-12-18
*/



$(document).ready(function () 
{
    
    let currentTabIndex = 0;
    const tabs = $('#tabs .nav-link');
    const tabContents = $('.tab-pane');
    const tabId = $(this).data('tab-id');
    const formTabId = '#formTab'+(currentTabIndex+1);
    let formId = '#form-tab'+(currentTabIndex+1);
    let urlStr = '/.controller/formTab'+currentTabIndex+'_Controller.php';
    let btnTxt = '';
    
 
    function sanitizeInput(array)
    {

        const retVal = {};
        $(array).serializeArray().forEach(function (item) 
        {
            retVal[item.name] = DOMPurify.sanitize(item.value.trim());
        });

        return retVal;
        
    };
    

    /*
        Die Funktion `updateTabs` wird verwendet, um den aktiven Tab und dessen Inhalt zu aktualisieren,
        während auch der Text eines Buttons basierend auf den Daten des aktiven Tabs aktualisiert wird.
    */
    function updateTabs() 
    {    
        tabs.removeClass('active');     // der aktive Tab wird deaktiviert
        tabContents.removeClass('show active'); // der Tabinhalt wird unsichtbar gemacht
        $(tabs[currentTabIndex]).addClass('active');   // der aktulle Tab wird aktiviert
        $(tabContents[currentTabIndex]).addClass('show active'); // der Tabinhalt wird sichtbar gemacht
        btnTxt =  $('.nav-link.active').data('name') + ' speichern';
        $('#btn').text(btnTxt);
        formId = '#form-tab'+(currentTabIndex+1);
    };



    // Navigation "Weiter"
    $('#nextBtn').click(function () 
    {
        if (currentTabIndex < tabs.length - 1) {
            currentTabIndex++;
            updateTabs();
        }
    });

    

    // Navigation "Zurück"
    $('#prevBtn').click(function () 
    {
        if (currentTabIndex > 0) {
            currentTabIndex--;
            updateTabs();
        }
    });

    /* 
        Der bereitgestellte Codeausschnitt ist ein Ereignishandler für einen Klick auf das Element mit der ID `btn`.
    */
    $('#btn').click(function () 
    {

        const formData =sanitizeInput(formId);
        console.log(formId);
        $.ajax
        ({
            url: './index.php',
            method: 'POST',
            contentType: 'application/json',
            data:  JSON.stringify({ formJson: formData, page: $(formId).attr('name')}),
            success: function (response) {
                console.log('Daten erfolgreich gesendet:', response);
            },
            error: function (xhr, status, error) {
                console.error('Fehler bei der Anfrage:', error);
            }
        });
        
    });

    $.ajax // könnte auch über eien $_SESSION verwirklicht werden Kommentar nicht vergessen!
    ({
        url: './view/main_form.php',
        method: 'GET',
        /* 
            Die `success`-Funktion im bereitgestellten Codeausschnitt verarbeitet die Antwort, die von einer
            AJAX-GET-Anfrage an '/main_form.php' empfangen wurde. Hier ist eine Aufschlüsselung dessen, was sie tut: 
        */
        success: function (response) 
        {

            if (!response || Object.keys(response).length === 0)    
            {
                return;
            }
        
            /* Wenn Daten vorhanden sind, das Formular füllen */
            Object.entries(response).forEach(([key, value]) => {
                const sanitizedValue = $('<div>').text(value).html();
                $($formId + `[name=${key}]`).val(sanitizedValue);
            });
        },
        error: function () 
        {
            alert('Fehler beim Laden der Benutzerdaten.');
        }
    });
});