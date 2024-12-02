<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Fetch\DateTime;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


// CARREGA COMENTARIOS DO CHAMADO
function loadCommentsArray($idCom): array
{
    $conn = connect_db();
    $sql = "SELECT cmt_user, cmt_master, cmt_txt, cmt_date, cmt_picture, cmt_ticketIdentifier, cmt_authorPicture, cmt_authorName, cmt_company  FROM " . Config::TABLE_COMMENTS . " WHERE cmt_ticketIdentifier = '$idCom';";
    $result = mysqli_query($conn, $sql);

    $items = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $item = array(
                "user" => $row["cmt_user"],
                "master" => $row["cmt_master"],
                "text" => $row["cmt_txt"],
                "date" => $row["cmt_date"],
                "picture" => $row["cmt_picture"],
                "reference" => $row["cmt_ticketIdentifier"],
                "authorName" => $row["cmt_authorName"],
                "company" => $row["cmt_company"],
                "authorPicture" => $row["cmt_authorPicture"]
            );
            array_push($items, $item);
        }
    }
    return $items;
}

