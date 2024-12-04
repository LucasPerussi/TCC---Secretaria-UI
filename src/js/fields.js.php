<?php

use API\Controller\Config;
?>
<script>
    $("#newField").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/new-field', object)
            .then(function(response) {
                console.log(response)
                if (response.data.status != 200) {
                    throw response.data;
                } else {
                    window.location.reload();
                }
            })
            .catch(function(error) {

                console.log(error.status)
                Swal.fire({
                    title: 'Tivemos um problema!',
                    text: 'Tivemos um problema ao cadastrar hora formativa (STATUS: ' + error.status + ')',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                })
            });
    });



    function deleteField(field) {

        axios.post('<?= Config::BASE_ACTION_URL ?>/remove-field/' + field)
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
                    text: 'Tivemos um problema ao remover campo. Talvez ele já esteja em uso. (STATUS: ' + error.status + ')',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                })
            });
        }
</script>