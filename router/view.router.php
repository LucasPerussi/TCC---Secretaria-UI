<?php

namespace API\Fetch;

namespace API\Router\View;


use API\Controller\CSRFToken;
use API\Controller\Config;

use Exception;

use function API\Fetch\getAlunos;
use function API\Fetch\getServidores;
use function API\Fetch\getCourses;
use function API\Fetch\getDefaultFields;
use function API\Fetch\getDefaultStages;
use function API\Fetch\getFormativeHoursTypes;
use function API\Fetch\getHoursUser;
use function API\Fetch\getHoursUserPercentage;
use function API\Fetch\getInputTypes;
use function API\Fetch\getLast50Logs;
use function API\Fetch\getLogs;
use function API\Fetch\getMytickersAsTeacher;
use function API\Fetch\getRequestTypes;
use function API\Fetch\getUser;
use function API\Fetch\getUserTimelines;
use function API\Fetch\getMurais;
use function API\Fetch\getMuralById;
use function API\Fetch\getProccessTypeId;
use function API\Fetch\getStageTypes;
use function API\Fetch\listAdmins;
use function API\Fetch\loadCompaniesComplete;
use function API\Fetch\listProducts;
use function API\Fetch\loadContentLast;
use function API\Fetch\loadProductsContent;
use function API\Fetch\listContentEmAlta;
use function API\Fetch\listServers;
use function API\Fetch\listStudents;
use function API\Fetch\listTeachers;
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
        $this->addRoute("get", "/password-recovery", function ($args) use ($obj) {
            $obj->checkSession();
            require __DIR__ . "/../view/auth/password-recovery.view.php";
        });
        $this->addRoute("get", "/password-reset", function ($args) use ($obj) {
            $obj->checkSession();
            require __DIR__ . "/../view/auth/password-reset.view.php";
        });
        $this->addRoute("get", "/verify-email", function ($args) use ($obj) {
            $obj->checkSession();
            require __DIR__ . "/../view/auth/verify-email.view.php";
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
            // $obj->checkSession();
            // $obj->setCookies();
            $obj->verifyLogged();
            if ($_SESSION['user_role'] == "Aluno") {
                $last50Logs = getLast50Logs();
                require __DIR__ . "/../view/member/dashboard-member.php";
            } elseif ($_SESSION['user_role'] == "Professor") {
                $myteacherRequests = getMytickersAsTeacher();
                require __DIR__ . "/../view/teacher/dashboard.view.php";
            } elseif ($_SESSION['user_role'] == "Servidor") {
                $last50Logs = getLast50Logs();
                require __DIR__ . "/../view/server/dashboard.view.php";
            } elseif ($_SESSION['user_role'] == "Admin") {
                $last50Logs = getLast50Logs();
                require __DIR__ . "/../view/admin/dashboard.view.php";
            }
        });
        $this->addRoute("get", "/account-history", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $timelines = getUserTimelines($_SESSION['user_id']);
            require __DIR__ . "/../view/general/account-history.view.php";
        });
        $this->addRoute("get", "/system-logs", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $logs = getLogs();
            require __DIR__ . "/../view/admin/system-logs.view.php";
            //require __DIR__ . "/../view/admin/dashboard-admin.php";
        });
        $this->addRoute("get", "/dashboard-member", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/member/dashboard-member.php";
        });
        $this->addRoute("get", "/news-board", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->verifyLogged();
            $murais = getMurais();
            $authors = [];
            foreach ($murais as $mural) {
                if (!isset($authors[$mural["autor"]])) {
                    $user = getUser($mural["autor"]);
                    $authors[$mural["autor"]] = isset($user["error"]) ? "Desconhecido" : htmlspecialchars($user["name"]);
                }
            }
            require __DIR__ . "/../view/user/news-board.view.php";
        });
        $this->addRoute("get", "/complete-board", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->verifyLogged();
            $murais = getMuralById();
            require __DIR__ . "/../view/user/complete-board.view.php";
        });
        $this->addRoute("get", "/formative-member", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->verifyLogged();
            $hours = getHoursUser($_SESSION["user_id"]);
            $types = getFormativeHoursTypes();
            $percentage = getHoursUserPercentage($_SESSION["user_id"]);
            require __DIR__ . "/../view/member/formative-member.view.php";
        });
        $this->addRoute("get", "/courses-list", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->verifyLogged();
            // $courses = getCourses();
            require __DIR__ . "/../view/member/formative-member.view.php";
        });
        $this->addRoute("get", "/settings", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->verifyLogged();
            $user = getUser($_SESSION['user_id']);
            require __DIR__ . "/../view/general/user-settings.view.php";
        });
        $this->addRoute("get", "/change-password", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->verifyLogged();
            $user = getUser($_SESSION['user_id']);
            require __DIR__ . "/../view/general/change-password.view.php";
        });
        // $this->addRoute("get", "/formative-member", function ($args) use ($obj) {
        //     // $obj->verifyCookies();
        //     $obj->checkSession();
        //     $obj->setCookies();
        //     $obj->verifyLogged();
        //     require __DIR__ . "/../view/member/formative-member.view.php";
        // });
        $this->addRoute("get", "/new-formative-member", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $types = getFormativeHoursTypes();
            require __DIR__ . "/../view/member/new-formative-member.view.php";
        });
        // $this->addRoute("get", "/new-formative-member", function ($args) use ($obj) {
        //     // $obj->verifyCookies();
        //     $obj->checkSession();
        //     $obj->setCookies();
        //     $obj->verifyLogged();
        //     require __DIR__ . "/../view/member/new-formative-member.view.php";
        // });
        $this->addRoute("get", "/formative-member-details", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/member/formative-member-details.view.php";
        });
        $this->addRoute("get", "/request-member", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/member/request-member.view.php";
        });
        $this->addRoute("get", "/proccess-fields/{proccessId}", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $proccess = getProccessTypeId($args["proccessId"]);
            $inputTypes = getInputTypes();
            $defaultFields = getDefaultFields();
            require __DIR__ . "/../view/admin/proccess-fields.view.php";
        });
        $this->addRoute("get", "/proccess-stages/{proccessId}", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $proccess = getProccessTypeId($args["proccessId"]);
            $inputTypes = getInputTypes();
            $stageTypes = getStageTypes();
            $defaultFields = getDefaultFields();
            require __DIR__ . "/../view/admin/proccess-stages.view.php";
        });
        $this->addRoute("get", "/request-admin", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/admin/request-admin.view.php";
        });
        $this->addRoute("get", "/new-request", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->verifyLogged();
            $types = getRequestTypes();
            require __DIR__ . "/../view/member/new-request.view.php";
        });
        $this->addRoute("get", "/fields", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $inputTypes = getInputTypes();
            $defaultFields = getDefaultFields();
            require __DIR__ . "/../view/admin/fields.view.php";
        });
        $this->addRoute("get", "/stages", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $stageTypes = getStageTypes();
            $defaultStages = getDefaultStages();
            require __DIR__ . "/../view/admin/stages.view.php";
        });
        $this->addRoute("get", "/new-request-field", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/member/new-request-field.view.php";
        });
        $this->addRoute("get", "/entity-list", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $page = $_GET["page"] ?? 'alunos';
            switch ($page) {
                case 'alunos':
                    $users = listStudents();
                    break;
                case 'professores':
                    $users = listTeachers();
                    break;
                case 'servidores':
                    $users = listServers();
                    break;
                case 'admins':
                    $users = listAdmins();
                    break;

                default:
                    $users = listStudents();
                    break;
            }

            require __DIR__ . "/../view/admin/entity-list.php";
        });
        $this->addRoute("get", "/process-field", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/admin/process-field.php";
        });
        $this->addRoute("get", "/formative-validate", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/admin/formative-validate.php";
        });
        $this->addRoute("get", "/proccess-management", function ($args) use ($obj) {
            // $obj->verifyCookies();
            $obj->checkSession();
            $obj->setCookies();
            $obj->verifyLogged();
            $processes = getRequestTypes();
            require __DIR__ . "/../view/admin/proccess-management.view.php";
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
