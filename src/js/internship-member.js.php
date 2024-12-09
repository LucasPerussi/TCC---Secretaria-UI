<?php

use API\Controller\Config;
?>
<script>
       function deleteInternship(internship) {

        axios.post('<?= Config::BASE_ACTION_URL ?>/remove-internship/' + internship)
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
                    text: 'Tivemos um problema ao remover estágio.',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                })
            });
        }
</script>