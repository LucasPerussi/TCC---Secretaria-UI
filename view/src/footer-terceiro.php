<!-- BEGIN: Footer-->

<footer class="footer footer-static footer-light">
          <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bi bi-arrow-up-short"></i></button>
      </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../layout/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme -->
    <script src="../../layout/app-assets/js/core/app-menu.js"></script>JS
    <script src="../../layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../layout/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
        
   <?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>
     document.querySelector("body").style.background = "#202124";
   <?php else : ?>
     document.querySelector("body").style.background = "#f8f8f8";
   <?php endif; ?> 
 </script>