<?php

use API\Controller\Config;
?>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>


const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

  
  $("#join").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?=Config::BASE_ACTION_URL?>/company/domain', object)
            .then(function(response) {
                if (response.data != "sucesso!") {
                    throw response.data;
                } else {
                    document.getElementById("send").disabled = true;
                    document.getElementById("send").hidden = true;
                    document.getElementById("domain").disabled = true;
                    document.getElementById("domain").hidden = true;
                    document.getElementById("confirmation").hidden = false;
                    Toast.fire({
                        icon: 'success',
                        title: 'Solicitação enviada para um administrador.'
                        })
                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: '<?=__("Solicitação falhou!")?>',
                    text: "<?= __("Houve um erro ao realizar sua solicitação, tente novamente.") ?>",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?=__("OK")?>'
                })
            });
    });

  
</script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">