<!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="layout/app-assets/vendors/js/charts/apexcharts.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme -->
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="layout/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        <?php

use API\Controller\Config;

if ($_SESSION["theme"] == 2) {?>
            $("body").addClass("dark-layout");
        <?php }?>

        $(".change-theme").click(function(e) {
            $("body").append("<div id='jisnasdxkesne23135' style='position: fixed;z-index:99999;display:flex;align-items:center;justify-content:center;top:0;left:0;width:100vw;height:100vh;background:#000000a3;font-size:40px;color:#fff;text-align:center;'><?=__("message.loading")?></div>");
            e.preventDefault();
            axios.post('<?=Config::BASE_ACTION_URL?>/user/toggle/theme', {})
            .then(function(response) {
                if (response.data.error) {
                      throw response.data;
                } else {
                    localStorage.setItem("light-layout-current-skin", "light-layout");
                    window.location.reload();
                }
            })
            .catch(function(error) {
                $("#jisnasdxkesne23135").remove();
                Swal.fire({
                    title: '<?=__("error.failed_change_theme")?>',
                    text: error.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?=__("OK")?>'
                })
            });
        })
    </script>