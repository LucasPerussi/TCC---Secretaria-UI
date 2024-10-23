<?php

namespace API\Model;

use API\Model\Database;
use API\Model\Logger;
use const Siler\Config\CONFIG;
use API\Controller\Config;
use API\Controller\RandomStrGenerator;
use API\Controller\SendEmail;
use function API\Fetch\listProvidersArray;
use function API\Fetch\getUserIdComplete;
use API\enum\Notification_enum;
use API\enum\Timeline_enum;

class TicketsModel
{
    private $user;
    private $username;
    private $dbConnection;


    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $this->user = $_SESSION["user_id"];
            $this->username = $_SESSION["username"];
        }
        $this->dbConnection = Database::connect();
    }


    function newComment($picture, $description, $id, $whisper)
    {
        $name = $_SESSION['user_name'] . " " .  $_SESSION['user_last_name'];
        $pic = $_SESSION['user_picture'];
        $company = $_SESSION['company_id'];

        $description = mysqli_real_escape_string($this->dbConnection, $description);
        $picture = Sanitize::clean($picture, "picture", "newComment");
        $identifier = Sanitize::clean($id, "identifier", "newComment");
        $whisper = Sanitize::clean($whisper, "whisper", "newComment");

        $value = 0;
        if ($whisper == "on") {
            $value = 1;
        } else {
            $value = 0;
        }

        if ($description != "") {
            $sql = "INSERT INTO " . Config::TABLE_COMMENTS . "
                (cmt_user, cmt_txt, cmt_picture, cmt_ticketIdentifier, cmt_authorPicture, cmt_authorName, cmt_company, cmt_master) VALUES
                ('$this->user', '$description','$picture', '$identifier', '$pic', '$name', '$company', '$value');";

            if (mysqli_query($this->dbConnection, $sql)) {
                Logger::log($_SESSION["user_id"] ?? 9999, $sql, "newComment", "OK");
                if ($value == 0) {
                    Logger::log($_SESSION["user_id"] ?? 9999, $sql, "newComment", "OK");
                    Timeline::new($_SESSION["user_id"], $identifier, "Novo comentário", "Um novo comentário foi registrado em seu chamado, efetuado por " . $name, Timeline_enum::NEW_COMMENT);
                    return true;
                } else {
                    Logger::log($_SESSION["user_id"] ?? 9999, "COMENTARIO INTERNO REGISTRADO. SQL: " . $sql, "newComment", "OK");
                    return true;
                }
            } else {
                $error_msg =  mysqli_error($this->dbConnection);
                Logger::log($_SESSION["user_id"] ?? 9999, "ERRO AO SALVAR COMENTARIO", "newComment", $error_msg);
                return false;
            }
        } else {
            $error_msg =  "Comentário enviado vazio. Provavelmente o usuário tentou o request via inspecionar do navegador.";
            Logger::log($_SESSION["user_id"] ?? 9999, $error_msg, "newComment", "ERROR");
            return false;
        }
    }



}
