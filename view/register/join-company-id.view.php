
<?php
use API\Controller\Config;
use const Siler\Config\CONFIG; ?>
<?php if (mysqli_num_rows($companies) > 0): ?>
    <?php while($myCompany = mysqli_fetch_assoc($companies)):?>

  <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
<?php include "view/src/head-admin.php"; ?>
<link rel="stylesheet" href="src/css/login.css">
  <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="src/css/main.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'><link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" type="text/css" href="src/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="../src/css/login.css"></head>
<style>
  body {
  background: linear-gradient(to bottom right, <?=$myCompany["com_color"]?> 0%, #1f8cd4 100%);
  z-index: -1;
}
</style>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page" style="overflow:hidden;">
  <!-- BEGIN: Content-->

  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row"> 
        <a class="navbar-brand" id="logo-brand" href="<?=Config::BASE_URL . ''?>"><img class="home_nav_img" style="margin-top:2%; margin-left:5%; position: fixed; max-height: 100px; height:auto; width: auto;" src="<?= $myCompany["com_logo"]?>" height="75px" width="160px" alt="logo" ></a>
          
      </div>
      <br><br>
      <div    class="content-body">
        <div class="auth-wrapper auth-basic px-2">
          <div class="auth-inner my-2">
            <!-- Login basic -->
            <div id="form" class="card mb-0">
              <div class="card-body">
              <span style="font-size: 30px; font-style: Montsseray; ">Portal <?= $myCompany["com_name"]?></span> 
                <form id="login-form" class="auth-login-form mt-2">
                  <div class="mb-1">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="login-password">Senha</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input type="text" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                      <input type="text" hidden class="form-control form-control-merge" id="login-password" name="identifier" value="<?=$myCompany["com_identifier"]?>" />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                  </div>
                  
                  
                  <button class="btn btn-primary w-100" tabindex="4">Acessar</button>
                  </div>
                </form>
                <p class="text-center mt-2">
                    <span>Faça Login</span>
                  </a>
                </p>
                <?php if(isset($_SESSION["user_id"])):?>
                <p class="text-center mt-2">
                  
                  <a href="<?= Config::BASE_URL . "company-join" ?>">
                    <span>Retornar ao portal </span>
                  </a>
                </p>
                <?php endif;?>

                <div class="divider my-2">
                  <!-- <div class="divider-text"></div> -->
                </div>
                <div class="auth-footer-btn d-flex justify-content-center">
                  
                </div>
              </div>
            </div>

          </div>
        </div>
        <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <!-- /Login basic -->

      </div>
    </div>
  </div>
  <!-- END: Content-->

  <?php
    require __DIR__."/../default.js.php";
  ?>
  <!-- PAGE JS -->
  <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-login.js"></script>
  <script>
     $("#login-form").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/company/join', object)
            .then(function(response) {
                console.log(response)
                if (response.data.error) {
                    throw response.data;                      
                } else {
                    if (response.data == "Welcome!"){
                        window.location.href = "<?= Config::BASE_URL?>company/<?=$myCompany["com_identifier"]?>"
                    } else{
                        Swal.fire({
                            title: '<?= __("Erro ao logar!") ?>',
                            text: response.data,
                            icon: 'error',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: '#1f8cd4',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?= __("Legal!") ?>'
                            }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        })
                    }
                    
                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("Register failed!") ?>',
                    text: error.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
    });

  </script>
  <?php
      // require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>
</body>

<?php endwhile;?>
<?php endif;?>

<!-- END: Body-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</html>
