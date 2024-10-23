<?php

use API\Controller\Config;
use API\enum\Settings;
use API\enum\Timeline_enum;
use API\Model\Timeline;

?>

<h1><?= __("settings.card_conta.titulo") ?></h1>
<br />
<div class="card" style="padding:20px;">
    <div class="d-flex mt-0">
        <div class="d-flex align-item-center justify-content-between flex-grow-1">
            <div class="me-1">
                <p class="fw-bolder mb-0"><i class="bi bi-laptop"></i> <span style="margin-left:10px;"><?= __("settings.card_conta.subtitulo") ?></span> </p>
                <span><?= __("settings.card_conta.descricao") ?></span>
            </div>
            <div class="mt-10 mt-sm-0">
                <button style="width:90px; font-size:12px" type="button" class="btn btn-outline-info" onclick="location.href='#user-edit-section'"><?= __("settings.card_conta.botao") ?></button>
            </div>
        </div>
    </div>
    
        <div class="d-flex mt-1 <?= ($_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 1 ) ? 'd-none' : ''; ?>">
            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                <div class="me-1">
                    <p class="fw-bolder mb-0"><i class="bi bi-pencil"></i>
                        <span style="margin-left:10px;">
                            <?php
                            if ($_SESSION["user_language"] == 1) {
                                echo "Personalizar Painel Inicial";
                            } else {
                                echo "Customize your Dashboard";
                            } ?>
                        </span>
                    </p>
                    <span>
                        <?php if ($_SESSION["user_language"] == 1) {
                            echo "Exiba em seu painel o que importa.";
                        } else {
                            echo "Show what matters most";
                        } ?>
                    </span>
                </div>
                <div class="mt-10 mt-sm-0">
                    <button style="width:90px; font-size:12px" type="button" class="btn btn-outline-info" onclick="location.href='<?= Config::BASE_URL . 'customize-dashboard' ?>'"><?= __("settings.card_conta.botao") ?></button>
                </div>
            </div>
        </div>

    <div class="d-flex mt-1">
        <div class="d-flex align-item-center justify-content-between flex-grow-1">
            <div class="me-1">
                <p class="fw-bolder mb-0"><i class="bi bi-clock"></i>
                    <span style="margin-left:10px;">
                        Timelines
                    </span>
                </p>
                <span>
                    <?= __("settings.card_historico.titulo") ?>
                </span>
            </div>
            <div class="mt-10 mt-sm-0">
                <button style="width:90px; font-size:11px" type="button" class="btn btn-outline-info" onclick="location.href='<?= Config::BASE_URL . 'account-history' ?>'"><?= __("settings.card_conta.ver") ?></button>
            </div>
        </div>
    </div>
</div>


<h3><?= __("settings.card_aparencia.titulo") ?>
    <span class="badge rounded-pill badge-light-secondary" style="font-size:13px; float:right !important;" data-bs-toggle="tooltip" target="_blank" data-bs-placement="top" data-bs-original-title="Tema selecionado"> <?php if ($_SESSION["user_theme"] == 2) {
                                                                                                                                                                                                                            echo __("settings.card_aparencia.selecionado.escuro");
                                                                                                                                                                                                                        } elseif ($_SESSION["user_theme"] == 3) {
                                                                                                                                                                                                                            echo __("settings.card_aparencia.selecionado.claro");
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo $_COOKIE["theme"] . __("settings.card_aparencia.selecionado.sistema");
                                                                                                                                                                                                                        } ?></span>
</h3>

