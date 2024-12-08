<?php

use API\Controller\Config;
?>
<script>
function changeIS(id_estagio,status) {

axios.patch('<?= Config::BASE_ACTION_URL ?>/change-is', object)
    .then(response => {
        if (response.data.status !== 200) {
            throw response.data;
        } else {
            location.reload();
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Tivemos um problema!',
            text: 'Tivemos um problema ao alterar o status. (STATUS: ' + error.status + ')',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#1f8cd4',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
        })
    });
}
</script>