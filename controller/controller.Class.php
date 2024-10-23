<?php

use API\Controller\Config;
use API\Controller\ipinfo;
use API\Model\Whitelist;
use API\Controller\CSRFToken;
use API\enum\Timeline_enum;
use API\Model\Sanitize;
use API\Model\SYSTEM_BC_DAO;
use API\Model\Timeline;

class Connect extends PDO
{
    public function __construct()
    {
        parent::__construct(
            "mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DB_NAME . "",
            Config::USERNAME,
            Config::DB_PASSWORD,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}

class Controller
{
    function newTimeline($user, $ticket, $title, $description, $type)
    {

        $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::LOGS_DB_NAME);

        if (!$conn) {
            return ("Connection failed: " . mysqli_connect_error());
        }
        $conn->set_charset("utf8mb4");
        $user = mysqli_real_escape_string($conn, $user);
        $ticket = mysqli_real_escape_string($conn, $ticket);
        $title = mysqli_real_escape_string($conn, $title);
        $description = mysqli_real_escape_string($conn, $description);
        $type = mysqli_real_escape_string($conn, $type);
        if (isset($_SESSION["company_id"])) {
            $company = $_SESSION["company_id"];
        } else {
            $company = 9999;
        }

        $sql = "INSERT INTO " . Config::TABLE_TIMELINE . "
        (tln_user, tln_ticketReference, tln_title, tln_description, tln_type, tln_company) VALUES
        ('$user', '$ticket', '$title', '$description', '$type', '$company');";

        if (mysqli_query($conn, $sql)) {
            return "sucesso!";
        } else {
            $error_msg =  mysqli_error($conn);
            $error = true;
            return $error_msg;
        }
    }


    function checkUserStatus($id, $sess)
    {
        $db = new Connect;
        $user = $db->prepare("SELECT id FROM user WHERE id=:id AND session=:session");
        $user->execute([
            ':id'       => intval($id),
            ':session'  => $sess
        ]);
        $userInfo = $user->fetch(PDO::FETCH_ASSOC);
        if (!$userInfo["id"]) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    // function for generating password and login session
    function generateCode($length)
    {
        $chars = "vwxyzABCD02789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }


    function newLog($user, $operation, $function, $status)
    {

        $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::LOGS_DB_NAME);
        $conn->set_charset("utf8mb4");


        $user = mysqli_real_escape_string($conn, $user);
        $operation = mysqli_real_escape_string($conn, $operation);
        $function = mysqli_real_escape_string($conn, $function);
        $status = mysqli_real_escape_string($conn, $status);

        $sql = "INSERT INTO " . Config::TABLE_LOGS . "
        (log_user, log_operation, log_function, log_status) VALUES
        ('$user', '$operation', '$function', '$status');";

        if (mysqli_query($conn, $sql)) {
            return "sucesso!";
        } else {
            $error_msg =  mysqli_error($conn);
            $error = true;
            return $error_msg;
        }
    }

    function insertData($data)
    {
        $db = new Connect;
        $checkUser = $db->prepare("SELECT * FROM " . Config::TABLE_USERS . " WHERE usr_email=:email");
        $checkUser->execute(array(
            'email' => $data['email']
        ));
        $info = $checkUser->fetch(PDO::FETCH_ASSOC);

        $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);
        $conn6 = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);
        $connection = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::LOGS_DB_NAME);

        $role = 1;
        $born = "00-00-0000";
        $companyID = 9999;
        $companyIdentifier = "tRtkdbpddnkqabEVxrYj";
        $phone = "";
        $email = $data["email"];
        $picture = $data["avatar"];
        $name = $data["givenName"];
        $sobrenome = $data["familyName"] ? $data["familyName"] : " ";
        $sobrenomeLimpo =  str_replace(' ', '.', $sobrenome);
        $nomeLimpo =  str_replace(' ', '.', $name);
        $data = date('d');
        $mes = date('m');
        $min = date('i');
        $name = ucfirst($nomeLimpo);
        $sobrenomeLimpo = ucfirst($sobrenomeLimpo);

        $NameCamelCase =  Sanitize::cleanUpAndCamelCase($name, $sobrenomeLimpo);
        $username = $NameCamelCase . $data . $mes . $min;

        $joinCompany = "";
        $partes = explode("@", $email);
        $dominio = $partes[1];

