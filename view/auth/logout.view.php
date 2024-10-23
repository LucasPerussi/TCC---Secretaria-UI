<?php

use API\Controller\Config;
 
?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Support/src/js/sweetalert2.all.min.js"></script>
    <script src="Support/src/css/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="Support/src/css/sweetalert2.min.css">

              
  </head>
  <?php
    
// empty value and old timestamp
      // require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>


  <script>

    function logout() {
        setCookie('keep', '', -1);

        // Swal.fire({
        //     title: '<?= __("Feito!") ?>',
        //     text: "<?= __("Sua sessão foi encerrada com sucesso") ?>",
        //     icon: 'success',
        //     showCancelButton: false,
        //     confirmButtonColor: '#1f8cd4',
        //     cancelButtonColor: '#d33',
        //     allowOutsideClick: false,
        //     confirmButtonText: '<?= __("Legal!") ?>',
        //     backdrop: `
        //             #007aff
        //             url("")
        //             left top
        //             no-repeat
        //         `
        // }).then((result) => {
        //     if (result.isConfirmed) {
                window.location.href = "<?= Config::BASE_URL . "closing-session" ?>"
        //     }
        // });
    }



    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }


</script>
<script>logout();</script>
   
</html>