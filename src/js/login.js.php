<?php

use API\Controller\Config;
?>
<style>
    /* SWAL2 - SWEET ALERT */
    .toast-error {
        background-color: #ec2424 !important;
    }

    .toast-success {
        background-color: #17996e !important;
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


    $("#login-form").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        document.getElementById("loading").hidden = false;
        document.getElementById("loading-text").hidden = false;
        document.getElementById("login-form").hidden = true;
        document.getElementById("logando").hidden = true;
        document.getElementById("login-form-text").hidden = true;

        axios.post('<?= Config::BASE_ACTION_URL ?>/login', object)
            .then(function(response) {
                if (response.data.status === "error") {
                    // Se houver erro, exibir mensagem
                    toastr.error(response.data.message, '<?= __("Erro") ?>', {
                        closeButton: true,
                        progressBar: true
                    });

                    // Exibir novamente o formulário
                    document.getElementById("loading").hidden = true;
                    document.getElementById("loading-text").hidden = true;
                    document.getElementById("login-form").hidden = false;
                    document.getElementById("logando").hidden = false;
                    document.getElementById("login-form-text").hidden = false;
                } else {
                    // Login bem-sucedido (sem erro)
                    localStorage.setItem('token', response.data.token); // Armazena o token no localStorage
                    toastr.success('<?= __("Login realizado com sucesso!") ?>', '<?= __("Bem-vindo(a)!") ?>', {
                        closeButton: true,
                        progressBar: true
                    });

                    // Redirecionar para a página correta
                    window.location.href = "<?= Config::BASE_URL ?><?php if ((isset($_SESSION["last_page"])) && ($_SESSION["last_page"] != "")) {
                                                                        echo $_SESSION["last_page"];
                                                                    } else {
                                                                        echo "dashboard";
                                                                    }; ?>";
                }
            })
            .catch(function(error) {
                // Caso ocorra algum erro na requisição, exibir mensagem genérica
                document.getElementById("loading").hidden = true;
                document.getElementById("loading-text").hidden = true;
                document.getElementById("login-form").hidden = false;
                document.getElementById("logando").hidden = false;
                document.getElementById("login-form-text").hidden = false;

                let errorMessage = error.response && error.response.data && error.response.data.message ? error.response.data.message : '<?= __("Ocorreu um erro inesperado.") ?>';

                // Exibir toast com erro
                toastr.error(errorMessage, '<?= __("Erro") ?>', {
                    closeButton: true,
                    progressBar: true
                });
            });
    });


</script>