        $sqlDom1 = "SELECT com_id, com_dominio1, com_dominio2, com_identifier, com_pendingLine FROM " . Config::TABLE_COMPANY . " WHERE com_dominio1 = '$dominio';";
        $resultDom1 = mysqli_query($conn, $sqlDom1);
        if ($resultDom1) {
            if (mysqli_num_rows($resultDom1) > 0) {
                $com1 = mysqli_fetch_assoc($resultDom1); {
                    if ($com1["com_pendingLine"] == 1) {
                        $joinCompany = $com1["com_id"];
                        $companyID = 9999;
                        $companyIdentifier = "tRtkdbpddnkqabEVxrYj";
                        $this->newLog(0, "User $email solicitou entrada para na empresa $companyID", "newUser - Google", "OK");
                    } else {
                        $companyID = $com1["com_id"];
                        $companyIdentifier = $com1["com_identifier"];
                        $this->newLog(0, "User $email joined company $companyID", "newUser - Google", "OK");
                    }
                }
            }
        }

        $sqlDom2 = "SELECT com_id, com_dominio1, com_dominio2, com_identifier, com_pendingLine FROM " . Config::TABLE_COMPANY . " WHERE com_dominio2 = '$dominio';";
        $resultDom2 = mysqli_query($conn, $sqlDom2);
        if ($resultDom2) {
            if (mysqli_num_rows($resultDom2) > 0) {
                $com2 = mysqli_fetch_assoc($resultDom2); {
                    if ($com2["com_pendingLine"] == 1) {
                        $joinCompany = $com2["com_id"];
                        $companyID = 9999;
                        $companyIdentifier = "tRtkdbpddnkqabEVxrYj";
                        $this->newLog(0, "User $email solicitou entrada para na empresa $companyID", "newUser - Google", "OK");
                    } else {
                        $companyID = $com2["com_id"];
                        $companyIdentifier = $com2["com_identifier"];
                        $this->newLog(0, "User $email joined company $companyID", "newUser - Google", "OK");
                    }
                }
            }
        }


        if (!$info["usr_id"]) {
            $session = $this->generateCode(10);
            $insertNewUser = $db->prepare("INSERT INTO user (usr_name, usr_last_name, usr_picture, usr_email, usr_password, usr_role, usr_born_date, usr_company, usr_companyIdentifier, usr_user, usr_phone, usr_public_id, usr_from) VALUES (:f_name, :l_name, :avatar, :email, :password, :role, :born, :companyID, :companyIdentifier, :username, :phone, :public_id, :from)");
            $insertNewUser->execute([
                ':f_name'   => $name,
                ':l_name'   => $sobrenome,
                ':avatar'   => $picture,
                ':email'    => $email,
                ':password' => 'LoginViaAPI',
                ':role'    => $role,
                ':born'    => $born,
                ':companyID'    => $companyID,
                ':companyIdentifier'    => $companyIdentifier,
                ':username'    => $username,
                ':phone'    => $phone,
                ':public_id'    => 'Google User',
                ':from'    => '2'


            ]);
            if ($insertNewUser) {
                $this->newLog(99999, "Usuário Google NÃO existe, registrando", "controller.Class", "OK");


                $sql2 = "SELECT *  FROM " . Config::TABLE_USERS . "
                WHERE usr_email = '$email';";

                $result = mysqli_query($conn, $sql2);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                        $session = $this->generateCode(50);
                        $new = "new";
                        $_SESSION["user_id"] = $user["usr_id"]; /*session variavel da sessao = userQueEORetornoDoBanco[nomeDoCampoNoBanco]*/
                        $_SESSION["user_name"] = $user["usr_name"];
                        $_SESSION["user_email"] = $user["usr_email"];
                        $_SESSION["user_last_name"] = $user["usr_last_name"];
                        $_SESSION["user_role"] = $user["usr_role"];
                        $_SESSION["user_born_date"] = $user["usr_born_date"];
                        $_SESSION["username"] = $user["usr_user"];
                        $_SESSION["user_picture"] = $user["usr_picture"];
                        $_SESSION["company_id"] = $user["usr_company"];;
                        $_SESSION["company_identifier"] = $user["usr_companyIdentifier"];
                        $_SESSION["user_from"] = $user["usr_from"];
                        $_SESSION["user_theme"] = $user["usr_theme"];
                        $_SESSION["user_language"] = $user["usr_language"];
                        $_SESSION["user_profile_completed"] = $user["usr_profile_completed"];
                        $_SESSION["user_public_id"] = $user["usr_public_id"];
                        $_SESSION["user_defaultPassword"] = $user["usr_defaultPassword"];
                        $_SESSION["user_phone_verified"] = $user["usr_phone_verified"];
                        $_SESSION["notifications"] = "";
                        CSRFToken::generate();

                        // $user = $_SESSION["user_id"];
                        // $username = $_SESSION["username"];

                        // SE TIVER AGUARDANDO ENTRAR EM ALGUMA EMPRESA, FAÇA O REQUEST DE ENTRADA
                        if ($joinCompany != "") {
                            $user = $_SESSION["user_id"];
                            $sql3 = "INSERT INTO " . Config::TABLE_APROVACAO . "
                                (apv_user, apv_company) VALUES ('$user', '$joinCompany');";

                            if (mysqli_query($conn, $sql3)) {
                                $_SESSION["allowBC"] = 1;
                                $_SESSION["allowGoogle"] = 1;
                                $_SESSION["forceColor"] = 0;
                                $_SESSION["forceDoubleStep"] = 0;
                                $_SESSION["pendingLine"] = 0;
                                $text = "Sua solicitação de acesso à empresa $dominio foi efetivada com sucesso!";
                                $textLog = "Sua solicitação de acesso à empresa $dominio foi efetivada com sucesso! SQL: " . $sql3;
                                $this->newLog($_SESSION["user_id"], $textLog, "joinCompany", "OK");
                                $this->newTimeline($user, 11111111, "Solicitação de acesso a um Domínio efetivada", $text, 9);
                                $error = false;
                            } else {
                                $error_msg = "Erro ao solicitar acesso à empresa. Contacte o suporte" . mysqli_error($conn);
                                $this->newLog($_SESSION["user_id"], $sql3, "joinCompany", $error_msg);
                                $error = true;
                                return $error_msg;
                            }
                        }
                        // FIM DO REQUEST DE ENTRADA
                        // CARREGA PERMISSÕES DE EMPRESA NA SESSÃO
                        $company = $user["usr_company"];
                        $sql6 = "SELECT com_allowBC, com_allowGoogle, com_extTickets, com_wetalkDefault, com_extTicketsUrl, com_forceColor, com_forceDoubleStep, com_pendingLine  FROM " . Config::TABLE_COMPANY . "
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
                                $_SESSION["extTickets"] = $companyUser["com_extTickets"];
                                $_SESSION["extTicketsURL"] = $companyUser["com_extTicketsUrl"];
                                $_SESSION["wetalkDefault"] = $companyUser["com_wetalkDefault"];

                                $this->newLog($_SESSION["user_id"], "Permissões da empresa carregadas para a sessão do usuário.", "controller.Class - cadastro", "OK");
                            } else {
                                $error_msg6 = "Erro ao carregar permissões da empresa na sessão do usuário. Erro:" . mysqli_error($conn6);
                                $this->newLog($_SESSION["user_id"], "Erro ao carregar permissões da empresa na sessão do usuário", "controller.Class - cadastro", $error_msg6);
                                $error = true;
                            }
                        }

