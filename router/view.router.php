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
            $obj->verifyCookies();
            $obj->checkSession();
            require __DIR__ . "/../view/public/new-index.view.php";
        });
        $this->addRoute("get", "/redirect", function ($args) use ($obj) {
            $obj->verifyCookies();
            $obj->checkSession();
            require __DIR__ . "/../view/public/redirect-server.php";
        });
        $this->addRoute("get", "/dashboard", function ($args) use ($obj) {
            $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->completedProfile();
            $companies = loadCompaniesComplete();
            require __DIR__ . "/../view/general/dashboard.php";
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
        if (isset($_SESSION["user_role"])  && ($_SESSION["user_role"] == 0)) {
            header('Location: ' . Config::BASE_URL . "verify-email");
        };
        if (isset($_SESSION["user_role"])  && ($_SESSION["user_role"] == 9)) {
            header('Location: ' . Config::BASE_URL . "deactivated");
        };
        return;
    }

    public function completedProfile()
    {
        if ($_SESSION["user_profile_completed"] != 1) {
            if ($_SESSION["user_role"] == 5) {
                header('Location: ' . Config::BASE_URL . "complete-your-profile-partner");
            } else {
                header('Location: ' . Config::BASE_URL . "complete-your-profile");
            }
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

    public function verifyCookies()
    {
        if ((!isset($_SESSION["user_id"])) && (isset($_COOKIE["vr_session_key"]))) {

            $connSession = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

            if (!$connSession) {
                return ("Connection failed: " . mysqli_connect_error());
            }

            $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

            if (!$conn) {
                return ("Connection failed: " . mysqli_connect_error());
            }
            $conn6 = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

            if (!$conn6) {
                return ("Connection failed: " . mysqli_connect_error());
            }

            $session = $_COOKIE["vr_session_key"];

            $sql = "SELECT log_user, log_session FROM " . Config::TABLE_LOGINS . " WHERE log_session = '$session'";
            $resultSession = mysqli_query($connSession, $sql);
            if ($resultSession) {
                if (mysqli_num_rows($resultSession) > 0) {
                    $session = mysqli_fetch_assoc($resultSession);
                    $id = $session["log_user"];

                    $sql2 = "SELECT *  FROM " . Config::TABLE_USERS . "
                            WHERE usr_id = '$id';";

                    $result = mysqli_query($conn, $sql2);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            $user = mysqli_fetch_assoc($result);

                            // CARREGA PERMISSÕES DE EMPRESA NA SESSÃO
                            $company = $user["usr_company"];
                            $userID = $user["usr_id"];
                            $sql6 = "SELECT com_allowBC, com_allowGoogle, com_forceColor, com_forceDoubleStep, com_pendingLine  FROM " . Config::TABLE_COMPANY . "
                                                 WHERE com_id = '$company';";

                            $resultCompany = mysqli_query($conn6, $sql6);
                            if ($resultCompany) {
                                if (mysqli_num_rows($resultCompany) > 0) {
                                    $companyUser = mysqli_fetch_assoc($resultCompany);
                                    $_SESSION["allowBC"] = $companyUser["com_allowBC"];
                                    $_SESSION["allowGoogle"] = $companyUser["com_allowGoogle"];
                                    $_SESSION["forceColor"] = $companyUser["com_forceColor"];
                                    $_SESSION["forceDoubleStep"] = $companyUser["com_forceDoubleStep"];
                                    $_SESSION["pendingLine"] = $companyUser["com_pendingLine"];
                                    //  $this->newLog($userID, "Permissões da empresa carregadas para a sessão do usuário.", "login", "OK");
                                } else {
                                    $_SESSION["allowBC"] = 0;
                                    $_SESSION["allowGoogle"] = 0;
                                    $_SESSION["forceColor"] = 0;
                                    $_SESSION["forceDoubleStep"] = 0;
                                    $_SESSION["pendingLine"] = 0;
                                    $error_msg6 = "Erro ao carregar permissões da empresa na sessão do usuário. Erro:" . mysqli_error($conn6);
                                    //  $this->newLog($userID, "Erro ao carregar permissões da empresa na sessão do usuário", "login", $error_msg6);
                                    $error = true;
                                }
                            }
                            $_SESSION["user_id"] = $user["usr_id"]; /*session variavel da sessao = userQueEORetornoDoBanco[nomeDoCampoNoBanco]*/
                            $_SESSION["user_name"] = $user["usr_name"];
                            $_SESSION["user_email"] = $user["usr_email"];
                            $_SESSION["user_last_name"] = $user["usr_last_name"];
                            $_SESSION["user_role"] = $user["usr_role"];
                            $_SESSION["username"] = $user["usr_user"];
                            $_SESSION["user_born_date"] = $user["usr_born_date"];
                            $_SESSION["user_picture"] = $user["usr_picture"];
                            $_SESSION["company_identifier"] = $user["usr_companyIdentifier"];
                            $_SESSION["company_id"] = $user["usr_company"];
                            $_SESSION["user_from"] = $user["usr_from"];
                            $_SESSION["user_profile_completed"] = $user["usr_profile_completed"];
                            $_SESSION["user_phone_verified"] = $user["usr_phone_verified"];
                            $_SESSION["notifications"] = "";
                            $_SESSION["session_key"] = $_COOKIE["vr_session_key"];
                            $_SESSION["user_theme"] = $user["usr_theme"];
                            $_SESSION["user_language"] = $user["usr_language"];
                            CSRFToken::generate();
                        } else {
                            $error_msg = "Usuário não encontrado!";
                            $error = true;
                            return $error_msg;
                        }
                    } else {
                        $error_msg = mysqli_error($conn);
                        $error = true;
                        return $error_msg;
                    }
                }
                return $result;
            }
        };
        return;
    }

    public function destroySession()
    {

        $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);
        $conn2 = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

        if (!$conn) {
            return ("Connection failed: " . mysqli_connect_error());
        }
        if (!$conn2) {
            return ("Connection failed: " . mysqli_connect_error());
        }

        $session = $_SESSION["session_key"];

        $sql = "DELETE FROM " . Config::TABLE_LOGINS . " WHERE log_session = '$session'";
        if (mysqli_query($conn, $sql)) {
            $user = $_SESSION["user_id"];
            $operation = "LOGOUT DE USUÁRIO";
            $function = "view.router - destroySession";
            $status = "OK";

            $sql2 = "INSERT INTO " . Config::TABLE_LOGS . "
            (log_user, log_operation, log_function, log_status) VALUES
            ('$user', '$operation', '$function', '$status');";

            mysqli_query($conn2, $sql2);
            return;
        } else {

            $user = $_SESSION["user_id"];
            $operation = mysqli_error($conn);
            $function = "view.router - destroySession";
            $status = "ERRO";

            $sql2 = "INSERT INTO " . Config::TABLE_LOGS . "
            (log_user, log_operation, log_function, log_status) VALUES
            ('$user', '$operation', '$function', '$status');";

            mysqli_query($conn2, $sql2);
            return;
        }
    }

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
