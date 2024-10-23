<?php
use API\Controller\Config;
use API\Controller\User;
use const Siler\Config\CONFIG;

if (isset($_GET["id"])) {

    $id = $_GET["id"];

  $name = "";
  $lastName = "";
  $email = "";
  $phone = "";
  $city = "";
  $country = "";
  $picture = "";
  $username = "";
  $company = "";

  $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

    if (!$conn) {
        return("Connection failed: " . mysqli_connect_error());
    }

    $user = $_GET["id"];
    $sql = "SELECT usr_name, usr_email, usr_last_name, usr_role, usr_born_date, usr_picture, usr_company, usr_user, usr_phone, usr_country, usr_city  FROM " . Config::TABLE_USERS . " WHERE usr_id = '$id';";
           $result = mysqli_query($conn, $sql); 
            if($result){
               if (mysqli_num_rows($result) > 0){
                   while($user = mysqli_fetch_assoc($result)){
                        $name = $user["usr_name"];
                        $lastName = $user["usr_last_name"];
                        $email = $user["usr_email"];
                        $phone = $user["usr_phone"];
                        $city = $user["usr_city"];
                        $country = $user["usr_country"];
                        $picture = $user["usr_picture"];
                        $username = $user["usr_user"];
                        $company = $user["usr_company"];
                   }
               }
            }
            else 
            {
                $error_msg = mysqli_error($conn);
                $error = true;
                return $error_msg;
            }

       

  // Formatar as informações no formato vCard


 $image_data = file_get_contents($picture);
$base64_image = base64_encode($image_data);

$vcard = "BEGIN:VCARD\n";
$vcard .= "VERSION:3.0\n";
$vcard .= "REV:2023-04-28T21:25:29Z\n";
$vcard .= "N;CHARSET=utf-8:{$lastName};{$name}\n";
$vcard .= "FN;CHARSET=utf-8:{$name} {$lastName}\n";
$vcard .= "EMAIL;INTERNET;Email:{$email}\n";
$vcard .= "TEL:{$phone}\n";
$vcard .= "PHOTO;ENCODING=b;TYPE=PNG:$base64_image\n";
$vcard .= "URL:https://wejourney.com.br/business-card/$username\n";
$vcard .= "END:VCARD\n";

  // Definir o nome do arquivo vCard e enviar o arquivo para download
  $filename = "{$name}.vcf";
  header ("Pragma: no-cache");
  header('Content-Type: text/x-vcard;charset=utf-8;');
  header("Content-Disposition: attachment; filename=\"{$filename}\"");
  echo $vcard;
  exit;
}
?>