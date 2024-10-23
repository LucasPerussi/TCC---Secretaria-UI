<?php

use API\Controller\Config;
use API\enum\Settings;
use API\enum\Timeline_enum;
use API\Model\Timeline;

?>

        <h1><?= __("user_edit.titulo") ?></h1>
        <br />
        <div style="padding:20px; padding-bottom: 0px;" class="card">
            <div class="mb-1 row">
                <div class="col-sm-3">
                    <label class="col-form-label" for="email-icon"><?= __("user_edit.nome") ?></label>
                </div>
                <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                        <input type="name" disabled id="name-icon" class="form-control" value="<?= $user["usr_name"] ?>" name="name" placeholder="<?= __("user_edit.nome") ?>" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                        <input disabled type="name" id="afasta" class="form-control" value="<?= $user["usr_last_name"] ?>" name="last-name" placeholder="<?= __("user_edit.sobrenome") ?>" />
                    </div>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-sm-3">
                    <label class="col-form-label" for="email-icon"><?= __("user_edit.email") ?></label>
                </div>
                <div class="col-sm-8">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="mail"></i></span>
                        <input disabled type="email" style="padding-left:2%;" id="email-icon" class="form-control" value="<?= $user["usr_email"] ?>" name="email-id-icon" placeholder="<?= __("user_edit.email") ?>" />
                    </div>
                </div>
            </div>

            <form id="changePhone">
                <div class="mb-1 row">
                    <div class="col-sm-3">
                        <label class="col-form-label" for="email-icon"><?= __("user_edit.tel") ?></label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="phone"></i></span>
                            <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                            <input type="tel" maxlength="15" onkeyup="showSavePhone();" onchange="showSavePhone();" class="form-control" value="<?php if ($user["usr_phone"] != null) {
                                                                                                                                                    echo $user["usr_phone"];
                                                                                                                                                } ?>" name="phone" placeholder="(41) 9 9999-9999" />
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#telefone').mask('(00) 0000-0000#');
                            });
                        </script>
                    </div>
                    <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                        <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaPhone" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                    </div>
                </div>
            </form>
            <form id="changeBornDate">
                <div class="mb-1 row">
                    <div class="col-sm-3">
                        <label class="col-form-label" for="email-icon"><?= __("user_edit.nasci") ?></label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="calendar"></i></span>
                            <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                            <input type="date" id="birthDate" onkeyup="showSave1();" onchange="showSave1();" class="form-control" value="<?php if ($user["usr_born_date"] != null) {
                                                                                                                                                echo $user["usr_born_date"];
                                                                                                                                            } ?>" name="birthday" placeholder="date" />
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                        <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afasta1" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                    </div>
                </div>
            </form>
            <form id="changeCity">
                <div class="mb-1 row">
                    <div class="col-sm-3">
                        <label class="col-form-label" for="email-icon"><?= __("user_edit.cidade") ?></label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="navigation"></i></span>
                            <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                            <input type="text" id="city" name="city" onkeyup="showSavCity();" class="form-control" value="<?php if ($user["usr_city"] != "None") {
                                                                                                                                echo $user["usr_city"];
                                                                                                                            } ?>">
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                        <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaCity" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                    </div>
                </div>
            </form>
            <form id="changeCountry">
                <div class="mb-1 row">
                    <div class="col-sm-3">
                        <label class="col-form-label" for="email-icon"><?= __("user_edit.pais") ?></label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="globe"></i></span>
                            <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                            <select name="country" onkeyup="showSaveC();" onchange="showSaveC();" class="form-select" id="country">
                                <?php

                                foreach ($countries2 as $country) {
                                    echo "<option";
                                    if ($user["usr_country"] + 1 == $country["ordem"]) {
                                        echo " selected ";
                                    }
                                    echo " value='" . $country["ordem"] . "'>" . $country["nome"] . "</value=>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                        <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaCountry" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                    </div>
                </div>
            </form>
            <form id="changeCargo">
                <div class="mb-1 row">
                    <div class="col-sm-3">
                        <label class="col-form-label" for="email-icon"><?= __("user_edit.cargo") ?></label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="user"></i></span>
                            <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                            <input type="text" id="city" name="cargo" onkeyup="showSavCargo();" class="form-control" value="<?php if ($setting["crd_role"] != "") {
                                                                                                                                echo $setting["crd_role"];
                                                                                                                            } ?>">
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                        <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaCargo" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                    </div>
                </div>
            </form>

            <form id="changeRole">
                <div class="mb-1 row">
                    <div class="col-sm-3">
                        <label class="col-form-label" for="email-icon"><?= __("user_edit.funcao") ?></label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="pocket"></i></span>
                            <input type="text" id="birthDate" disabled class="form-control" style="padding-left:15px;" value="<?php if ($user["usr_role"] == 1) {
                                                                                                                                    echo "Membro";
                                                                                                                                } else {
                                                                                                                                    echo "Administrador";
                                                                                                                                } ?>">
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                        <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afasta1" hidden class="btn btn-info"><?= __("user_edit.") ?></button>
                    </div>
                </div>
            </form>
            <br />
        </div>
        <?php if (($_SESSION["user_role"] != 5)) : ?>
            <!-- <h3><?= __("user_edit.redes.titulo") ?></h3>
            <br />
            <div class="card" style="padding:20px;">
                <form id="changeLinkedin">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">LinkedIn:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-linkedin"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="linkedin" name="linkedin" onkeyup="showSavlinkedin();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                                if ($social["type"] == 1) {
                                                                                                                                                    echo $social["url"];
                                                                                                                                                }
                                                                                                                                            } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaLinkedin" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeFacebook">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">Facebook:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="facebook" name="facebook" onkeyup="showSavfacebook();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                                if ($social["type"] == 2) {
                                                                                                                                                    echo $social["url"];
                                                                                                                                                }
                                                                                                                                            } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaFacebook" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeInstagram">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">Instagram:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="instagram" name="instagram" onkeyup="showSavInstagram();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                                    if ($social["type"] == 4) {
                                                                                                                                                        echo $social["url"];
                                                                                                                                                    }
                                                                                                                                                } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaInstagram" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeWhatsapp">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">WhatsApp:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="number" id="whatsapp" name="whatsapp" onkeyup="showSavWhats();" placeholder="5541900000000 (apenas números)" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                                                                            if ($social["type"] == 9) {
                                                                                                                                                                                                $search = "https://api.whatsapp.com/send?phone=";
                                                                                                                                                                                                echo str_replace($search, '', $social["url"]);
                                                                                                                                                                                            }
                                                                                                                                                                                        } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaWhats" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeTwitter">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">Twitter:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                    </svg></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="twitter" name="twitter" onkeyup="showSavTwitter();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                            if ($social["type"] == 3) {
                                                                                                                                                echo $social["url"];
                                                                                                                                            }
                                                                                                                                        } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaTwitter" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeGitHub">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">GitHub:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-github"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="github" name="github" onkeyup="showSavGit();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                        if ($social["type"] == 5) {
                                                                                                                                            echo $social["url"];
                                                                                                                                        }
                                                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaGitHub" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeYoutube">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">Youtube:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-youtube"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="youtube" name="youtube" onkeyup="showSavYoutube();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                            if ($social["type"] == 6) {
                                                                                                                                                echo $social["url"];
                                                                                                                                            }
                                                                                                                                        } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaYoutube" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeBehance">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">Behance:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-behance"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="behance" name="behance" onkeyup="showSavBehance();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                            if ($social["type"] == 7) {
                                                                                                                                                echo $social["url"];
                                                                                                                                            }
                                                                                                                                        } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaBehance" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changeDribble">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">Dribbble:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-dribbble"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="dribble" name="dribble" onkeyup="showSavDribble();" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                            if ($social["type"] == 8) {
                                                                                                                                                echo $social["url"];
                                                                                                                                            }
                                                                                                                                        } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaDribble" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>
                <form id="changePDF">
                    <div class="mb-1 row">
                        <div class="col-sm-3">
                            <label class="col-form-label" for="email-icon">PDF:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bi bi-filetype-pdf"></i></span>
                                <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                <input type="text" id="pdf" name="pdf" required onkeyup="showSavPDF();" class="form-control" placeholder="URL" value="<?php foreach ($socials as $social) {
                                                                                                                                                            if ($social["type"] == 10) {
                                                                                                                                                                echo $social["url"];
                                                                                                                                                            }
                                                                                                                                                        } ?>">
                                <input type="text" id="pdf" name="label" onkeyup="showSavPDF();" maxlength="50" required placeholder="Label" class="form-control" value="<?php foreach ($socials as $social) {
                                                                                                                                                                                if ($social["type"] == 10) {
                                                                                                                                                                                    echo $social["label"];
                                                                                                                                                                                }
                                                                                                                                                                            } ?>">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                            <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaPDF" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                        </div>
                    </div>
                </form>

                <div class="col-sm-1" style="padding-left:0px !important; padding-right:0px !important;">
                    <button style="font-size: 11px; padding: 10px; width: 100%;margin-top: 5px; max-width: 100px; float: right;min-width:60px;" id="afastaPDF" hidden class="btn btn-info"><?= __("user_edit.salvar") ?></button>
                </div>
            </div> -->

        <?php endif; ?>

        <h3><?= __("user_edit.foto") ?></h3>
        <br />
        <div class="card" style="padding:20px;">
            <?php
            if (isset($_POST["name"])) {
                $link = $_POST["name"];
            } else {
                if (isset($user["usr_picture"])) {
                    $link = $user["usr_picture"];
                }
            }
            ?>
            <div class="row">
                <div class="col-md-5 col-xs-12 col-sm-12">
                    <?php if (isset($link)) : ?>
                        <img style=" max-width:60%; border-radius: 20px;" src="<?php if (isset($link)) {
                                                                                    echo ($link);
                                                                                } ?>" alt="profile pic" id="preview" srcset="">
                    <?php endif; ?>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-12">
                    <button type="button" style="width:100%; min-width:200px; margin-top:30px;" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
                        <?= __("user_edit.botao_foto") ?>
                    </button>
                    <label style="font-size:12px; margin-top:20px;" for="file"> <?= __("user_edit.foto_desc") ?></label>
                </div>
            </div>
        </div>
        <?php if ($_SESSION["user_role"] != 5) : ?>
            <?php if ($_SESSION["company_id"] != 9999) : ?>
                <?php if (mysqli_num_rows($companies) > 0) : ?>
                    <?php while ($company = mysqli_fetch_assoc($companies)) : ?>
                        <div class="card p-1">
                            <div style="background-color: <?= $company["com_color"] ?> !important;padding:5%;" class="card">
                                <div class="row">
                                    <div class="col-md-5 col-xs-12 col-sm-12">
                                        <img style="margin-left:20%; margin-bottom:10%; max-width:60%; " src="<?= $company["com_logo"] ?>" alt="profile pic" id="preview" srcset="">
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
                                            <?= $company["com_identifier"] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else : ?>
                <h3><?= __("user_edit.empresa") ?></h3> <br />
                <div style="background-color: #cec7c0;padding:20px;" class="card">
                    <div class="row">
                        <div class="col-md-5 col-xs-12 col-sm-12">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js">
                            </script>
                            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_h4mjsyjz.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                            </lottie-player>
                        </div>
                        <div class="col-md-7 col-xs-12 col-sm-12">
                            <h1 style="color:white;"><?= __("user_edit.generico") ?></h1>
                            <h5 style="color:white;"><?= __("user_edit.gen_desc") ?></h5>
                            <button style="margin-top:30px;margin-bottom:30px;" onclick="location.href='<?php echo Config::BASE_URL . 'settings'; ?>'" class="btn btn-info"><?= __("user_edit.botao") ?></button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <!-- </div> -->

        <!-- </div> -->




        <!-- </div> -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="top:10px !important;background: none;float:right !important;"><i class="bi bi-x-lg"></i></button>
                        <h4 id="exampleModalLabel"><?= __("user_edit.selecionar") ?></h5>
                    </div>
                    <div class="modal-body mt-1 pb-0" id="bodyRequestDash" style="border-radius:20px;">
                        <div id="b4">
                            <form action="" id="beforeCrop">
                                <p><input id="selectPic" type=file></p>
                                <div id="imgConfig">
                                    <canvas id="myCanvas" width="200" height="200" style="max-width:100%; background-color: #00ffff1a;">
                                        <?= __("user_edit.canvas") ?>
                                    </canvas>
                                    <br />
                                    <input id='scaleSlider' type='range' min='1.0' max='3.0' step='0.01' value='1.0' />
                                    </br>
                                    <button class="btn btn-default btn-info" id="crop"><?= __("user_edit.cortar") ?></button>
                                    </br>
                                    </br>
                                </div>
                            </form>
                        </div>
                        <form id="afterCrop">
                            <input type="text" hidden id="url" name="url">
                            <br />
                            <div>
                                <img style="max-width:100%;border-radius:50%;" class="cropped-img" id="croppedImg" src="">
                            </div>
                            <br />
                            <br />
                            <button type="submit" class="btn btn-default btn-info" id="save"><?= __("user_edit.salvar") ?></button>
                            <br />
                            <br />
                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php
require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
?>

<script>
        $("#afterCrop").submit(function(f) {
            f.preventDefault();
            const data = new FormData(f.target);
            const object = Object.fromEntries(data.entries());
            axios.post('<?= Config::BASE_ACTION_URL ?>/user/picture', object)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        location.reload();

                    }
                })
                .catch(function(error) {
                    location.reload();
                });
        });
    </script>

<!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->