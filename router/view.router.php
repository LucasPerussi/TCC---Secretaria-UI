<?php

namespace API\Fetch;

namespace API\Router\View;


use API\Controller\CSRFToken;
use API\Controller\Config;

use Exception;

use function API\Fetch\getAllFieldTypesDB;
use function API\Fetch\getAllInternship;
use function API\Fetch\getAllPendingHours;
use function API\Fetch\getAllProcessComments;
use function API\Fetch\getAllProcessResponses;
use function API\Fetch\getAllRequestsWithoutServer;
use function API\Fetch\getAllStagesUnified;
use function API\Fetch\getAllStatusTypes;
use function API\Fetch\getAlunos;
use function API\Fetch\getCompanies;
use function API\Fetch\getCompanyTypes;
use function API\Fetch\getCourseById;
use function API\Fetch\getCourseByStudent;
use function API\Fetch\getServidores;
use function API\Fetch\getCourses;
use function API\Fetch\getDefaultFields;
use function API\Fetch\getDefaultStages;
use function API\Fetch\getFormativeHourId;
use function API\Fetch\getFormativeHoursTypes;
use function API\Fetch\getHoursTotalUserPercentage;
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
use function API\Fetch\getMyRequestsStudent;
use function API\Fetch\getProccessFields;
use function API\Fetch\getProccessIdentifier;
use function API\Fetch\getInternshipById;
use function API\Fetch\getMyticketsAsServer;
use function API\Fetch\getStudentInternship;
use function API\Fetch\getProccessStages;
use function API\Fetch\getProccessTypeId;
use function API\Fetch\getReferenceTimelines;
use function API\Fetch\getStageTypes;
use function API\Fetch\getUnifiedStages;
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
            require __DIR__ . "/../view/public/new-index.view.php";
        });

        $this->addRoute("get", "/login", function ($args) use ($obj) {
            require __DIR__ . "/../view/auth/login.view.php";
        });

        $this->addRoute("get", "/register", function ($args) use ($obj) {
            require __DIR__ . "/../view/register/register.view.php";
        });

        $this->addRoute("get", "/password-recovery", function ($args) use ($obj) {
            require __DIR__ . "/../view/auth/password-recovery.view.php";
        });

        $this->addRoute("get", "/verify-email", function ($args) use ($obj) {
            require __DIR__ . "/../view/auth/verify-email.view.php";
        });

        $this->addRoute("get", "/denied", function ($args) use ($obj) {
            require __DIR__ . "/../view/general/noPermission.php";
        });

        $this->addRoute("get", "/logout", function ($args) use ($obj) {
            $obj->deleteCookies();
            require __DIR__ . "/../view/auth/logout.view.php";
        });

        $this->addRoute("get", "/closing-session", function ($args) use ($obj) {
            unset($_COOKIE['vr_session']);
            setcookie('vr_session', '', time() - 3600, '/'); // empty value and old timestamp
            require __DIR__ . "/../view/auth/logout.php";
        });

        $this->addRoute("get", "/dashboard", function ($args) use ($obj) {
            $obj->verifyLogged();
            if ($_SESSION['user_role'] == "Aluno") {
                $course = getCourseByStudent($_SESSION["user_id"]);
                $teachers = listTeachers();
                $requests = getMyRequestsStudent();
                require __DIR__ . "/../view/member/dashboard-member.php";
            } elseif ($_SESSION['user_role'] == "Professor") {
                $myteacherRequests = getMytickersAsTeacher();
                require __DIR__ . "/../view/teacher/dashboard.view.php";
            } elseif ($_SESSION['user_role'] == "Servidor") {
                $hours = getAllPendingHours();
                $contHoursPending = 0;
                foreach ($hours as $hour) {$contHoursPending++; };

                $myServerRequests = getMyticketsAsServer();
                $allRequestsWithoutServer = getAllRequestsWithoutServer();
                $last50Logs = getLast50Logs();
                require __DIR__ . "/../view/server/dashboard.view.php";
            } elseif ($_SESSION['user_role'] == "Admin") {
                $last50Logs = getLast50Logs();
                require __DIR__ . "/../view/admin/dashboard.view.php";
            }
        });

        $this->addRoute("get", "/account-history", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $timelines = getUserTimelines($_SESSION['user_id']);
            require __DIR__ . "/../view/general/account-history.view.php";
        });

        $this->addRoute("get", "/onboarding", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $timelines = getUserTimelines($_SESSION['user_id']);
            $user = getUser($_SESSION['user_id']);
            $courses = getCourses();
            require __DIR__ . "/../view/register/onboarding.view.php";
        });

        $this->addRoute("get", "/system-logs", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $logs = getLogs();
            require __DIR__ . "/../view/admin/system-logs.view.php";
        });

        $this->addRoute("get", "/dashboard-member", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/member/dashboard-member.php";
        });

        $this->addRoute("get", "/request/{processId}", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $request = getProccessIdentifier($args["processId"]);
            $obj->verifyUserCanAccess($request["aluno"]);

            $inputTypes = getInputTypes();
            $process = getProccessTypeId($request['tipo_solicitacao']);
            $proccessFields = getProccessFields($request['tipo_solicitacao']);
            $defaultFields = getDefaultFields($request['tipo_solicitacao']);
            $fieldtypesDb = getAllFieldTypesDB();
            $timelines = getReferenceTimelines($request['id']);

            $proccessStages = getProccessStages($request['tipo_solicitacao']);
            $allStageTypes = getAllStagesUnified();

            $teachers = listTeachers();
            $allResponses = getAllProcessResponses($args["processId"]);
            $allProcessComments = getAllProcessComments($request['id']);

            require __DIR__ . "/../view/general/request.view.php";
        });

        $this->addRoute("get", "/news-board", function ($args) use ($obj) {
            $obj->verifyLogged();
            $murais = getMurais();
            require __DIR__ . "/../view/user/news-board.view.php";
        });

        $this->addRoute("get", "/news-board-admin", function ($args) use ($obj) {
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $murais = getMurais();
            require __DIR__ . "/../view/admin/news-board-admin.view.php";
        });

        $this->addRoute("get", "/pending-formative-hours", function ($args) use ($obj) {
            $obj->verifyLogged();
            $obj->verifyServer();
            $hours = getAllPendingHours();
            require __DIR__ . "/../view/server/pending-formative-hours.view.php";
        });

        $this->addRoute("get", "/news-board-new", function ($args) use ($obj) {
            $obj->verifyLogged();
            $obj->verifyServer();

            $courses = getCourses();
            require __DIR__ . "/../view/admin/news-board-new.view.php";
        });

        $this->addRoute("get", "/complete-board", function ($args) use ($obj) {
            $obj->verifyLogged();

            $id = $_GET['id'] ?? null;
            if ($id) {
                $mural = getMuralById($id);
            } else {
                $mural = ["error" => "ID não fornecido"];
            }

            $mural = getMuralById($id);
            if (!isset($mural["error"])) {
                $autor = getUser($mural["autor"]);
            }
            require __DIR__ . "/../view/user/complete-board.view.php";
        });

        $this->addRoute("get", "/formative-member", function ($args) use ($obj) {
            $obj->verifyLogged();
            $hours = getHoursUser($_SESSION["user_id"]);
            $types = getFormativeHoursTypes();
            $course = getCourseByStudent($_SESSION["user_id"]);
            $percentage = getHoursUserPercentage($_SESSION["user_id"]);
            $percentageTotal = getHoursTotalUserPercentage($_SESSION["user_id"]);
            require __DIR__ . "/../view/member/formative-member.view.php";
        });

        $this->addRoute("get", "/settings", function ($args) use ($obj) {
            $obj->verifyLogged();
            $user = getUser($_SESSION['user_id']);
            $courses = getCourses();
            require __DIR__ . "/../view/general/user-settings.view.php";
        });

        $this->addRoute("get", "/change-password", function ($args) use ($obj) {
            $obj->verifyLogged();
            $user = getUser($_SESSION['user_id']);
            require __DIR__ . "/../view/general/change-password.view.php";
        });

        $this->addRoute("get", "/new-formative-member", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $types = getFormativeHoursTypes();
            require __DIR__ . "/../view/member/new-formative-member.view.php";
        });

        $this->addRoute("get", "/request-member", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            require __DIR__ . "/../view/member/request-member.view.php";
        });

        $this->addRoute("get", "/proccess-fields/{proccessId}", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $proccess = getProccessTypeId($args["proccessId"]);
            $inputTypes = getInputTypes();
            $defaultFields = getDefaultFields();
            require __DIR__ . "/../view/admin/proccess-fields.view.php";
        });

        $this->addRoute("get", "/proccess-type/{proccessId}", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $inputTypes = getInputTypes();
            $process = getProccessTypeId($args["proccessId"]);
            $proccessFields = getProccessFields($args["proccessId"]);
            $proccessStages = getProccessStages($args["proccessId"]);
            $allStageTypes = getAllStagesUnified();

            require __DIR__ . "/../view/admin/process-type.view.php";
        });
        

        $this->addRoute("get", "/proccess-stages/{proccessId}", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $proccess = getProccessTypeId($args["proccessId"]);
            $inputTypes = getInputTypes();
            $stageTypes = getStageTypes();
            $defaultFields = getDefaultFields();
            require __DIR__ . "/../view/admin/proccess-stages.view.php";
        });

        // $this->addRoute("get", "/request-admin", function ($args) use ($obj) {
        //     $obj->setCookies();
        //     $obj->verifyLogged();
        //     require __DIR__ . "/../view/admin/request-admin.view.php";
        // });

        $this->addRoute("get", "/new-request", function ($args) use ($obj) {
            $obj->verifyLogged();
            $types = getRequestTypes();
            if (isset($_GET['tipo_de_chamado'])) {
                $inputTypes = getInputTypes();
                $process = getProccessTypeId($_GET['tipo_de_chamado']);
                $proccessFields = getProccessFields($_GET['tipo_de_chamado']);
                $defaultFields = getDefaultFields($_GET['tipo_de_chamado']);
                $fieldtypesDb = getAllFieldTypesDB();
                $proccessStages = getProccessStages($_GET['tipo_de_chamado']);
                $allStageTypes = getAllStagesUnified();
            }
            require __DIR__ . "/../view/member/new-request.view.php";
        });

        $this->addRoute("get", "/fields", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $inputTypes = getInputTypes();
            $defaultFields = getDefaultFields();
            require __DIR__ . "/../view/admin/fields.view.php";
        });

        $this->addRoute("get", "/stages", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $stageTypes = getStageTypes();
            $defaultStages = getDefaultStages();
            require __DIR__ . "/../view/admin/stages.view.php";
        });

        // $this->addRoute("get", "/new-request-field", function ($args) use ($obj) {
        //     $obj->setCookies();
        //     $obj->verifyLogged();
        //     $obj->verifyAdmin();
        //     require __DIR__ . "/../view/member/new-request-field.view.php";
        // });

        $this->addRoute("get", "/entity-list", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
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

        $this->addRoute("get", "/formative-validate/{id}", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyServer();
            $hour = getFormativeHourId($args["id"]);
            require __DIR__ . "/../view/server/formative-validate.view.php";
        });

        $this->addRoute("get", "/companies", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyServer();
            $types = getCompanyTypes();
            $companies = getCompanies();
            require __DIR__ . "/../view/server/companies-management.view.php";
        });

        $this->addRoute("get", "/proccess-management", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();
            $processes = getRequestTypes();
            require __DIR__ . "/../view/admin/proccess-management.view.php";
        });

        $this->addRoute("get", "/courses-management", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyAdmin();

            $courses = getCourses();
            $teachers = listTeachers();

            require __DIR__ . "/../view/admin/courses-management.view.php";
        });

        $this->addRoute("get", "/internships", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $obj->verifyServer();

            $internships = getAllInternship();
            require __DIR__ . "/../view/server/internships.view.php";
        });

        $this->addRoute("get", "/new-internship-member", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();
            $teachers = listTeachers();
            $companies = getCompanies();
            $types = getCompanyTypes();


            require __DIR__ . "/../view/member/new-internship-member.view.php";
        });    
        

        $this->addRoute("get", "/internship-validate/{id}", function ($args) use ($obj) {
            $obj->setCookies();
            $obj->verifyLogged();                     
            $internshipId = getInternshipById($args["id"]);    
            $companyType = getCompanyTypes();  
            $teachers = listTeachers();


            require __DIR__ . "/../view/admin/internship-validate.view.php";
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

        if (isset($_SESSION["user_role"])  && ($_SESSION["user_role"] == "Deactivated")) {
            header('Location: ' . Config::BASE_URL . "deactivated");
        };
        return;
    }

    public function verifyAdmin()
    {
        if ($_SESSION["user_role"] != "Admin") {
            header('Location: ' . Config::BASE_URL . "denied");
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

    public function verifyServer()
    {
        if (($_SESSION["user_role"] != "Admin") && ($_SESSION["user_role"] != "Servidor") && ($_SESSION["user_role"] != "Professor")) {
            header('Location: ' . Config::BASE_URL . "denied");
        };
        return;
    }

    public function verifyUserCanAccess($author)
    {
        if (($_SESSION["user_role"] != "Admin") && ($_SESSION["user_role"] != "Servidor") && ($_SESSION["user_id"] != $author)) {
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
        };
        return;
    }
}
