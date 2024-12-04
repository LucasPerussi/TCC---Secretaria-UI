<?php

use API\Controller\Config;
?>
<script>
    $("#newRequest").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/new-request', object)
            .then(function(response) {
                console.log(response)
                if (response.data.status != 200) {
                    console.log(response)
                    throw response.data;
                } else {
                    console.log(response)
                    window.location.href = "<?= Config::BASE_URL ?>request/" + response.data.identificador;
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