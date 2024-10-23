<h1><?= __("whitelist.titulo") ?></h1>
<br />
<div style="padding:20px;" class="card">
    <section class="app-user-list">
        <div class="row">


        </div>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <style>
            #map2 {
                height: 400px;
            }
        </style>

        <div class="card" style="padding:0px;">
            <div id="map2" style="border-radius:20px; z-index:0 !important;"></div>
            <script>
                var map2 = L.map('map2').setView([0, 0], 2);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map2);

                async function getCoordinates(city, country) {
                    var apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${city},${country}&limit=1&email=suporte@wetalkit.com.br`;

                    try {
                        const response = await fetch(apiUrl);
                        const data = await response.json();

                        if (data.length > 0) {
                            var latitude = data[0].lat;
                            var longitude = data[0].lon;
                            return {
                                latitude,
                                longitude,
                                country
                            };
                        } else {
                            console.log("Coordenadas não encontradas para a cidade especificada.");
                            return null;
                        }
                    } catch (error) {
                        console.error('Erro ao obter coordenadas:', error);
                        return null;
                    }
                }

                async function addMarker2(lat, lon, local, date) {
                    // var info = await getCoordinates(city, country);
                    var popupContent = `<b style="font-size:15px; color: white !important;">${local}</b><br><span style="color: white !important;">Acesso em: ${date}</span>`;


                    var marker = L.marker([lat, lon]).addTo(map2);
                    marker.bindPopup(popupContent).openPopup();

                }
            </script>

        </div>



        <!-- list and filter start -->
        <div class="card">

            <div class="card-datatable table-responsive pt-0" style="border-radius:20px !important;">


                <?php foreach ($whitelist as $local) { ?>
                    <script>
                        addMarker2(<?php if ($local["latlon"] != "") {
                                        $coordenadas = $local["latlon"];
                                    } else {
                                        $coordenadas = "0,0";
                                    };
                                    $created_at = $local["created_at"];
                                    $formatted_date = date("d/m/Y \à\s H:i", strtotime($created_at));
                                    $coordenadas_array = explode(',', $coordenadas) ?> "<?= $coordenadas_array[0] ?>", "<?= $coordenadas_array[1] ?>", "<?= $local["city"] ?> - <?= $local["state"] ?> / <?= $local["country"] ?>", "<?= $local["created_at"] ?>");
                    </script>
                    <div class="card" style="padding:20px; padding-bottom:10px; margin-bottom:10px;" id="bodyRequestDash">
                        <h5>🌍 <?= $local["city"] ?> / <?= $local["state"] ?> - <?= $local["country"] ?></h5>
                        <p style="margin-left:25px;">IP: <?= $local["ip"] ?> - Acesso em: <?= $formatted_date ?> </p> 
                    </div>
                <?php }; ?> 
            </div>
    </section> 