<?php

namespace API\Fetch;

use API\Controller\Config;
use API\enum\Timeline_enum;
use API\Fetch\DateTime;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;

// LISTA TODAS AS TIMELINES DE PROPOSTA, SEM FILTROS
function listTimelineTicket($ticketNumber)
{
    $conn = connect_logs_db();
    $sql = "SELECT * FROM " . Config::TABLE_TIMELINE . " WHERE tln_ticketReference = '$ticketNumber';";
    $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $items = array();
        while ($row = $result->fetch_assoc()) {
            $item = array(
                "id" => $row["tln_id"],
                "user" => $row["tln_user"],
                "ticketReference" => $row["tln_ticketReference"],
                "title" => $row["tln_title"],
                "description" => $row["tln_description"],
                "type" => [
                    "id" => $row["tln_type"],
                    "colorReal" => Timeline_enum::getColorReal($row["tln_type"]),
                    "badgeText" => Timeline_enum::getBadgeText($row["tln_type"]),
                    "button" => Timeline_enum::getButton($row["tln_type"]),
                    "invisible" => Timeline_enum::getInvisible($row["tln_type"])
                ],
                "date" => $row["tln_date"],
                "company" => $row["tln_company"]
            );
            array_push($items, $item);
        }
        return $items;
    } else {
        $error_msg = mysqli_error($conn);
        $error = true;
        return $error_msg;
    }
}

