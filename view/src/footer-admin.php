<!-- BEGIN: Footer-->
  <!-- END: Footer-->

  
    

    <!-- BEGIN: Vendor JS-->
    <script src="../layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme -->
    <script src="../layout/app-assets/js/core/app-menu.js"></script>
    <script src="../layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->
 
  <footer class="footer footer-static footer-light">
          <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bi bi-arrow-up-short"></i></button>
      </footer>
    <script>
      feather.replace()
    </script>
    <script>
   <?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>
     document.querySelector("body").style.backgroundColor = "#202124";
   <?php else : ?>
     document.querySelector("body").style.backgroundColor = "#f8f8f8";

   <?php endif; ?> 
 </script>