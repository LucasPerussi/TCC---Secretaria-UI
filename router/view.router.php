<?php

namespace API\Fetch;

namespace API\Router\View;


use API\Controller\CSRFToken;
use API\Controller\Config;

use Exception;
use function API\Fetch\loadCompaniesComplete;
use function API\Fetch\listProducts;
use function API\Fetch\loadContentLast;
use function API\Fetch\loadProductsContent;
use function API\Fetch\listContentEmAlta;
use function API\Fetch\loadContentVinte;



// END REPORTS


class Route extends \API\Router\DefaultRouter

{

    public function __construct()
    {
        parent::__construct();

        $obj = $this;

        $this->addRoute("get", "/", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            require __DIR__ . "/../view/public/new-index.view.php";
        });
        $this->addRoute("get", "/redirect", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            require __DIR__ . "/../view/public/redirect-server.php";
        });
        $this->addRoute("get", "/login", function ($args) use ($obj) {
            $obj->checkSession();
            require __DIR__ . "/../view/auth/login.view.php";
        });
        $this->addRoute("get", "/register", function ($args) use ($obj) {
            $obj->checkSession();
            require __DIR__ . "/../view/register/register.view.php";
        });
        $this->addRoute("get", "/logout", function ($args) use ($obj) {
            // $obj->destroySession();
            $obj->deleteCookies();
            require __DIR__ . "/../view/auth/logout.view.php";
        });
        $this->addRoute("get", "/closing-session", function ($args) use ($obj) {
            unset($_COOKIE['vr_session']);
            setcookie('vr_session', '', time() - 3600, '/'); // empty value and old timestamp
            require __DIR__ . "/../view/auth/logout.php";
        });
        $this->addRoute("get", "/dashboard", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/admin/dashboard-admin.php";
        });
        
     
    }

    public function createSolicitation() {}

    public function selectRoom()
    {
        require __DIR__ . "/../view/general/select-room-type.php";
    }

    public function verifyLogged()
    {
        if (!isset($_SESSION["user_id"])) {
            header('Location: ' . Config::BASE_URL . "login");
        };
        // if (isset($_SESSION["user_role"])  && ($_SESSION["user_role"] == 0)) {
        //     header('Location: ' . Config::BASE_URL . "verify-email");
        // };
        if (isset($_SESSION["user_role"])  && ($_SESSION["user_role"] == 9)) {
            header('Location: ' . Config::BASE_URL . "deactivated");
        };
        return;
    }


    public function verifyAdmin()
    {
        if (($_SESSION["user_role"] < 2) || ($_SESSION["user_role"] == 5)) {
            header('Location: ' . Config::BASE_URL . "denied");
        };
        return;
    }

    public function verifyPartner()
    {
        if (($_SESSION["user_role"] != 5) && (($_SESSION["user_role"] != 2) || ($_SESSION["company_id"] != 9999))) {
            header('Location: ' . Config::BASE_URL . "dashboard");
        };
        return;
    }
    public function verifyHigherThanMember()
    {
        if ($_SESSION["user_role"] < 2) {
            header('Location: ' . Config::BASE_URL . "dashboard");
        };
        return;
    }

    public function verifyUser()
    {
        if ($_SESSION["user_role"] > 2) {
            header('Location: ' . Config::BASE_URL . "denied");
        };
        return;
    }

   
    public function verifyAgent()
    {
        if (!((($_SESSION["user_role"] == 2) && ($_SESSION["company_id"] == 9999)) || ($_SESSION["user_role"] == 4))) {
            header('Location: ' . Config::BASE_URL . "denied");
        };
        return;
    }

    public function verifyMaster()
    {
        if ($_SESSION["user_role"] != 2) {
            header('Location: ' . Config::BASE_URL . "denied");
        };
        if (($_SESSION["user_role"]  == 2 && ($_SESSION["company_id"] != 9999))) {
            header('Location: ' . Config::BASE_URL . "denied");
        };
        return;
    }

    public function setCookies()
    {
        if (((isset($_COOKIE["keep"])) && ($_COOKIE["keep"] == "keep")) && (!isset($_COOKIE["vr_session_key"]))) {
            $expira = time() + (60 * 60 * 24 * 30);
            setcookie("vr_session_key", $_SESSION["session_key"], $expira);
            setcookie("keep", "", time() - 3600);
        };
        return;
    }

    public function deleteCookies()
    {
        if (isset($_COOKIE["vr_session_key"])) {
            setcookie("vr_session_key", "", time() - 3600);
            // setcookie("vr_session_keep", 2, 0);         
        };
        return;
    }

   
    // public function destroySession()
    // {

    //     $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);
    //     $conn2 = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

    //     if (!$conn) {
    //         return ("Connection failed: " . mysqli_connect_error());
    //     }
    //     if (!$conn2) {
    //         return ("Connection failed: " . mysqli_connect_error());
    //     }

    //     $session = $_SESSION["session_key"];

    //     $sql = "DELETE FROM " . Config::TABLE_LOGINS . " WHERE log_session = '$session'";
    //     if (mysqli_query($conn, $sql)) {
    //         $user = $_SESSION["user_id"];
    //         $operation = "LOGOUT DE USUÁRIO";
    //         $function = "view.router - destroySession";
    //         $status = "OK";

    //         $sql2 = "INSERT INTO " . Config::TABLE_LOGS . "
    //         (log_user, log_operation, log_function, log_status) VALUES
    //         ('$user', '$operation', '$function', '$status');";

    //         mysqli_query($conn2, $sql2);
    //         return;
    //     } else {

    //         $user = $_SESSION["user_id"];
    //         $operation = mysqli_error($conn);
    //         $function = "view.router - destroySession";
    //         $status = "ERRO";

    //         $sql2 = "INSERT INTO " . Config::TABLE_LOGS . "
    //         (log_user, log_operation, log_function, log_status) VALUES
    //         ('$user', '$operation', '$function', '$status');";

    //         mysqli_query($conn2, $sql2);
    //         return;
    //     }
    // }

    public function checkSession()
    {
        // if ((isset($_SESSION["session_key"])) && ((isset($_COOKIE["keep"])) && ($_COOKIE["keep"] == "keep"))){
        // if ((isset($_SESSION["session_key"]))) {
        //     $connSession = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::LOGS_DB_NAME);

        //     if (!$connSession) {
        //         return ("Connection failed: " . mysqli_connect_error());
        //     }

        //     $session = $_SESSION["session_key"];

        //     $sql = "SELECT log_session FROM " . Config::TABLE_LOGINS . " WHERE log_session = '$session'";
        //     $resultSession = mysqli_query($connSession, $sql);
        //     if ($resultSession) {
        //         if (mysqli_num_rows($resultSession) > 0) {
        //             return;
        //         } else {
        //             echo "<script>window.location.href = '" . Config::BASE_URL . "logout" . "';</script>";
        //         }
        //         return;
        //     } else {
        //         return "erro de acesso ao banco";
        //     }
        // }
    }

    public function verifyGeneric()
    {
        // if (isset($_SESSION["company_id"]) && ($_SESSION["company_id"] == 9999)) {
        //     echo "<script>window.location.href = '" . Config::BASE_URL . "dashboard';</script>";
        // } 
        return;
    }

    public function verifyHasCompany()
    {
        if (isset($_SESSION["company_id"]) && ($_SESSION["company_id"] != 9999)) {
            echo "<script>window.location.href = '" . Config::BASE_URL . "company/" . $_SESSION["company_identifier"] . "';</script>";
        };
        return;
    }
}
