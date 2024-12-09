<?php

use API\Controller\Config;
?>
<script>
    $("#allowChange").submit(function(event) {
        event.preventDefault(); // Evita o comportamento padrão do formulário

        const formData = new FormData(event.target); // Captura os dados do formulário
        const formObject = Object.fromEntries(formData.entries()); // Converte para objeto

        axios.post('<?= Config::BASE_ACTION_URL ?>/recovery-password', formObject)
            .then(function(response) {
                // Verifica se o status é diferente de 200
                if (response.data.status !== 200) {
                    throw response.data; // Lança um erro para ser capturado no catch
                } else {
                    try {
                        // Realiza o parse da string JSON contida em 'response.data.response'
                        const nestedResponse = JSON.parse(response.data.response);

                        // Verifica se 'recoveryCode' está presente
                        if (nestedResponse.data && nestedResponse.data.recoveryCode) {
                            const recoveryCode = nestedResponse.data.recoveryCode;

                            // Redireciona para a página de alteração de senha com o recoveryCode
                            window.location.href = "<?= Config::BASE_URL . "change-password-recovery?validate=" ?>" + encodeURIComponent(recoveryCode);
                        } else {
                            // Se 'recoveryCode' não estiver presente, lança um erro
                            throw { message: "Recovery code not found." };
                        }
                    } catch (parseError) {
                        // Trata erros de parsing ou ausência de 'recoveryCode'
                        console.error("Erro ao processar a resposta:", parseError);
                        Swal.fire({
                            title: 'Erro ao Alterar senha!',
                            text: "Ocorreu um erro inesperado. Por favor, tente novamente.",
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#1f8cd4',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?= __("OK") ?>'
                        });
                    }
                }
            })
            .catch(function(error) {
                // Loga o erro para depuração
                console.error("Erro na requisição:", error);

                // Exibe uma mensagem de erro para o usuário
                Swal.fire({
                    title: 'Erro ao Alterar senha!',
                    text: "Verifique os dados e tente novamente.",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                });
            });
    });
</script>