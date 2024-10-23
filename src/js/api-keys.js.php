<?php

use API\Controller\Config;
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<script>
$(window).on('load', function() {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }
})


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

$(function() {
    var valorDaDiv = $(".editor").text();
    $(".body").val(valorDaDiv);
});

$("#createApiForm").submit(function(e) {
    e.preventDefault();
    const data = new FormData(e.target);
    const object = Object.fromEntries(data.entries());
    axios.post('<?= Config::BASE_ACTION_URL ?>/api-key', object)
        .then(function(response) {
            if (response.data != "sucesso!") {
                throw response.data;
            } else {
                Swal.fire({
                    title: '<?= __("api_keys_js.title") ?>',
                    text: "<?= __("api_keys_js.text") ?>",
                    icon: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("api_keys_js.confirm") ?>'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?= Config::BASE_URL?>api-keys"
                    }
                })
            }
        })
        .catch(function(error) {
            Swal.fire({
                title: '<?= __("api_keys_js.title_erro") ?>',
                text: '<?= __("api_keys_js.text_erro") ?>',
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#1f8cd4',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?= __("api_keys_js.ok") ?>'
            })
        });
});

function copiar($text) {
    const elementoTemporario = document.createElement("textarea");
    elementoTemporario.value = $text;
    document.body.appendChild(elementoTemporario);
    elementoTemporario.select();
    document.execCommand("copy");
    document.body.removeChild(elementoTemporario);
    Toast.fire({
        icon: 'success',
        title: '<?= __("api_keys_js.copy") ?>'
    })
}
</script>
<script>
$('.delete').on('click', function() {
    const code = $(this).attr("data-code");
    Swal.fire({
        title: '<?= __("api_keys_js.excluir") ?>',
        text: "<?= __("api_keys_js.excluir_desc") ?>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#B22222',
        cancelButtonColor: '#1f8cd4',
        confirmButtonText: '<?= __("api_keys_js.confirmar") ?>',
        cancelButtonText: '<?= __("api_keys_js.cancelar") ?>'
    }).then((result) => {
        if (result.value) {
            axios.delete(`<?=Config::BASE_ACTION_URL?>/delete/api-key/${code}`)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        window.location.href = "<?= Config::BASE_URL . "api-keys"?>"
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?=__("Error!")?>',
                        text: '<?= __("api_keys_js.text_erro") ?>',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?=__("OK")?>'
                    })
                });
        }
    })
})
</script>