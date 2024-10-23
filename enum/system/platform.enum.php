<?php
namespace API\enum; 

class Platform {
   const ZOOM = 1; 
   const TEAMS = 2; 
   const GOOGLE = 3; 
   const WEBEX = 4; 

   public static $nomes =[
       self::ZOOM => 'Zoom', 
       self::TEAMS => 'Teams', 
       self::GOOGLE => 'Google', 
       self::WEBEX => 'Webex'
   ]; 
   
   public static $color = [
      self::ZOOM=>'info', 
      self::TEAMS=>'primary', 
      self::GOOGLE=>'success', 
      self::WEBEX=>'secondary'
   ];
    
   public static $colorReal = [
      self::ZOOM=>'	#2d8cff', 
      self::TEAMS=>'#3d2f81', 
      self::GOOGLE=>'#00AC47', 
      self::WEBEX=>'#005072' 
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