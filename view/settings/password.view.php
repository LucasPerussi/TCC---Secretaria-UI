
    <?php

    use API\Controller\Config;

    ?>

    
                                <!-- security -->
                                <h1><?= __("internal_pw_reset.titulo") ?></h1>
                                <p class="me-25" style="margin-top: 10px;"><?= __("internal_pw_reset.desc") ?></p>
                                <br />
                                <div class="card" style="padding:20px;">
                                    <!-- form -->
                                    <form id="new-password" class="validate-form">
                                        <input type="user" name="user" value="<?= $_SESSION["user_email"] ?>" hidden>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="account-old-password"><?= __("internal_pw_reset.atual") ?></label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input type="password" class="form-control" id="account-old-password" name="password" placeholder="<?= __("internal_pw_reset.atual_ph") ?>" data-msg="Please current password" />
                                                    <div class="input-group-text cursor-pointer" id="toggleOldPassword">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="account-new-password"><?= __("internal_pw_reset.nova") ?></label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input required type="password" id="password" onkeyup="verificaForcaSenha()" name="new-password" class="form-control" placeholder="<?= __("internal_pw_reset.nova_ph") ?>" />
                                                    <div class="input-group-text cursor-pointer" id="toggleNewPassword">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                                <span style="font-size:10px;" id="password-status"></span>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="account-retype-new-password"><?= __("internal_pw_reset.confirmar") ?></label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input required type="password" onkeyup="check_pass()" class="form-control" id="confirm_password" name="confirm-new-password" placeholder="<?= __("internal_pw_reset.confirmar_ph") ?>" />
                                                    <div class="input-group-text cursor-pointer" id="toggleConfirmPassword">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="fw-bolder"><?= __("internal_pw_reset.requisitos.titulo") ?></p>
                                                <ul class="ps-1 ms-25">
                                                    <li class="mb-50"><?= __("internal_pw_reset.requisitos.1") ?></li>
                                                    <li class="mb-50"><?= __("internal_pw_reset.requisitos.2") ?></li>
                                                    <li><?= __("internal_pw_reset.requisitos.3") ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" id="submit" disabled class="btn btn-primary me-1 mt-1"><?= __("internal_pw_reset.salvar") ?></button>
                                            </div>
                                        </div>
                                        <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                    </form>
                                    <!--/ form -->
                                </div>
        

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


    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-reset-password.js"></script>

    <script>
        $("#new-password").submit(function(f) {
        f.preventDefault();
        const data = new FormData(f.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/change-password', object)
        .then(function(response) {
                if (response.data != "sucesso!") {
                    throw response;                      
                } else {
                    Swal.fire({
                      title: '<?= __("internal_password_reset_js.title_feito") ?>',
                      text: "<?= __("internal_password_reset_js.text_ipr") ?>",
                      icon: 'success',
                      showCancelButton: false,
                      confirmButtonColor: '#1f8cd4',
                      cancelButtonColor: '#d33',
                      confirmButtonText: '<?= __("internal_password_reset_js.confirm") ?>'
                      }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "<?= Config::BASE_URL . "logout"?>"
                      }
                })
                }
            })     
            .catch(function(response) {
                Swal.fire({
                    title: '<?= __("internal_password_reset_js.title_erro") ?>',
                    text: "<?= __("internal_password_reset_js.text_erro") ?> Verifique se sua senha atual está correta!",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("internal_password_reset_js.ok") ?>'
                })
            });
            
    });
    </script>
