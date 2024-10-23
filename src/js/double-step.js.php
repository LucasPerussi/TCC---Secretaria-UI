<?php

use API\Controller\Config;
?>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    // function setTopo() {
    //     $(window).scrollTop(0);
    // }
    // $(window).bind('scroll', setTopo);

    $("#verify-email").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/double/checking', object)
            .then(function(response) {
                if (response.data == "approved") {
                    Swal.fire({
                      title: '<?= __("double_step_js.title_feito") ?>',
                      text: "<?= __("double_step_js.text_login") ?>",
                      icon: 'success',
                      showCancelButton: false,
                      allowOutsideClick: false,
                      confirmButtonColor: '#1f8cd4',
                      cancelButtonColor: '#d33',
                      confirmButtonText: '<?= __("double_step_js.confirm") ?>'
                      }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "<?= Config::BASE_URL?>dashboard"
                      }
                    })               
                } else {
                    Swal.fire({
                        title: '<?= __("double_step_js.title_erro") ?>',
                        text: '<?= __("double_step_js.text_erro") ?>',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("double_step_js.ok") ?>'
                    })
                }
            }) 
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("double_step_js.title_erro") ?>',
                    text: '<?= __("double_step_js.text_erro") ?>',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("double_step_js.ok") ?>'
                })
            });
    });
</script>
