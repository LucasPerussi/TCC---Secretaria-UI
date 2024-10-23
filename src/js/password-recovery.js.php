<?php

use API\Controller\Config;
?>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })


    $("#new-password").submit(function(f) {
        f.preventDefault();
        const data = new FormData(f.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/password-recovery', object)
        .then(function(response) {
                if (response.data != "sucesso!") {
                    throw response.data;                      
                } else {
                    Swal.fire({
                      title: '<?= __("Feito!") ?>',
                      text: "<?= __("A solicitação foi enviada para seu email! : )") ?>",
                      icon: 'success',
                      showCancelButton: false,
                      confirmButtonColor: '#1f8cd4',
                      cancelButtonColor: '#d33',
                      confirmButtonText: '<?= __("Legal!") ?>'
                      }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "<?= Config::BASE_URL . ""?>"
                      }
                })
                }
            })     
            .catch(function(response) {
                Swal.fire({
                    title: 'Erro ao Alterar senha!',
                    text: response,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
            
    });
</script>
