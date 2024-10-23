<?php
namespace API\enum; 

class CompanyType {
   const PRIVATE = 1; 
   const BRAZILIAN_GOVERNMENT = 2; 
   const ONG = 3; 
   const SINDICATE = 4; 
   const CHURCH = 5; 
   const PUBLIC_ORGANIZATION = 6; 
   const COOPERATIVE = 7; 
   const INTERNATIONAL_GOVERNMENT = 8; 

   public static $nomes =[
       self::PRIVATE => 'Privado', 
       self::BRAZILIAN_GOVERNMENT => 'Governo (BR)', 
       self::ONG => 'ONG', 
       self::SINDICATE => 'Sindicato', 
       self::CHURCH => 'Igreja', 
       self::PUBLIC_ORGANIZATION => 'Organização Pública', 
       self::COOPERATIVE => 'Cooperativa', 
       self::INTERNATIONAL_GOVERNMENT => 'Governo (Internacional)', 
   ]; 
   
   public static $color = [
    self::PRIVATE => 'info', 
    self::BRAZILIAN_GOVERNMENT => 'success', 
    self::ONG => 'primary', 
    self::SINDICATE => 'dark', 
    self::CHURCH => 'warning', 
    self::PUBLIC_ORGANIZATION => 'danger', 
    self::COOPERATIVE => 'dark', 
    self::INTERNATIONAL_GOVERNMENT => 'success', 
   ];
    
   public static $colorReal = [
    self::PRIVATE => '#00BBD3', 
    self::BRAZILIAN_GOVERNMENT => '#3ac85b', 
    self::ONG => '#8B1ED4', 
    self::SINDICATE => '#001011', 
    self::CHURCH => '#ff7500', 
    self::PUBLIC_ORGANIZATION => '#001011', 
    self::COOPERATIVE => '#001011', 
    self::INTERNATIONAL_GOVERNMENT => '#D0D128', 
   ]; 

   public static function getNome($id){
      if(array_key_exists($id,self::$nomes)){
         return self::$nomes[$id];
      }
   } 

   public static function getColor($id){
      if(array_key_exists($id, self::$color)){
         return self::$color[$id];
      }
   } 

   public static function getColorReal($id){
      if(array_key_exists($id, self::$colorReal)){
         return self::$colorReal[$id];
      }
   }

} 