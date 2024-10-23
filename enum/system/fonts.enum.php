<?php

namespace API\enum;

class Fonts
{
   const inter = 0;
   const newAmsterdam = 1;
   const openSans = 2;
   const baskervville = 3;
   const montserrat = 4;
   const cookie = 5;
   const ubuntu = 6;
   const pgo = 7;
   const satisfy = 8;
   const khand = 9;

   public static $nomes = [
      self::inter => 'Inter',
      self::newAmsterdam => 'New Amsterdam',
      self::openSans => 'Open Sans',
      self::baskervville => 'Baskervville SC',
      self::montserrat => 'Montserrat',
      self::ubuntu => 'Ubuntu',
      self::cookie => 'Cookie',
      self::pgo => 'PGO', //Pathway Gothic One
      self::satisfy => 'Satisfy',
      self::khand => 'Khand',
   ];

   public static $style = [
      self::inter => 'font-family: "Inter", sans-serif !important;',
      self::newAmsterdam => 'font-family: "New Amsterdam", sans-serif !important;',
      self::openSans => 'font-family: "Open Sans", sans-serif !important;',
      self::baskervville => 'font-family: "Baskervville SC"!important;',
      self::montserrat => 'font-family: "Montserrat", sans-serif !important;',
      self::ubuntu => 'font-family: "Ubuntu", sans-serif !important;',
      self::cookie => 'font-family: "Cookie", cursive !important;',
      self::pgo => 'font-family: "Pathway Gothic One", system-ui !important;', 
      self::satisfy => 'font-family: "Satisfy", cursive !important;', 
      self::khand => 'font-family: "Khand", sans-serif !important;', 
   ];

   public static $props = [
      self::inter => 'Inter',
      self::newAmsterdam => 'New Amsterdam',
      self::openSans => 'Open Sans',
      self::baskervville => 'Baskervville SC',
      self::montserrat => 'Montserrat',
      self::ubuntu => 'Ubuntu',
      self::cookie => 'Cookie',
      self::pgo => 'Pathway Gothic One', 
      self::satisfy => 'Satisfy', 
      self::khand => 'Khand', 
   ];

   public static $cdn = [
      self::inter => '<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">',
      self::newAmsterdam => '<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">',
      self::openSans => '<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">',
      self::baskervville => '<link href="https://fonts.googleapis.com/css2?family=Baskervville+SC&display=swap" rel="stylesheet">',
      self::montserrat => '<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">',
      self::ubuntu => '<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">',
      self::cookie => '<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">',
      self::pgo => '<link href="https://fonts.googleapis.com/css2?family=Pathway+Gothic+One&display=swap" rel="stylesheet">',
      self::satisfy => '<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">',
      self::khand => '<link href="https://fonts.googleapis.com/css2?family=Khand:wght@300;400;500;600;700&display=swap" rel="stylesheet">',
   ];

   public static function getNome($id)
   {
      if (array_key_exists($id, self::$nomes)) {
         return self::$nomes[$id];
      }
   }

   public static function getCdn($id)
   {
      if (array_key_exists($id, self::$cdn)) {
         return self::$cdn[$id];
      }
   }

   public static function getStyle($id)
   {
      if (array_key_exists($id, self::$style)) {
         return self::$style[$id];
      }
   }

   public static function getProps($id)
   {
      if (array_key_exists($id, self::$props)) {
         return self::$props[$id];
      }
   }

 
}
