<?php
namespace API\enum; 

class Notification_enum {
    const COMENTARIO = 1;
    const COMPUTADOR = 2;
    const ANIVERSARIO =3;
    const ACESSO = 4;
    const ALERTA = 5; 
    const NOVO_COMENTARIO =6; 
    const ALERTA_2 =5555; 
    const NOTIFICACAO=7;
    const CONCLUIDO=8; 
    const OS_ANDAMENTO=9; 
    const OS_NEGADA=10; 
    const OS_COMENTARIO=11; 
    const ENVIO_INFORMACAO=12; 
    const OS_ACEITA=13;

    public static $icones = [
         self::COMENTARIO=>'💭', // mudar o nome de todos e adicionar novas opçoes.
         self::COMPUTADOR=>'💻', 
         self::ANIVERSARIO=>'🎂', 
         self::ACESSO=>'🌍', 
         self::ALERTA=>'📢',
         self::NOVO_COMENTARIO=>'🙋‍♂️', 
         self::ALERTA_2=>'📢', 
         self::NOTIFICACAO=>'🔔', 
         self::CONCLUIDO=>'✅',
         self::OS_ANDAMENTO=>'🏃', 
         self::OS_NEGADA=>'❌', 
         self::OS_COMENTARIO=>'🗨️', 
         self::ENVIO_INFORMACAO=>'📤',
         self::OS_ACEITA=>'👍',
    ]; 

    public static $colorReal=[
        self::COMENTARIO=>'#3CB371', 
        self::COMPUTADOR=>' #00BFFF ', 
        self::ANIVERSARIO=>'#FFA500', 
        self::ACESSO=>'#48D1CC ', 
        self::ALERTA=>'#836FFF', 
        self::NOVO_COMENTARIO=>' #5480db', 
        self::ALERTA_2=>'#5480db ', 
        self::NOTIFICACAO=>' #5480db',
        self::CONCLUIDO=>'#00FF7F	',
        self::OS_ANDAMENTO=>'#FFA500', 
        self::OS_ANDAMENTO=>'#48D1CC', 
        self::OS_NEGADA=>'#c60000', 
        self::OS_COMENTARIO=>'#FFA500', 
        self::ENVIO_INFORMACAO=>'#BA55D3',
        self::OS_ACEITA=>'#3CB371',
    ]; 

    public static function getIcone($id) {
        if (array_key_exists($id, self::$icones)) {
            return self::$icones[$id];
        }
        return "Indefinido";
    }
    public static function getColorReal($id) {
        if (array_key_exists($id, self::$colorReal)) {
            return self::$colorReal[$id];
        }
        return "Indefinido";
    } 
   
   
   } 

   