                        // FIM DO CARREGAMENTO DE PERMISSÕES DA EMPRESA NA SESSAO 

                        $user = $_SESSION["user_id"];
                        $username = $_SESSION["username"];


                        $insertCard = $db->prepare("INSERT INTO card (crd_user, crd_username) VALUES (:f_name, :l_name)");
                        $insertCard->execute([
                            ':f_name'   => $user,
                            ':l_name'   => $username,

                        ]);


                        if ($insertCard) {
                            $this->newTimeline($_SESSION["user_id"], 00000, "Seu Business Card foi criado com sucesso! 😎", "Seu Business card já está disponível!", 9);
                            $this->newLog($user, "BUSINESS CARD CRIADO COM SUCESSO!", "controller.Class - cadastro Google", "OK");
                            if (SYSTEM_BC_DAO::newBCStyle($username, $user, $_SESSION['user_company'], 'NewUser using Password')){
                                Timeline::new($_SESSION["user_id"], 00000, "Seu business card foi estilizado de forma padrão!", "Estilizamos seu business card com as cores padrões, altere nas configurações.", Timeline_enum::USER_CHANGE);
                            };
                        }


                        // $session = $this->generateCode(50);
                        $ipLocal = $_SERVER['REMOTE_ADDR'];
                        $ipinfo = new ipinfo("$ipLocal");
                        $userId = $_SESSION["user_id"];
                        $ip = $ipinfo->fetch()->ip;
                        if (isset($ipinfo->fetch()->city)) {
                            $cidade = $ipinfo->fetch()->city;
                            $regiao = $ipinfo->fetch()->region;
                            $pais = $ipinfo->fetch()->country;
                            $loc = $ipinfo->fetch()->loc;
                            $timezone = $ipinfo->fetch()->timezone;
                        } else {
                            $cidade = "Desconhecido";
                            $regiao = "Desconhecido";
                            $pais = "Desconhecido";
                            $loc = "Desconhecido";
                            $timezone = "Desconhecido";
                        }

