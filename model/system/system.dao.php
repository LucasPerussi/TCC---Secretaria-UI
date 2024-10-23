<?php

namespace API\Model;

use API\Model\Logger;
use API\Model\Database;
use API\Controller\Config;
use API\enum\Queue;
use API\enum\Timeline_enum;

use function API\Fetch\getUserId;

class SYSTEM_DAO
{
    // UPDATES GENERICOS DA EMPRESA 
    public static function update($att, $OS, $value, $function)
    {
        $conn = Database::connect();
        $sql = "UPDATE " . Config::TABLE_INTERNAL_OS . " SET $att = '$value' WHERE osi_number = '$OS'";
        if (mysqli_query($conn, $sql)) {
            Logger::log($_SESSION["user_id"] ?? 9999, $sql, "SYSTEM_DAO - update -  $function", "OK");
            // Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "O atributo $att foi atualizado!", "A OS teve seu atributo $att atualizado para $value", 6); 
            self::buildTimeline($att, $value, $OS);
            return true;
        } else {
            Logger::log($_SESSION["user_id"] ?? 9999, mysqli_error($conn), "SYSTEM_DAO - update - $function", "ERROR");
            return false;
        }
    }

    private static function buildTimeline($att, $value, $OS)
    {
        switch ($att) {
            case 'osi_queue':
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "A fila foi atualizada", "A OS foi movida para a fila " . Queue::getNome($value), Timeline_enum::OS_ATTRIBUTE);
                break;
            case 'osi_function':
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "A função foi atualizada", "A função da OS foi definida como $value", Timeline_enum::OS_ATTRIBUTE);
                break;
            case 'osi_commit':
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "O commit foi atualizado", "O commit da OS foi definido como $value", Timeline_enum::OS_ATTRIBUTE);
                break;
            case 'osi_url':
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "A URl foi atualizada", "A URL da OS foi definida como $value", Timeline_enum::OS_ATTRIBUTE);
                break;
            case 'osi_type':
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "O tipo foi atualizado", "O tipo da OS foi definida $value", Timeline_enum::OS_ATTRIBUTE);
                break;
            case 'osi_urgency':
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "A urgência foi atualizada", "A urgência da OS foi definida como $value", Timeline_enum::OS_ATTRIBUTE);
                break;
            case 'osi_responsible':
                $user = getUserId($value);
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "O responsavél pela OS foi atualizada", "O responsável pela OS foi definido como " . $user['nome'] . ' ' . $user['sobrenome'], Timeline_enum::OS_ATTRIBUTE);
                break;
            case 'osi_test_responsible':
                $user = getUserId($value);
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "O responsavél pelos testes (Q.A) foi atualizado", "O responsável pelo teste é " . $user['nome'] . ' ' . $user['sobrenome'], Timeline_enum::OS_ATTRIBUTE);
                break;
            default:
                Timeline::new($_SESSION["user_id"] ?? 9999, $OS, "O atributo $att foi atualizado!", "A OS teve seu atributo $att atualizado para $value", Timeline_enum::OS_ATTRIBUTE);
                break;
        }
    }
}

    // 1 - Pendente (Parceiro)
    // 2 - Aguardando Wetalk
    // 3 - Aceito / Em Andamento
    // 4 - Concluído
    // 5 - Aguardando Nova Proposta
    // 9 - Recusado
