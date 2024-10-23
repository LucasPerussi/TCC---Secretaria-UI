<!--
    paginação


     <div class="col-xl-4 col-lg-12">
                                            <h5 class="text-center">Center Aligned</h5>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-center mt-2">
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                </ul>
                                            </nav>
                                        </div>



    direcionar clique de botao

    onclick="window.location.href = '<?=Config::BASE_URL?>create-company'"



    **********************************
    get com mais de uma varivel

    user/by/company?value=18&page=1


    ***************************************
    pegar as tags html dentro da string php
    <?php $content = html_entity_decode($topic["body"]);
echo $content;?>




    logo apple que o andrey fez


element.style {
    border-radius: 50%;
    overflow: hidden;
    width: 100px;
    height: 100px;
    background: url(https://cdn.dribbble.com/users/846207/screenshots/5495768/apple-logo-2018.gif);
    background-size: cover;
    background-position: center;
}

aos animation on scroll
 link do site
 https://michalsnik.github.io/aos/

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 

define fuso horario no servidor:


date_default_timezone_set('America/Sao_Paulo');



<div class="col-md-4 col-lg-3 col-xl-3 col-sm-6 col-xs-6 ">
                                                        <div class="card" id="conteudos" style="overflow:hidden;border-radius:20px; background-color:#f8f8f8 !important;">
                                                            <a href="<?= Config::BASE_URL . "content/" .  $contentL['cnt_unique']; ?>">
                                                                <div class="row">
                                                                    <div class="pic-<?= $contentL['cnt_id']; ?>" style="overflow:hidden; height:250px;width:100%;">
                                                                        <img class="oi" style="width:100%; height:auto; max-height:none; width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" src="<?= $contentL["cnt_publicBanner"]; ?>" alt="post pic">
                                                                    </div>
                                                                </div>
                                                                <div class="row" id="bg-<?= $contentL['cnt_id']; ?>" style=" color: white; height:110px;font-size:18px;">
                                                                    <div class="row" style="height:70px;padding:20px; padding-left:50px;padding-right:40px;font-weight:600;color:#6b6b6b;text-align:left; ">
                                                                    <?= $contentL["cnt_title"]; ?>
                                                                    </div>

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>





   <div class="row">
                                    <span style="font-size:16px;" ><?=$content['cnt_description'] ?></span>
                                    <p><?="Publicação: " . $content['cnt_date']?></p>
                                  </div>
                                  <div class="row">
                                  <style>
                                    .btn-copy{
                                      width: 95%; 
                                      margin: 2.5%; 
                                      border-style: hidden;
                                      padding:15px; 
                                      border-radius: 20px; 
                                      border-radius: 25px;
                                      background-color: #D6DFEE;
                                      padding: 12px;
                                      font-weight: medium;
                                      font-size: 18px;
                                    }
                                    .btn-copy:hover{
                                      box-shadow: 0px 9px 20px 4px #5456572c; 
                                      -webkit-box-shadow: 0px 9px 20px 4px #5456572c;
                                      transition: all 0.5s ease-out;
                                    }
                                  </style>
                                      <button class="btn-copy" onclick="copiarTexto()">Copiar Link</button>

                                      <script>
                           
                                          let copiarTexto = () => {
                                            //O texto que será copiado
                                            const texto = "<?= Config::BASE_URL . 'player/' . $content['cnt_unique'] ?>?ctpw=<?=$content['cnt_passwordCrypted']  ?>";
                                            //Cria um elemento input (pode ser um textarea)
                                            let inputTest = document.createElement("input");
                                            inputTest.value = texto;
                                            //Anexa o elemento ao body
                                            document.body.appendChild(inputTest);
                                            //seleciona todo o texto do elemento
                                            inputTest.select();
                                            //executa o comando copy
                                            //aqui é feito o ato de copiar para a area de trabalho com base na seleção
                                            document.execCommand('copy');
                                            //remove o elemento
                                            document.body.removeChild(inputTest);
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: true,
                                                didOpen: (toast) => {
                                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                              })

                                              Toast.fire({
                                                icon: 'success',
                                                title: 'O link desta página foi copiado para a área de transferência! :)'
                                              })
                                            // alert("O link desta página foi copiado para a área de transferência! :)");
                                        };
                                         
                                   
                                      </script>



                                      pegar o domínio

                                      <?php /*
                                                     $link = "perussilucas@gmail.com";
                                                     $partes = explode("@", $link);
                                                     echo $partes[1]; // dá 13542345                         
                                            ?>



<?php foreach ($users["data"]["items"] as $user) {?>
                                                    <?php if ($count < 10): ?>
                                                        <?php foreach ($base_users["data"]["items"] as $userB) {?>
                                                            <?php if ($userB["id"] == $user["id"]): ?>
                                                            <?php $depBanco = $userB["departament"]["id"];
    $depUser = $_SESSION["dep_id"];?>
                                                                <?php if (($depBanco == $depUser) && ($count < 10)): ?>
                                                                    <div class="col-md-4 col-6 profile-latest-img">
                                                                    <a href="<?=Config::BASE_URL . "view-profile/{$user["id"]}"?>">
                                                                    <img src="<?=$user["profile_pic"]?>" id="avatar" class="img-fluid rounded"/>
                                                                    </a>
                                                                    <?php $count = $count + 1;?>
                                                                    </div>
                                                                <?php endif;?>
                                                            <?php endif;?>
                                                        <?php }?>
                                                    <?php endif;?>
                                                <?php }?>





  <script>
                                            // Set the date we're counting down to
                                            let dataa<?=$ticket["tkt_id"]?> =  "<?=$ticket["tkt_due_date"]?>";
                                            let datee<?=$ticket["tkt_id"]?> = Date.parse(dataa<?=$ticket["tkt_id"]?>);
                                            let countDownDate<?=$ticket["tkt_id"]?> = new Date(dataa<?=$ticket["tkt_id"]?>).getTime();

                                            // Update the count down every 1 second
                                            let x<?=$ticket["tkt_id"]?> = setInterval(function() {

                                            // Get today's date and time
                                            let now<?=$ticket["tkt_id"]?> = new Date().getTime();
                                                
                                            // Find the distance between now and the count down date
                                            let distance<?=$ticket["tkt_id"]?> = countDownDate<?=$ticket["tkt_id"]?> - now<?=$ticket["tkt_id"]?>;
                                                
                                            // Time calculations for days, hours, minutes and seconds
                                            let days<?=$ticket["tkt_id"]?> = Math.floor(distance<?=$ticket["tkt_id"]?> / (1000 * 60 * 60 * 24));
                                            let hours<?=$ticket["tkt_id"]?> = Math.floor((distance<?=$ticket["tkt_id"]?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            let minutes<?=$ticket["tkt_id"]?> = Math.floor((distance<?=$ticket["tkt_id"]?> % (1000 * 60 * 60)) / (1000 * 60));
                                            let seconds<?=$ticket["tkt_id"]?> = Math.floor((distance<?=$ticket["tkt_id"]?> % (1000 * 60)) / 1000);
                                                
                                            // Output the result in an element with id="demo"
                                            // Output the result in an element with id="demo"
                                            if (distance<?=$ticket["tkt_id"]?> <= 1) {
                                                document.getElementById("time<?=$ticket["tkt_id"]?>").innerHTML = "ATRASADO!  " +days<?=$ticket["tkt_id"]?> + "d " + hours<?=$ticket["tkt_id"]?> + "h "
                                                + minutes<?=$ticket["tkt_id"]?> + "m " + seconds<?=$ticket["tkt_id"]?> + "s ";
                                            } else {
                                                if ((days<?=$ticket["tkt_id"]?> <= 1) && (days<?=$ticket["tkt_id"]?> >= 0)){
                                                    if ((days<?=$ticket["tkt_id"]?> == 0) && (hours<?=$ticket["tkt_id"]?> >= 4)){
                                                        let el = document.getElementById('time<?=$ticket["tkt_id"]?>');
                                                        el.classList.remove('badge-light-danger');
                                                        el.classList.add('badge-light-primary');
                                                    } 
                                                } else if(days<?=$ticket["tkt_id"]?> > 1){
                                                    let el = document.getElementById('time<?=$ticket["tkt_id"]?>');
                                                    el.classList.remove('badge-light-danger');
                                                    el.classList.add('badge-light-info');
                                                }
                                                document.getElementById("time<?=$ticket["tkt_id"]?>").innerHTML = days<?=$ticket["tkt_id"]?> + "d " + hours<?=$ticket["tkt_id"]?> + "h "
                                                + minutes<?=$ticket["tkt_id"]?> + "m " + seconds<?=$ticket["tkt_id"]?> + "s ";
                                            }
                                           }, 1000);
                                    </script>




                                    timezone no mysql
                                    SET @@global.time_zone = '-3:00';






pegar a url atual
 <?php $URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>







credito:

<a href="https://www.flaticon.com/free-icons/question" title="question icons">Question icons created by Freepik - Flaticon</a>


exibir bonito o array
                        <!-- <?php print("<pre>".print_r($allContent,true)."</pre>");?> -->



                        Array ( [@odata.context] => https://public5-api2.ploomes.com/$metadata#Webhooks [value] => Array ( [0] => Array ( [Id] => 40011274 [EntityId] => 7 [SecondaryEntityId] => [ActionId] => 2 [Name] => [CallbackUrl] => https://webhook-receiver.ploomes.com/Receive.asmx/Webhook [ValidationKey] => [CreatorId] => 40039623 [CreateDate] => 2023-12-15T15:52:54.437-03:00 [Active] => 1 [UserWebhook] => ) ) )
-->
  <!-- <div class="slide-container swiper ">
                                        <div class="slide-content swiperBtn">
                                            <div class="card-wrapper swiper-wrapper">

                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background);">
                                                            <div class="row">
                                                                <div style='padding:10px; width:50px;text-align:center; margin-top:30%;margin-left:30px; border-radius: var(--border-radius); background-color: var(--primary) !important;color: var(--on-primary) !important;'><i class="bi bi-discord"></i></div>
                                                                <div style='padding:10px; width:50px;text-align:center; margin-top:30%;margin-left:10px; border-radius: var(--border-radius); background-color: var(--primary) !important;color: var(--on-primary) !important;'><i class="bi bi-whatsapp"></i></div>
                                                                <div style='padding:10px; width:50px; text-align:center; margin-top:30%;margin-left:10px;border-radius: var(--border-radius); background-color: var(--primary) !important;color: var(--on-primary) !important;'><i class="bi bi-instagram"></i></div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h5 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Carrousel de ícones</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background);">

                                                            <div style="width:80%; margin:10%; margin-top:43px; margin-bottom:10px; padding:10px; background-color: var(--primary) !important; color: var(--on-primary); border-radius: var(--border-radius);">Primário</div>
                                                            <div style="width:80%; margin:10%; margin-top:15px; padding:10px;  background-color: var(--secondary) !important; color: var(--on-secondary); border-radius: var(--border-radius);">Secundário</div>

                                                        </div>
                                                        <div class="row ">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h5 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Botões Simples</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background);">

                                                            <div class="row mt-3">
                                                                <div style="width:50%; margin-left:15%; padding:10px; background-color: var(--primary) !important; color: var(--on-primary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ;">
                                                                    Primário
                                                                </div>
                                                                <div style="width:20%; margin-right:15%; padding:10px; background-color: var(--on-primary) !important; color: var(--primary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;text-align:center;">
                                                                    <i class="bi bi-discord"></i>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div style="width:50%; margin-left:15%; padding:10px; background-color: var(--secondary) !important; color: var(--on-secondary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ;">
                                                                    Secundário
                                                                </div>
                                                                <div style="width:20%; margin-right:15%; padding:10px; background-color: var(--on-secondary) !important; color: var(--secondary); border-radius: 0px var(--border-radius) var(--border-radius)  0px; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h5 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Botões com ícone (direita)</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background);">
                                                            <div class="row mt-3">
                                                                <div style="width:20%; margin-left:15%; padding:10px; background-color: var(--on-primary) !important; color: var(--primary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                                <div style="width:50%; margin-right:15%; padding:10px; background-color: var(--primary) !important; color: var(--on-primary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Primário
                                                                </div>
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div style="width:20%; margin-left:15%; padding:10px; background-color: var(--on-secondary) !important; color: var(--secondary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                                <div style="width:50%; margin-right:15%; padding:10px; background-color: var(--secondary) !important; color: var(--on-secondary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Secundário
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h5 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Botões com ícone (esquerda)</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background);">
                                                            <div class="row mt-3">
                                                                <div style="width:20%; margin-left:15%; padding:10px; background-color: var(--primary) !important; color: var(--on-primary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                                <div style="width:50%; margin-right:15%; padding:10px; background-color: var(--primary) !important; color: var(--on-primary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Primário
                                                                </div>
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div style="width:20%; margin-left:15%; padding:10px; background-color: var(--secondary) !important; color: var(--on-secondary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                                <div style="width:50%; margin-right:15%; padding:10px; background-color: var(--secondary) !important; color: var(--on-secondary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Secundário
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h5 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Botões com ícone simples (esquerda)</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background);">
                                                            <div class="row mt-3">
                                                                <div style="width:20%; margin-left:15%; padding:10px; background-color: var(--on-primary) !important; color: var(--primary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                                <div style="width:50%; margin-right:15%; padding:10px; background-color: var(--on-primary) !important; color: var(--primary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Primário
                                                                </div>
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div style="width:20%; margin-left:15%; padding:10px; background-color: var(--on-secondary) !important; color: var(--secondary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                                <div style="width:50%; margin-right:15%; padding:10px; background-color: var(--on-secondary) !important; color: var(--secondary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Secundário
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h6 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Btn. com ícone simples invertido (esquerda)</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background); display: -webkit-inline-box;">
                                                            <div class="card " style="overflow:hidden; width:60%;margin-left:10%; margin-top:10%;">
                                                                <div style="width:100%;background: var(--on-primary) !important; color: var(--primary) !important;height:110px; overflow:hidden">
                                                                    <img src="<?= $_SESSION["user_picture"] ?>" alt="foto de perfil" style="min-width:105%;min-height:105%;max-width:120%;">
                                                                </div>
                                                                <div style="width:100%;background: var(--primary) !important;color: var(--on-primary) !important;height:50px; text-align:center;padding:10px;">
                                                                    Primário
                                                                </div>
                                                            </div>
                                                            <div class="card " style="overflow:hidden; width:60%;margin-left:10%; margin-top:10%; ">
                                                                <div style="width:100%;background: var(--on-secondary) !important; color: var(--secondary) !important;height:110px;text-align:center;">
                                                                    <i style="margin-top:30px;font-size:40px;" class="bi bi-twitter"></i>
                                                                </div>
                                                                <div style="width:100%;background: var(--secondary) !important;color: var(--on-secondary) !important;height:50px;text-align:center;padding:10px;">
                                                                    Secundário
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h5 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Cartões verticais</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card swiper-slide" id="cardSmaller" style="border-radius:25px;">
                                                    <div class="card " style="overflow:hidden; width:100%;margin-right:15%;">
                                                        <div style="height:200px; background-color:var(--background);">
                                                            <div class="row mt-1">
                                                                <div style="width:28%; height:80px; margin-left:12%; overflow:hidden; padding:0px; background-color: var(--on-primary) !important; color: var(--primary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <img src="<?= $_SESSION["user_picture"] ?>" alt="foto de perfil" style="min-width:105%;min-height:105%;max-width:150%;">
                                                                </div>
                                                                <div style="width:48%;margin-right:12%; height:80px; padding:10px; padding-top:30px; background-color: var(--primary) !important; color: var(--on-primary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Primário
                                                                </div>
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div style="width:28%; margin-left:12%; height:80px; padding:10px; padding-top:30px; background-color: var(--on-secondary) !important; color: var(--secondary); border-radius:var(--border-radius) 0px   0px var(--border-radius) ; text-align:center;">
                                                                    <i class="bi bi-instagram"></i>
                                                                </div>
                                                                <div style="width:48%; margin-right:12%;  height:80px; padding:10px; padding-top:30px; background-color: var(--secondary) !important; color: var(--on-secondary); border-radius: 0px var(--border-radius) var(--border-radius)  0px;">
                                                                    Secundário
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div style="width:100%; height:50px; background-color:var(--background);">
                                                                <h6 style="color:var(--on-background) !important; text-align:center;font-weight:600 !important;">Cartões horizontais </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="swiper-pagination swiper-paginationBtn"></div>
                                        </div>
                                    </div> -->
// carouseis de botoes