                        // setcookie ( "vr_session_keep", "$session");

                        $_SESSION["session_key"] = $session;

                        $sql2 = "INSERT INTO " . Config::TABLE_LOGINS . "
                                (log_user, log_ip, log_localization, log_city, log_state, log_country, log_timezone, log_session) VALUES
                                ('$userId', '$ip', '$loc', '$cidade', '$regiao', '$pais', '$timezone', '$session' );";
                        // echo"salvou o ip";
                        if (mysqli_query($connection, $sql2)) {
                            $loginText = "Sua conta foi acessada em $cidade / $regiao (IP:  $ip)";
                            Whitelist::include($ip, $cidade, $regiao, $pais, $loc);
                            Whitelist::keepLast10($userId);
                            $this->newTimeline($userId, 11111111, "Acesso à sua conta", $loginText, 6);
                            $this->newLog($userId, $loginText, "controller.Class - cadastro Google", "OK");
                            $error = false;
                        }

                        // $_SESSION["theme"] = 1;
                    }
                } else {
                    $error_msg = "Usuário não encontrado!";
                    $error = true;
                    echo $error_msg;
                }
                header('Location:' . Config::BASE_URL . 'accept-terms');
                exit();
            } else {
                $this->newLog($_SESSION["user_id"], "ERRO AO CRIAR USUÁRIO GOOGLE", "controller.Class", "ERRO");
                return "Error inserting user!";
            }
        } else {
            $this->newLog(99999, "Usuário Google existe, fazendo Login", "controller.Class", "OK");

            // echo "fazendo login";
            if ($info["usr_password"] == "LoginViaAPI") {
                $_SESSION["user_id"] = $info["usr_id"]; /*session variavel da sessao = userQueEORetornoDoBanco[nomeDoCampoNoBanco]*/
                $_SESSION["user_name"] = $info["usr_name"];
                $_SESSION["user_email"] = $info["usr_email"];
                // $_SESSION["usr_profile_pic"] = $user["usr_profile_pic"];
                $_SESSION["user_last_name"] = $info["usr_last_name"];
                $_SESSION["user_role"] = $info["usr_role"];
                $_SESSION["username"] = $info["usr_user"];
                $_SESSION["user_theme"] = $info["usr_theme"];
                $_SESSION["user_born_date"] = $info["usr_born_date"];
                $_SESSION["user_picture"] = $info["usr_picture"];
                $_SESSION["company_identifier"] = $info["usr_companyIdentifier"];
                $_SESSION["company_id"] = $info["usr_company"];
                $_SESSION["user_language"] = $info["usr_language"];
                $_SESSION["user_from"] = $info["usr_from"];
                $_SESSION["user_public_id"] = $info["usr_public_id"];
                $_SESSION["user_profile_completed"] = $info["usr_profile_completed"];
                $_SESSION["user_phone_verified"] = $info["usr_phone_verified"];
                $_SESSION["user_defaultPassword"] = $info["usr_defaultPassword"];

                $_SESSION["notifications"] = "";
                CSRFToken::generate();

                // CARREGA PERMISSÕES DE EMPRESA NA SESSÃO
                $company = $info["usr_company"];
                $sql6 = "SELECT com_allowBC, com_allowGoogle, com_extTickets, com_wetalkDefault, com_extTicketsUrl, com_forceColor, com_forceDoubleStep, com_pendingLine  FROM " . Config::TABLE_COMPANY . "
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
                        $_SESSION["extTickets"] = $companyUser["com_extTickets"];
                        $_SESSION["extTicketsURL"] = $companyUser["com_extTicketsUrl"];
                                $_SESSION["wetalkDefault"] = $companyUser["com_wetalkDefault"];

                        $this->newLog($_SESSION["user_id"], "Permissões da empresa carregadas para a sessão do usuário.", "controller.Class - login", "OK");
                    } else {
                        $error_msg6 = "Erro ao carregar permissões da empresa na sessão do usuário. Erro:" . mysqli_error($conn6);
                        $this->newLog($_SESSION["user_id"], "Erro ao carregar permissões da empresa na sessão do usuário", "controller.Class - login", $error_msg6);
                        $error = true;
                    }
                }

                // FIM DO CARREGAMENTO DE PERMISSÕES DA EMPRESA NA SESSAO 


                $session = $this->generateCode(50);
                $ipLocal = $_SERVER['REMOTE_ADDR'];
                $ipinfo = new ipinfo("$ipLocal");
                $userId = $_SESSION["user_id"];
                $ip = $ipinfo->fetch()->ip;
                if (isset($ipinfo->fetch()->city)) {
                    $cidade = $ipinfo->fetch()->city;
                    $regiao = $ipinfo->fetch()->region;
                    $pais = $ipinfo->fetch()->country;
                    $loc = $ipinfo->fetch()->loc;
                    $timezone = $ipinfo->fetch()->timezone;
                } else {
                    $cidade = "Desconhecido";
                    $regiao = "Desconhecido";
                    $pais = "Desconhecido";
                    $loc = "Desconhecido";
                    $timezone = "Desconhecido";
                }
                $new = "login";

                $_SESSION["session_key"] = $session;

                $sql2 = "INSERT INTO " . Config::TABLE_LOGINS . "
                (log_user, log_ip, log_localization, log_city, log_state, log_country, log_timezone, log_session) VALUES
                ('$userId', '$ip', '$loc', '$cidade', '$regiao', '$pais', '$timezone', '$session' );";
                // echo"salvou o ip";
                if (mysqli_query($connection, $sql2)) {
                    $loginText = "Sua conta foi acessada em $cidade / $regiao (IP:  $ip)";
                    Whitelist::include($ip, $cidade, $regiao, $pais, $loc);
                    Whitelist::keepLast10($userId);
                    $this->newTimeline($userId, 11111111, "Acesso à sua conta", $loginText, 6);
                    $this->newLog($_SESSION["user_id"], $loginText, "controller.Class", "OK");

                    $error = false;
                } else {
                    $error_msg = "Erro ao validar localização. Atualize a página para continuar" . mysqli_error($connection);
                    $this->newLog($_SESSION["user_id"], "Erro ao validar localização", "controller.Class", $error_msg);
                    $error = true;
                    echo $error_msg;
                }
                echo '
                <script>
                function obterCookie(nome) {
                    const cookies = document.cookie.split("; ");
        
                    for (let i = 0; i < cookies.length; i++) {
                        const cookie = cookies[i].split("=");
                        const cookieNome = decodeURIComponent(cookie[0]);
                        const cookieValor = decodeURIComponent(cookie[1]);
        
                        if (cookieNome === nome) {
                            return cookieValor;
                        }
                    }
        
                    return null; // Retorna null se o cookie não for encontrado.
                }
        
                function getTheme() {
                    procedure = obterCookie("themeGetter");
                    if (procedure === 1){
                        if (window.matchMedia) {
                            if (window.matchMedia("(prefers-color-scheme: light)").matches) {
                                setCookie("theme", "Light", 7);
                            } else {
                                setCookie("theme", "Dark", 7);
                            }
                        } else {
                            setCookie("theme", "Light", 7);
                        }
                    } else if (procedure === 2){
                        setCookie("theme", "Dark", 7);
                    } else {
                        setCookie("theme", "Light", 7);
                    }
        
                }
        

                    function setCookie(name, value, daysToExpire) {
                        const date = new Date();
                        date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
                        const expires = "expires=" + date.toUTCString();
                        document.cookie = name + "=" + value + ";" + expires + ";path=/";
                    }

        //
                </script>
                <script>getTheme()</script>';





                header('Location:' . Config::BASE_URL . 'dashboard');
                exit();
            } else {
                echo '
                <html style="background-color:black;">
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="sweetalert2.min.js"></script>
                <link rel="apple-touch-icon" href="src/img/favcon-vr.ico">
                <link rel="shortcut icon" type="image/x-icon" href="src/img/favcon-vr.ico">
                <link rel="stylesheet" href="sweetalert2.min.css">
                <script>
                        function erro() {
                            Swal.fire({
                                title: "Erro!",
                                text: "Tivemos um problema ao criar sua conta, verifique se você já não possui uma conta cadastrada, tentando redefinir sua senha. Ou entre em contato com o suporte!",
                                icon: "error",
                                showCancelButton: false,
                                confirmButtonColor: "#1f8cd4",
                                cancelButtonColor: "#d33",
                                allowOutsideClick: false,
                                confirmButtonText: "Legal!",
                                backdrop: `
                                    rgba(0,0,123,0.4)
                                    url("")
                                    left top
                                    no-repeat
                                `
                                }).then((result) => {
                                if (result.isConfirmed) {
                                window.location.href = "' . Config::BASE_URL . 'login"
                                }
                            });
                        }
                    </script>
                    <script>erro();</script>
                    </html>
                
                
                ';
            }
        }
    }
}
