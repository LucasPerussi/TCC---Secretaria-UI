<?php

use API\Controller\Config;
?>
<style>
    .toast-error {
        background-color: #ec2424 !important;
    }

    .toast-success {
        background-color: #17996e !important;
    }
</style>
<script>
            // Função para alternar os temas
            function toggleLogo(thema) {
                if (thema == "dark") {
                    document.getElementById("logoParaDark").hidden = false;
                    document.getElementById("logoParaBranco").hidden = true;

                } else {
                    document.getElementById("logoParaBranco").hidden = false;
                    document.getElementById("logoParaDark").hidden = true;

                }
            }
        </script>

<script>
            function verificaForcaSenha() {
                var numeros = /([0-9])/;
                var alfabeto = /([A-Z])/;
                var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

                if ($('#password').val().length < 8) {
                    $('#password-status').html(
                        "<span style='color:pink'>Weak, your password must have at least 8 characters.</span>");
                } else {
                    if ($('#password').val().match(numeros) && $('#password').val().match(alfabeto) && $('#password').val()
                        .match(chEspeciais)) {
                        $('#password-status').html("<span style='color:#20B2AA'><b>Strong!</b></span>");
                    }
                    if (!$('#password').val().match(numeros)) {
                        $('#password-status').html(
                            "<span style='color:orange'><b>Medium, your password must have at least a number!</b></span>");
                    }
                    if (!$('#password').val().match(alfabeto)) {
                        $('#password-status').html(
                            "<span style='color:orange'><b>Medium, your password must have at least a capital letter!</b></span>"
                        );
                    }
                    if (!$('#password').val().match(chEspeciais)) {
                        $('#password-status').html(
                            "<span style='color:orange'><b>Medium, your password must have at least a special character!</b></span>"
                        );
                    }
                }
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        </script>
        <script>
            function check_pass() {
                if (document.getElementById('password').value ==
                    document.getElementById('confirm_password').value) {
                    document.getElementById('submit').disabled = false;
                    document.getElementById('confirm_password').style.border = ' 1px solid green ';
                } else {
                    document.getElementById('confirm_password').style.border = ' 1px solid red ';
                    document.getElementById('submit').disabled = true;
                }
            }
        </script>
        <script>
            // theme-switch.js
            document.addEventListener('DOMContentLoaded', function() {
                const lightThemeLink = document.querySelector('link[href="masterLight.css"]');
                const darkThemeLink = document.querySelector('link[href="masterDark.css"]');

                // Verificar se o tema escuro é preferido
                const darkThemeQuery = window.matchMedia('(prefers-color-scheme: dark)');

                // Função para alternar os temas
                function toggleTheme() {
                    if (darkThemeQuery.matches) {
                        toggleLogo("dark");

                    } else {
                        toggleLogo("Light");

                    }
                }

                // Inicializar e ouvir alterações no tema
                toggleTheme();
                darkThemeQuery.addListener(toggleTheme);
                lightThemeLink.addListener(toggleTheme);
            });
        </script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })


    $("#register-form").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        document.getElementById("loading").hidden = false;
        document.getElementById("loading-text").hidden = false;
        document.getElementById("criando").hidden = true;


        axios.post('<?= Config::BASE_ACTION_URL ?>/signup', object)
            .then(function(response) {
                if (response.data.status === "error") {
                    document.getElementById("criando").hidden = false;
                    document.getElementById("loading").hidden = true;
                    document.getElementById("loading-text").hidden = true;
                    toastr.error(response.data.message, '<?= __("Erro") ?>', {
                        closeButton: true,
                        progressBar: true
                    });
                } else {
                    toastr.success('<?= __("Cadastro realizado com sucesso!") ?>', '<?= __("Bem-vindo(a)!") ?>', {
                        closeButton: true,
                        progressBar: true
                    });

                    window.location.href = "<?= Config::BASE_URL ?>dashboard";

                }
            })
            .catch(function(error) {
                document.getElementById("criando").hidden = false;
                document.getElementById("loading").hidden = true;
                document.getElementById("loading-text").hidden = true;;

                let errorMessage = error.response && error.response.data && error.response.data.message ? error.response.data.message : '<?= __("Ocorreu um erro inesperado.") ?>';

                toastr.error(errorMessage, '<?= __("Erro") ?>', {
                    closeButton: true,
                    progressBar: true
                });
            });
    });
</script>