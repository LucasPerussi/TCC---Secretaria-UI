<?php

use API\Controller\Config;
?>

<script>
    $("#new-password").submit(function(f) {
        f.preventDefault();
        const data = new FormData(f.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/change-password', object)
        .then(function(response) {
                if (response.data.error) {
                    throw response.data;                      
                } else {
                    Swal.fire({
                      title: '<?= __("Feito!") ?>',
                      text: "<?= __("Sua senha foi alterada com sucesso! c: ") ?>",
                      icon: 'success',
                      showCancelButton: false,
                      confirmButtonColor: '#1f8cd4',
                      cancelButtonColor: '#d33',
                      allowOutsideClick: false,
                      confirmButtonText: '<?= __("Legal!") ?>'
                      }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "<?= Config::BASE_URL?>"
                      }
                })
                }
            })     
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("Erro ao alterar sua senha!") ?>',
                    text: 'Houve um erro alterar sua senha. Verifique se o código enviado ao seu email foi informado corretamente, se sua senha é segura e se a corfirmação coincide com a senha.',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
            
    });
</script>

