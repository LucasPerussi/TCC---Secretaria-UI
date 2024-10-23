<?php

use API\Controller\Config;
?>
<style>
    /* SWAL2 - SWEET ALERT */
div:where(.swal2-container) div:where(.swal2-popup) {
  background-color: #0e0909d0 !important;
  filter: blur();
  backdrop-filter: blur(2px);
  backdrop-filter: url(filters.svg#filter) blur(4px) saturate(150%);
  border-radius:20px;
}
.swal2-title{
  color: white !important;
}
.swal2-input{
  background-color: #27282B;
  color: white;
}
.swal2-html-container{
  color: white !important;
}
.swal2-confirm{
  border-radius: 20px !important;
  color: white !important;
}
.swal2-deny{
  border-radius: 20px !important;
  color: white !important;
}
/* END SWEET ALERT */
</style>
<script>
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

    function cookiesAutorization() {
        if (document.getElementById('remember-me').checked) {
            Swal.fire({
                title: '<?= __("Autorização do uso de Cookies") ?>',
                html: 'Nós precisamos de cookies para manter sua sessão aberta. ' +
                    '<a target="_blank" href="<?=Config::BASE_URL . 'terms'?>">Políticas</a> ',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#1f8cd4',
                showDenyButton: true,
                denyButtonColor: '#B22222',
                allowOutsideClick: false,
                denyButtonText: 'Recusar',
                confirmButtonText: 'Aceitar'
            }).then((result) => {
                if (result.isConfirmed) {
                    setCookie('keep', 'keep', 1);
                    document.getElementById("accepted").hidden = false;
                    // Swal.fire('Saved!', 'Sua sessão ficará aberta por 30 dias! c:', 'success')
                } else if (result.isDenied) {
                    // Swal.fire('Sem problemas! So usaremos os cookies extritamente necessários então. c:', '', 'info');
                    document.getElementById('remember-me').checked = false;
                    document.getElementById("denied").hidden = false;
                }
            })
        } else {
            setCookie('keep', '0', 7);
        }
    }
    document.getElementById('remember-me').addEventListener("change", oculta)
    function oculta(){
        document.getElementById("denied").hidden = true;
        document.getElementById("accepted").hidden = true;

    }




    $("#login-form").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        document.getElementById("loading").hidden = false;
        document.getElementById("loading-text").hidden = false;
        document.getElementById("login-form").hidden = true;
        document.getElementById("logando").hidden = true;
        document.getElementById("login-form-text").hidden = true;
        axios.post('<?= Config::BASE_ACTION_URL ?>/user/login', object)
            .then(function(response) {
                if (response.data.error) {
                    throw response.data;
                } else {
                    if (response.data == "Welcome!") {
                        window.location.href = "<?= Config::BASE_URL ?><?php if ((isset($_SESSION["last_page"])) && ($_SESSION["last_page"] != "")) {
                                                                            echo $_SESSION["last_page"];
                                                                        } else {
                                                                            
                                                                                echo "dashboard";
                                                                            
                                                                        }; ?>";
                    } else if (response.data == "doubleStepRequired") {
                        window.location.href = "<?= Config::BASE_URL ?>double-stepping";
                    } else {
                        document.getElementById("loading").hidden = true;
                        document.getElementById("loading-text").hidden = true;
                        document.getElementById("login-form").hidden = false;
                        document.getElementById("logando").hidden = false;
                        document.getElementById("login-form-text").hidden = false;
                        Swal.fire({
                            title: '<?= __("Erro ao logar!") ?>',
                            text: response.data,
                            icon: 'error',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: '#1f8cd4',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?= __("Legal!") ?>'
                        }).then((result) => {
                            if (result.isConfirmed) {}
                        })
                    }

                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("Register failed!") ?>',
                    text: error.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
    });

    // $("#login-form").submit(function(e) {
    //     e.preventDefault();
    //     const data = new FormData(e.target);
    //     const object = Object.fromEntries(data.entries());
    //     axios.post('<?= Config::BASE_ACTION_URL ?>/user/login', object)
    //         .then(function(response) {
    //             console.log(response);
    //             if (response.data.error) {
    //                 if (response.data.message == "An authorization request was sent to your email"){
    //                     window.location.href = "<?= Config::BASE_URL . "new-location" ?>"
    //                 } else{
    //                   throw response.data;                      
    //                 }
    //             } else {
    //                 // else {
    //                 //     alert("You didn't check it! Let me check it for you.");
    //                 // }
    //                 window.location.href = "<?= Config::HOME_URL ?>"
    //             }
    //         })
    //         .catch(function(error) {
    //             Swal.fire({
    //                 title: '<?= __("Login failed!") ?>',
    //                 text: error.message,
    //                 icon: 'error',
    //                 showCancelButton: false,
    //                 confirmButtonColor: '#1f8cd4',
    //                 cancelButtonColor: '#d33',
    //                 confirmButtonText: '<?= __("OK") ?>'
    //             })
    //         });
    // });

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
</script>