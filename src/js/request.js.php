<?php

use API\Controller\Config;
?>

<script>
    $("#newComment").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/new-comment', object)
            .then(function(response) {
                console.log(response)
                if (response.data.status > 202) {
                    throw response.data;
                } else {
                    location.reload();
                }
            })
            .catch(function(error) {

                console.log(error.status)
                Swal.fire({
                    title: 'Tivemos um problema!',
                    text: 'Tivemos um problema ao cadastrar solicitacao (STATUS: ' + error.status + ')',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                })
            });
    });
</script>
<script>
    $("#addTeacher").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/add-teacher', object)
            .then(function(response) {
                console.log(response)
                if (response.data.status > 202) {
                    throw response.data;
                } else {
                    location.reload();
                }
            })
            .catch(function(error) {

                console.log(error.status)
                Swal.fire({
                    title: 'Tivemos um problema!',
                    text: 'Tivemos um problema ao cadastrar solicitacao (STATUS: ' + error.status + ')',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                })
            });
    });
</script>