<?php use API\Controller\Config;?>
<?php if (!isset($_SESSION["user_id"])):?>
  <html>
  <head>
    <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "login";?> " />
  </head>
</html>
<?php else:?>
    <?php if($_SESSION["email_verified"] == false):?>
        <html>
        <head>
            <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "verify-email";?> " />
        </head>
        </html>
    <?php else:?>

        <?php if($_SESSION["user_approved"] == false):?>
        <html>
        <head>
            <!--<meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "verify-email";?> " />-->
        </head>
            <body>
                sai caloteira
            </body>
        </html>
    <?php else:?>