<?php

use API\Controller\Config;

unset($_COOKIE['vr_session']);
?>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<title>Logout</title>
<link rel="apple-touch-icon" href="src/img/favcon-vr.ico">
<link rel="shortcut icon" type="image/x-icon" href="src/img/favcon-vr.ico">
<link rel="stylesheet" href="sweetalert2.min.css"> -->

<!-- <script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    function setTopo() {
        $(window).scrollTop(0);
    }
    $(window).bind('scroll', setTopo);




    // function logout() {
    //     setCookie('keep','',-1);
    //     axios.post('<?= Config::BASE_ACTION_URL ?>/user/logout')
    //     .then(function(response) {
    //         if (response.data.error) {
    //             throw response.data;                     
    //         } else {
    //             Swal.fire({
    //                 title: '<?= __("Feito!") ?>',
    //                 text: "<?= __("Sua sessão foi encerrada com sucesso") ?>",
    //                 icon: 'success',
    //                 showCancelButton: false,
    //                 confirmButtonColor: '#1f8cd4',
    //                 cancelButtonColor: '#d33',
    //                 allowOutsideClick: false,
    //                 confirmButtonText: '<?= __("Legal!") ?>',
    //                 backdrop: `
    //                     #007aff
    //                     url("")
    //                     left top
    //                     no-repeat
    //                 `
    //                 }).then((result) => {
    //                 if (result.isConfirmed) {
    //                 window.location.href = "<?= Config::BASE_URL . "closing-session" ?>"
    //                 }
    //             });
    //         }

    //     })
    //     .catch(function(error) {
    //         Swal.fire({
    //             title: '<?= __("Sua sessão não foi encerrada com sucesso! :(") ?>',
    //             text: error.message,
    //             icon: 'error',
    //             showCancelButton: false,
    //             confirmButtonColor: '#1f8cd4',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: '<?= __("OK") ?>'
    //         })
    //     });
    // };

    function logout() {
        setCookie('keep', '', -1);

        Swal.fire({
            title: '<?= __("Feito!") ?>',
            text: "<?= __("Sua sessão foi encerrada com sucesso") ?>",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#1f8cd4',
            cancelButtonColor: '#d33',
            allowOutsideClick: false,
            confirmButtonText: '<?= __("Legal!") ?>',
            backdrop: `
                    #007aff
                    url("")
                    left top
                    no-repeat
                `
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= Config::BASE_URL . "closing-session" ?>"
            }
        });
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
</script> -->