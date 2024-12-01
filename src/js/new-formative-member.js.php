

<?php

use API\Controller\Config;
?>
<script>
  
    $("#registerFH").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/register-fh', object)
            .then(function(response) {
                console.log(response)
                // if (response.data != "sucesso!") {
                //     throw response.data; 
                // } else {
                //     Swal.fire({
                //       title: '<?= __("event_schedule_js.title_feito") ?>',
                //       text: "<?= __("event_schedule_js.text_agenda") ?>",
                //       icon: 'success',
                //       showCancelButton: false,
                //       allowOutsideClick: false,
                //       confirmButtonColor: '#1f8cd4',
                //       cancelButtonColor: '#d33',
                //       confirmButtonText: '<?= __("event_schedule_js.confirm") ?>'
                //       }).then((result) => {
                //       if (result.isConfirmed) {
                //         window.location.href = "<?= Config::BASE_URL?>project-definitions/<?=$projectNumber?>"
                //       }
                // })
                // }
            })
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("event_schedule_js.title_erro") ?>',
                    text: "<?= __("event_schedule_js.text_erro") ?>",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("event_schedule_js.ok") ?>'
                })
            });
    });
</script>