<br />
<div class="card" style="padding:20px;">

    <div class="d-flex mt-0">
        <div class="d-flex align-item-center justify-content-between flex-grow-1">
            <div class="me-1">
                <p class="fw-bolder mb-0"><i class="bi bi-laptop"></i> <span style="margin-left:10px;"><?= __("settings.card_aparencia.sincronizar") ?></span> </p>
                <span><?= __("settings.card_aparencia.sincronizar_desc") ?></span>
            </div>
            <div class="mt-10 mt-sm-0">
                <div class="form-check  form-check-info">
                    <input type="radio" disabled name="theme" class="form-check-input" id="checkSystem" <?php if ($user["usr_theme"] == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?> />

                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-2">

        <div class="d-flex align-item-center justify-content-between flex-grow-1">

            <div class="me-1">
                <p class="fw-bolder mb-0"><i class="bi bi-moon"></i> <span style="margin-left:10px;"><?= __("settings.card_aparencia.escuro") ?></span> </p>
                <span><?= __("settings.card_aparencia.escuro_desc") ?></span>
            </div>
            <div class="mt-50 mt-sm-0">
                <div class="form-check  form-check-info">

                    <input type="radio" disabled name="theme" class="form-check-input" id="checkDark" <?php if ($user["usr_theme"] == 2) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                </div>
            </div>
        </div>
    </div>
    <div id="search_idioma"></div>
    <div class="d-flex mt-2">
        <div class="d-flex align-item-center justify-content-between flex-grow-1">
            <div class="me-1">
                <p class="fw-bolder mb-0"><i class="bi bi-brightness-high"></i> <span style="margin-left:10px;"><?= __("settings.card_aparencia.claro") ?></span> </p>
                <span><?= __("settings.card_aparencia.claro_desc") ?></span>
            </div>
            <div class="mt-50 mt-sm-0">
                <div class="form-check  form-check-info">
                    <input type="radio" disabled name="theme" class="form-check-input" id="checkLight" <?php if ($user["usr_theme"] == 3) {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-0">
        <div class="d-flex align-item-center justify-content-between flex-grow-1">
            <div class="me-1">
                <span id="erroSelecao" hidden style="padding:10px; background-color:#d76565a8; color:white !important; border-radius:20px;margin-top:10px;"><?= __("settings.card_aparencia.erro") ?></span>
            </div>

        </div>
    </div>

</div>


<h3><?= __("settings.card_idioma.titulo") ?>
    <span class="badge rounded-pill badge-light-secondary" style="font-size:13px; float:right !important;" data-bs-toggle="tooltip" target="_blank" data-bs-placement="top" data-bs-original-title="Idioma selecionado"> <?php if ($_SESSION["user_language"] == 1) {
                                                                                                                                                                                                                                echo "PT-BR 🇧🇷";
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                echo "EN-US 🇺🇸";
                                                                                                                                                                                                                            } ?></span>
</h3>
<br />
<div class="card" style="padding:20px;">


    <div class="d-flex mt-0">

        <div class="d-flex align-item-center justify-content-between flex-grow-1">

            <div class="me-1">
                <p class="fw-bolder mb-0"><img style="height:20px; margin-right:5px;" src="<?= Config::BASE_URL ?>layout/app-assets/images/flags/brazil.png" alt="flag"> <span style="margin-left:10px;">Português</span> </p>
            </div>
            <div class="mt-50 mt-sm-0">
                <div class="form-check  form-check-info">

                    <input type="radio" name="language" <?php if ($_SESSION["user_language"] == 1) {
                                                            echo "checked";
                                                        } ?> class="form-check-input" id="checkPortugues" onChange="changeLanguage()" />




                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-2">

        <div class="d-flex align-item-center justify-content-between flex-grow-1">
            <div class="me-1">
                <p class="fw-bolder mb-0"><img style="height:20px; margin-right:5px;" src="<?= Config::BASE_URL ?>layout/app-assets/images/flags/us.svg" alt="flag"> <span style="margin-left:10px;">English [BETA]</span> </p>
            </div>
            <div class="mt-50 mt-sm-0">
                <div class="form-check  form-check-info">
                    <input type="radio" name="language" <?php if ($_SESSION["user_language"] == 2) {
                                                            echo "checked";
                                                        } ?> class="form-check-input" id="checkEnglish" onChange="changeLanguage()" />

                </div>
            </div>
        </div>
    </div>

    <script>
    function enableSwitches() {
        document.getElementById("checkSystem").disabled = false;
        document.getElementById("checkDark").disabled = false;
        document.getElementById("checkLight").disabled = false;
    }

    document.addEventListener("DOMContentLoaded", enableSwitches);

    function ativaDark() {
        criarCookie("theme", "Dark", 7);
        criarCookie("themeGetter", "2", 7);
    }

    function ativaLight() {
        criarCookie("theme", "Light", 7);
        criarCookie("themeGetter", "3", 7);
    }
</script>
<script>
    function selecioneSystem() {
        if (document.getElementById("checkSystem").checked == true) {
            document.getElementById("checkDark").checked = false;
            document.getElementById("checkLight").checked = false;
            document.getElementById("erroSelecao").hidden = true;
            criarCookie("themeGetter", "1", 7);

            axios.post('<?= Config::BASE_ACTION_URL ?>/theme/change/1', true)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: '<?= __("settings.card_aparencia.pop_up.sistema") ?>'
                        })
                        setTimeout(location.reload(), 2000)
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?= __("settings.card_aparencia.pop_up.falhou") ?>',
                        text: "error",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("settings.card_aparencia.pop_up.ok") ?>'
                    })
                });

        } else {
            document.getElementById("checkSystem").checked = true;
            document.getElementById("erroSelecao").hidden = false;
            axios.post('<?= Config::BASE_ACTION_URL ?>/theme/change/1', true)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: '<?= __("settings.card_aparencia.pop_up.sistema") ?>'
                        })
                        setTimeout(location.reload(), 2000)
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?= __("settings.card_aparencia.pop_up.falhou") ?>',
                        text: "error",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("settings.card_aparencia.pop_up.ok") ?>'
                    })
                });
            location.reload();
        }
    }

    function selecioneDark() {
        if (document.getElementById("checkDark").checked == true) {
            document.getElementById("checkSystem").checked = false;
            document.getElementById("checkLight").checked = false;
            document.getElementById("erroSelecao").hidden = true;
            axios.post('<?= Config::BASE_ACTION_URL ?>/theme/change/2', true)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: '<?= __("settings.card_aparencia.pop_up.escuro") ?>'
                        })
                        setTimeout(location.reload(), 2000)
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?= __("settings.card_aparencia.pop_up.falhou") ?>',
                        text: "error",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("settings.card_aparencia.pop_up.ok") ?>'
                    })
                });
            ativaDark();



        } else {
            document.getElementById("checkSystem").checked = true;
            document.getElementById("erroSelecao").hidden = false;
            axios.post('<?= Config::BASE_ACTION_URL ?>/theme/change/1', true)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: '<?= __("settings.card_aparencia.pop_up.sistema") ?>'
                        })
                        setTimeout(location.reload(), 2000)
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?= __("settings.card_aparencia.pop_up.falhou") ?>',
                        text: "error",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("settings.card_aparencia.pop_up.ok") ?>'
                    })
                });
            location.reload();

        }
    }

    function selecioneLight() {
        if (document.getElementById("checkLight").checked == true) {
            document.getElementById("checkSystem").checked = false;
            document.getElementById("checkDark").checked = false;
            document.getElementById("erroSelecao").hidden = true;
            axios.post('<?= Config::BASE_ACTION_URL ?>/theme/change/3', true)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: '<?= __("settings.card_aparencia.pop_up.claro") ?>'
                        })
                        setTimeout(location.reload(), 2000)
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?= __("settings.card_aparencia.pop_up.falhou") ?>',
                        text: "error",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("settings.card_aparencia.pop_up.ok") ?>'
                    })
                });
            ativaLight();

        } else {
            document.getElementById("checkSystem").checked = true;
            document.getElementById("erroSelecao").hidden = false;
            axios.post('<?= Config::BASE_ACTION_URL ?>/theme/change/1', true)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: '<?= __("settings.card_aparencia.pop_up.sistema") ?>'
                        })
                        setTimeout(location.reload(), 2000)
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?= __("settings.card_aparencia.pop_up.falhou") ?>',
                        text: "error",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?= __("settings.card_aparencia.pop_up.ok") ?>'
                    })
                });
            location.reload();

        }
    }
    document.getElementById("erroSelecao").hidden = true;

    var system = document.getElementById("checkSystem");
    system.addEventListener("change", selecioneSystem);

    var dark = document.getElementById("checkDark");
    dark.addEventListener("change", selecioneDark);

    var light = document.getElementById("checkLight");
    light.addEventListener("change", selecioneLight);
