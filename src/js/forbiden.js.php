<?php

use API\Controller\Config;
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="apple-touch-icon" href="src/img/favcon-vr.ico">
<link rel="shortcut icon" type="image/x-icon" href="src/img/favcon-vr.ico">
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    $(window).on('load', function() {
        forbiden();
    })

    function setTopo() {
        $(window).scrollTop(0);
    }
    $(window).bind('scroll', setTopo);

    
    function forbiden() {
                Swal.fire({
                    title: '<?= __("Bu! 👻") ?>',
                    text: "<?= __("Você não devia estar aqui! ") ?>",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    allowOutsideClick: false,
                    confirmButtonText: '<?= __("Voltar para casa!") ?>',
                    backdrop: `
                        rgba(28,28,28,28)
                        url("")
                        left top
                        no-repeat
                    `
                    }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = "<?= Config::BASE_URL?>"
                    }
                });
            }
        
     

</script>
