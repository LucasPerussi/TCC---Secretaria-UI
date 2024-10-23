<?php

namespace API\Fetch;

use API\Controller\Config;
use API\enum\CompanyType;
use API\enum\Licensing;
use API\enum\Platform;
use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;



function getCompanyInfo()
{
    $conn = connect_db();
    $id = $_SESSION["company_id"];
    $sql = "SELECT * FROM " . Config::TABLE_COMPANY . " WHERE com_id = $id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                switch ($row["com_platform"]) {
                    case 1:
                        $plataform = "Zoom";
                        break;
                    case 2:
                        $plataform = "Teams";
                        break;
                    case 3:
                        $plataform = "Google";
                        break;

                    default:
                        $plataform = "Indefinido";
                        break;
                }

                return array(
                    "id" => (int) $row["com_id"],
                    "nome" => $row["com_name"],
                    "identificador" => $row["com_identifier"],
                    "senha" => $row["com_password"],
                    "cor" => $row["com_color"],
                    "imagem" => $row["com_picture"],
                    "email" => $row["com_email"],
                    "criadoEm" => $row["com_createdAt"],
                    "logo" => $row["com_logo"],
                    "sobre" => $row["com_about"],
                    "plataforma" => (int) $row["com_platform"],
                    "plataformaLabel" => $plataform,
                    "senhaCriptografada" => $row["com_passwordCrypted"],
                    "dominio1" => $row["com_dominio1"],
                    "dominio2" => $row["com_dominio2"],
                    "sla" => (int) $row["com_sla"],
                    "telefone" => $row["com_phone"],
                    "website" => $row["com_website"],
                    "endereco" => $row["com_address"],
                    "permiteBC" => (int) $row["com_allowBC"],
                    "permiteGoogle" => (int) $row["com_allowGoogle"],
                    "forcarCor" => (int) $row["com_forceColor"],
                    "forcarDoisPassos" => (int) $row["com_forceDoubleStep"],
                    "linhaPendente" => (int) $row["com_pendingLine"],
                    "slaInterno" => (int) $row["com_sla_internal"],
                    "bannerDinamico" => (int) $row["com_dinamicBanner"],
                    "ticketsExternos" => (int) $row["com_extTickets"],
                    "urlTicketsExternos" => $row["com_extTicketsUrl"],
                    "wetalkPadrao" => (int) $row["com_wetalkDefault"],
                    "cnpj" => $row["com_cnpj"],
                    "ploomesId" => $row["com_ploomes_id"],
                    "basico" => (int) $row["com_basic"],
                    "licenciado" => (int) $row["com_licensed"],
                    "licenciadoAte" => $row["com_licensedUntil"],
                    "tipoEmpresa" => (int) $row["com_companyType"],
                    "dataInicioLicenca" => $row["com_licenseStartDate"],
                    "teste" => (int) $row["com_trial"],
                );
            }
        }
    } else {
        $error_msg = mysqli_error($conn);
        return array(
            "error" => true,
            "message" => $error_msg
        );
    }
}

// EMPRESA POR CNPJ
function listCompanyCNPJ($cnpj)
{
    $conn = connect_db();
    $id = $_SESSION["company_id"];
    $sql = "SELECT * FROM " . Config::TABLE_COMPANY . " WHERE com_cnpj = '$cnpj';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return $result;
    } else {
        $error_msg = mysqli_error($conn);
        $error = true;
        return $error_msg;
    }
}
