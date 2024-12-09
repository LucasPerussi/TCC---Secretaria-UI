<?php

use API\Controller\Config;
?>
<script>    
    $("#changeIS").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.patch('<?= Config::BASE_ACTION_URL ?>/change-is', object)
            .then(function(response) {
                console.log(response)
                if (response.data.status != 200) {
                    throw response.data;
                } else {
                    Swal.fire({
                    title: 'Estágio alterado com sucesso!',
                    text: 'O status do estágio foi alterado',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                }).then (function(){ location.realod(); })
                    
                }
            })
            .catch(function(error) {

                console.log(error.status)
                Swal.fire({
                    title: 'Tivemos um problema!',
                    text: 'Tivemos um problema ao alterar o status do estágio (STATUS: ' + error.status + ')',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                })
            });
    });
</script>
