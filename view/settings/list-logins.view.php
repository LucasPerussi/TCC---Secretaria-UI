<?php

use API\Controller\Config;

?>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<style>
    #map {
        height: 400px;
    }
</style>

<div class="card" style="padding:0px;">
    <div id="map" style="border-radius:20px;z-index:0 !important;"></div>
</div>

<div class="card" style="padding:20px; padding-bottom:10px;">
    <a href="<?= Config::BASE_URL . "password-reset" ?>">
        <div class="card" style="padding:20px; padding-bottom:10px;margin-bottom:10px;" id="bodyRequestDash">
            <h6>Alterar minha senha</h6>
        </div>
    </a>
    <a id="deleteSessions">
        <div class="card" style="padding:20px; padding-bottom:10px; margin-bottom:10px;" id="bodyRequestDash">
            <h6>Derrubar todas as sessões</h6>
        </div>
    </a>
    <a href="<?= Config::BASE_URL . "whitelist" ?>">
        <div class="card" style="padding:20px; padding-bottom:10px;margin-bottom:10px;" id="bodyRequestDash">
            <h6>Locais conhecidos</h6>
        </div>
    </a>
</div>

<h3><?= __("list_logins.sessoes_ativas") ?></h3>
<br />

<!-- Activity Timeline -->
<div class="card">
    <div class="card-body pt-1">
        <ul class="timeline ms-50">
            <?php if (mysqli_num_rows($logins) > 0) : ?>
                <?php while ($login = mysqli_fetch_assoc($logins)) : ?>
                    <?php
                    $date = date("d M/Y ", strtotime($login["log_date"]));
                    $time = date("g:i a", strtotime($login["log_date"]));
                    $coordenadas_array = explode(',', $login["log_localization"]);
                    ?>
                    <li class="timeline-item">
                        <span class="timeline-point timeline-point-indicator"></span>
                        <div class="timeline-event">
                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                <h6><?= __("list_logins.login") ?></h6>
                                <span class="timeline-event-time me-1"><?= $date ?> </span>
                            </div>
                            <p><?= __("list_logins.login_as") ?> <?= $time ?> <?= __("list_logins.login_em") ?> <?= $login["log_city"] ?> -
                                <?= $login["log_state"] ?> / <?= $login["log_country"] ?>
                                (<?= $login["log_localization"] ?>)</p>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    addMarker("<?= $coordenadas_array[0] ?>", "<?= $coordenadas_array[1] ?>", "<?= $login["log_city"] ?> - <?= $login["log_state"] ?> / <?= $login["log_country"] ?>", "<?= $date . ' às ' . $time ?>");
                                });
                            </script>
                            <?php if ($login["log_session"] != $_SESSION["session_key"]) : ?>
                                <a class="delete" data-code="<?= $login["log_id"] ?>"><span class='badge rounded-pill ' style="margin-top: 2px;padding:5px; border-radius:10px; border-style:solid; border-width:1px; border-color:#00bcd5 !important; color: #00bcd5 !important;"><?= __("list_logins.derrubar_sessao") ?></span></a>
                            <?php else : ?>
                                <span class='badge rounded-pill badge-light-success' style="margin-top: 2px;padding:5px; border-radius:10px; border-style:solid; border-width:1px; '"><?= __("list_logins.atual") ?></span>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else : ?>
                <li class="timeline-item">
                    <span class="timeline-point timeline-point-indicator"></span>
                    <div class="timeline-event">
                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                            <h6><?= __("list_logins.ativa") ?></h6>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!-- /Activity Timeline -->

<script>
    var map;

    document.addEventListener('DOMContentLoaded', function() {
        function initializeMap() {
            map = L.map('map').setView([0, 0], 2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Adiciona um delay para garantir que o mapa seja redimensionado corretamente
            setTimeout(function() {
                map.invalidateSize();
            }, 1000);
        }

        function addMarker(lat, lon, city, date) {
            var popupContent = `<b style="font-size:15px; color: white !important;">${city}</b><p style="color: white !important;">Acesso: ${date}</p>`;
            var marker = L.marker([lat, lon]).addTo(map);
            marker.bindPopup(popupContent);
        }

        function resizeMap() {
            setTimeout(function() {
                map.invalidateSize();
            }, 500);
        }

        initializeMap();

        <?php if (mysqli_num_rows($logins) > 0) : ?>
            <?php while ($login = mysqli_fetch_assoc($logins)) : ?>
                <?php
                $date = date("d M/Y ", strtotime($login["log_date"]));
                $time = date("g:i a", strtotime($login["log_date"]));
                $coordenadas_array = explode(',', $login["log_localization"]);
                ?>
                addMarker("<?= $coordenadas_array[0] ?>", "<?= $coordenadas_array[1] ?>", "<?= $login["log_city"] ?> - <?= $login["log_state"] ?> / <?= $login["log_country"] ?>", "<?= $date . ' às ' . $time ?>");
            <?php endwhile; ?>
        <?php endif; ?>

        resizeMap();

        document.getElementById('logins-section').addEventListener('shown.bs.tab', function (e) {
            resizeMap();
        });

        $('.delete').on('click', function() {
            const code = $(this).attr("data-code");
            Swal.fire({
                title: '<?= __("list_logins.pop_up.derrubar") ?>',
                text: "<?= __("list_logins.pop_up.descricao") ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B22222',
                cancelButtonColor: '#1f8cd4',
                cancelButtonText: '<?= __("list_logins.pop_up.cancelar") ?>',
                confirmButtonText: '<?= __("list_logins.pop_up.confirmar") ?>'
            }).then((result) => {
                if (result.value) {
                    axios.post(`<?= Config::BASE_ACTION_URL ?>/delete/login/${code}`)
                        .then(function(response) {
                            if (response.data != "sucesso!") {
                                throw response.data;
                                window.location.href = "<?= Config::BASE_URL . "list-logins" ?>"
                            } else {
                                window.location.href = "<?= Config::BASE_URL . "list-logins" ?>"
                            }
                        })
                        .catch(function(error) {
                            Swal.fire({
                                title: '<?= __("list_logins.pop_up.erro") ?>',
                                text: "error",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#1f8cd4',
                                cancelButtonColor: '#d33',
                                confirmButtonText: '<?= __("list_logins.pop_up.ok") ?>'
                            })
                        });
                }
            })
        })

        $('#deleteSessions').on('click', function() {
            const code = $(this).attr("data-code");
            Swal.fire({
                title: '<?= __("list_logins.pop_up.derrubar_tudo") ?>',
                text: "<?= __("list_logins.pop_up.desc_todas") ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B22222',
                cancelButtonColor: '#1f8cd4',
                cancelButtonText: '<?= __("list_logins.pop_up.cancelar") ?>',
                confirmButtonText: '<?= __("list_logins.pop_up.confirmar") ?>'
            }).then((result) => {
                if (result.value) {
                    axios.post(`<?= Config::BASE_ACTION_URL ?>/delete/logins`)
                        .then(function(response) {
                            if (response.data != "sucesso!") {
                                throw response.data;
                                window.location.href = "<?= Config::BASE_URL . "list-logins" ?>"
                            } else {
                                window.location.href = "<?= Config::BASE_URL . "list-logins" ?>"
                            }
                        })
                        .catch(function(error) {
                            Swal.fire({
                                title: '<?= __("list_logins.pop_up.erro") ?>',
                                text: "error",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#1f8cd4',
                                cancelButtonColor: '#d33',
                                confirmButtonText: '<?= __("list_logins.pop_up.ok") ?>'
                            })
                        });
                }
            })
        })
    });
</script>