</script>
    <script>
        function changeLanguage() {
            if (document.getElementById("checkEnglish").checked == true) {
                axios.post('<?= Config::BASE_ACTION_URL ?>/language/change/2', true)
                    .then(function(response) {
                        if (response.data != "sucesso!") {
                            throw response.data;
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'Your system use English as default language'
                            })
                            setTimeout(location.reload(), 2000)
                        }
                    })
                    .catch(function(error) {
                        Swal.fire({
                            title: '<?= __("Alteração falhou!") ?>',
                            text: "error",
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#1f8cd4',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?= __("OK") ?>'
                        })
                    });
            } else {
                axios.post('<?= Config::BASE_ACTION_URL ?>/language/change/1', true)
                    .then(function(response) {
                        if (response.data != "sucesso!") {
                            throw response.data;
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'Seu sistema utilizará Português como padrão'
                            })
                            setTimeout(location.reload(), 2000)
                        }
                    })
                    .catch(function(error) {
                        Swal.fire({
                            title: '<?= __("Alteração falhou!") ?>',
                            text: "error",
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#1f8cd4',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?= __("OK") ?>'
                        })
                    });
            }
        }
    </script>

</div>

<h3>Empresa</h3>
<br />

<!-- Project table -->
<?php if ($_SESSION["company_id"] != 9999) : ?>
    <?php if (mysqli_num_rows($myCompany) > 0) : ?>
        <?php while ($company = mysqli_fetch_assoc($myCompany)) : ?>

            <div style="background-color: <?= $company["com_color"] ?> !important;padding:20px;" class="card mb-0 mt-1" id="bodyRequestDash">
                <div class="row">
                    <div class="col-md-5 col-xs-12 col-sm-12">
                        <img style="margin-left:20%;  max-width:60%; " src="<?= $company["com_logo"] ?>" alt="profile pic" id="preview" srcset="">
                    </div>
                    <div class="col-md-5 col-xs-12 col-sm-12">
                        <h1 style="<?php if ($company["com_color"] == "#ffffff") {
                                        echo "color:gray !important;";
                                    } else {
                                        echo "color:white !important; ";
                                    } ?> margin-top:15px">
                            <?= $company["com_name"] ?></h1>
                        <h5 style="<?php if ($company["com_color"] == "#ffffff") {
                                        echo "color:gray !important; ";
                                    } else {
                                        echo "color:white !important;";
                                    } ?>">
                            <?= $company["com_dominio1"] ?></h5>
                    </div>
                </div>
            </div>
            <br />
        <?php endwhile; ?>
    <?php endif; ?>

