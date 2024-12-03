<?php

use API\Controller\Config;
?>
<script>
    $("#registerType").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/register-type', object)
            .then(function(response) {
                console.log(response)
                if (response.data.status != 200) {
                    throw response.data;
                } else {
                    const responseString = response.data.response; // Essa é a string retornada
                    const parsedResponse = JSON.parse(responseString); // Converte a string em objeto
                    console.log(parsedResponse.id);

                    window.location.href = "<?= Config::BASE_URL ?>proccess-type/" + parsedResponse.id;
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
</script>