<?php

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Flash-Meldung</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <!-- Container für Flash-Meldungen -->
    <div id="flash-meldung-container"></div>

    <!-- Template für die Flash-Meldung -->
    <template id="flash-meldung-template">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Falsche Login-Daten! Bitte versuche es erneut.
        <button type="button" class="close" data-dismiss="alert" aria-label="Schließen">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </template>

    <!-- Login-Button (um falsche Login-Daten zu simulieren) -->
    <button id="loginBtn" class="btn btn-primary">Falschen Login versuchen</button>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function(){
      // Funktion, die die Flash-Meldung hinzufügt
      $("#loginBtn").click(function(){
        // Holen des Template-Inhalts
        var template = $("#flash-meldung-template").html();
        
        // Die Flash-Meldung in den Container anhängen
        $("#flash-meldung-container").append(template);
      });

      // Funktion zum Entfernen der Flash-Meldung, wenn der Schließen-Button geklickt wird
      $(document).on('click', '.close', function(){
        // Entfernen des Eltern-Elements der Schließen-Schaltfläche (also die ganze Flash-Meldung)
        $(this).closest('.alert').remove();
      });
    });
  </script>
</body>
</html>

?>


