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

    // function setTopo() {
    //     $(window).scrollTop(0);
    // }
    // $(window).bind('scroll', setTopo);

    $("#verify-email").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/verify/email', object)
            .then(function(response) {
                if (response.data == "sucesso") {
                    Swal.fire({
                      title: '<?= __("Feito!") ?>',
                      text: "<?= __("Seu email foi validado com sucesso!") ?>",
                      icon: 'success',
                      showCancelButton: false,
                      allowOutsideClick: false,
                      confirmButtonColor: '#1f8cd4',
                      cancelButtonColor: '#d33',
                      confirmButtonText: '<?= __("Legal!") ?>'
                      }).then((result) => {
                      if (result.isConfirmed) {
                          <?php //$_SESSION["email_verified"] = true;?>
                        window.location.href = "<?= Config::BASE_URL?>complete-your-profile"
                      }
                    })               
                } else {
                    Swal.fire({
                        title: '<?= __("Verificação falhou!") ?>',
                        text: 'Houve um erro ao validar seu email, verifique o código e tente novamente.',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("OK") ?>'
                    })
                }
            }) 
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("Verificação falhou!") ?>',
                    text: 'Houve um erro ao validar seu email, verifique o código e tente novamente.',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
    });
</script>
