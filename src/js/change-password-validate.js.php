<?php

use API\Controller\Config;
?>
 <script>
   feather.replace()
 </script>

 
<script>
        function verificaForcaSenha() {
            var numeros = /([0-9])/;
            var alfabeto = /([A-Z])/;
            var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

            if ($('#password').val().length < 8) {
                $('#password-status').html("<span style='color:pink !important'><?= __("internal_pw_reset.forca_senha.fraco") ?></span>");
            } else {
                if ($('#password').val().match(numeros) && $('#password').val().match(alfabeto) && $('#password').val().match(chEspeciais)) {
                    $('#password-status').html("<span style='color:#20B2AA !important'><b><?= __("internal_pw_reset.forca_senha.forte") ?></b></span>");
                }
                if (!$('#password').val().match(numeros)) {
                    $('#password-status').html("<span style='color:orange !important'><b><?= __("internal_pw_reset.forca_senha.media_1") ?></b></span>");
                }
                if (!$('#password').val().match(alfabeto)) {
                    $('#password-status').html("<span style='color:orange !important'><b><?= __("internal_pw_reset.forca_senha.media_2") ?></b></span>");
                }
                if (!$('#password').val().match(chEspeciais)) {
                    $('#password-status').html("<span style='color:orange !important'><b><?= __("internal_pw_reset.forca_senha.media_3") ?></b></span>");
                }
            }
        }

        function check_pass() {
            if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
                document.getElementById('submit').disabled = false;
                document.getElementById('confirm_password').style.color = 'green';
            } else {
                document.getElementById('confirm_password').style.color = 'red';
                document.getElementById('submit').disabled = true;
            }
        }

        function togglePasswordVisibility(id, icon) {
            var passwordInput = document.getElementById(id);
            var passwordIcon = document.getElementById(icon);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.setAttribute('data-feather', 'eye-off');
            } else {
                passwordInput.type = 'password';
                passwordIcon.setAttribute('data-feather', 'eye');
            }
            feather.replace();
        }

        document.getElementById('toggleOldPassword').addEventListener('click', function() {
            togglePasswordVisibility('account-old-password', 'toggleOldPasswordIcon');
        });

        document.getElementById('toggleNewPassword').addEventListener('click', function() {
            togglePasswordVisibility('password', 'toggleNewPasswordIcon');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            togglePasswordVisibility('confirm_password', 'toggleConfirmPasswordIcon');
        });
    </script>


<script>
    $("#new-password").submit(function(f) {
        f.preventDefault();
        const data = new FormData(f.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/change-password-validate', object)
        .then(function(response) {
                if (response.data.status !== 200) {
                    throw response.data;                      
                } else {
                    Swal.fire({
                      title: '<?= __("Feito!") ?>',
                      text: "<?= __("Sua senha foi alterada com sucesso! c: ") ?>",
                      icon: 'success',
                      showCancelButton: false,
                      confirmButtonColor: '#1f8cd4',
                      cancelButtonColor: '#d33',
                      allowOutsideClick: false,
                      confirmButtonText: '<?= __("Legal!") ?>'
                      }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "<?= Config::BASE_URL?>logout"
                      }
                })
                }
            })     
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("Erro ao alterar sua senha!") ?>',
                    text: 'Houve um erro alterar sua senha. Verifique se o código enviado ao seu email foi informado corretamente, se sua senha é segura e se a corfirmação coincide com a senha.',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
            
    });

    
</script>
<script>
   feather.replace()
 </script>

 