<?php else : ?>
    <div style="padding:20px !important;" class="card">
        <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-12">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js">
                </script>
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_h4mjsyjz.json" background="transparent" speed="1" style="width: 150px; height: 150px;" loop autoplay></lottie-player>
            </div>
            <div class="col-md-5 col-xs-12 col-sm-12">
                <h3 style="color:white;margin-left:3px;"><?= __("settings.card_empresa.titulo") ?></h3>
                <h6 style="color:white; margin-left:3px;"><?= __("settings.card_empresa.descricao") ?></h6>
                <?php
                $waitingApproval = "false";
                if (mysqli_num_rows($waiting) > 0) {
                    $waitingApproval = "true";
                }
                ?>
                <?php if ($waitingApproval == "false") : ?>
                    <form id="join" style="margin-top:20px;">
                        <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                        <input type="text" id="domain" class="form-control" required name="dominio" style="border-radius:20px; " placeholder="<?= __("settings.card_empresa.placeholder") ?>">
                        <button style="margin-top:10px;margin-bottom:30px;" id="send" type="submit" class="btn btn-info"><?= __("settings.card_empresa.solicitar") ?></button>
                    </form>
                    <div hidden id="confirmation" style="padding:10px; background-color:white; margin-top:20px;border-radius:10px;">
                        <span><?= __("settings.card_empresa.enviado") ?></span>
                    </div>

                <?php else : ?>
                    <div id="waitingApp" style="padding:10px; background-color:white; margin-top:20px;border-radius:10px;">
                        <span><?= __("settings.card_empresa.enviado") ?></span>
                    </div>

                <?php endif; ?>


            </div>
        </div>

        <div id="search_historico"></div>
    </div>
<?php endif; ?>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    // const Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     didOpen: (toast) => {
    //         toast.addEventListener('mouseenter', Swal.stopTimer)
    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
    //     }
    // })


    $("#join").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/company/domain', object)
            .then(function(response) {
                if (response.data != "sucesso!") {
                    throw response.data;
                } else {
                    document.getElementById("send").disabled = true;
                    document.getElementById("send").hidden = true;
                    document.getElementById("domain").disabled = true;
                    document.getElementById("domain").hidden = true;
                    document.getElementById("confirmation").hidden = false;
                    Toast.fire({
                        icon: 'success',
                        title: 'Solicitação enviada para um administrador.'
                    })
                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("Solicitação falhou!") ?>',
                    text: "<?= __("Houve um erro ao realizar sua solicitação, tente novamente.") ?>",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
    });
</script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<!-- Activity Timeline -->



<!-- </div> -->
<!-- /Activity Timeline -->

<!-- </div> -->