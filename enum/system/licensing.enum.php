<?php

namespace API\enum;

class Licensing
{
   const NO_LICENSE = 0;
   const THIRTY_DAYS = 1;
   const NINETY_DAYS = 2;
   const HALF_YEAR = 3;
   const ONE_YEAR = 4;
   const LIFETIME = 9;

   public static $nomes = [
      self::NO_LICENSE => 'Sem Licença',
      self::THIRTY_DAYS => '30 dias',
      self::NINETY_DAYS => '90 dias',
      self::HALF_YEAR => '180 dias',
      self::ONE_YEAR => '1 ano',
      self::LIFETIME => 'Lifetime',
   ];

   public static $color = [
      self::NO_LICENSE => 'warning',
      self::THIRTY_DAYS => 'info',
      self::NINETY_DAYS => 'success',
      self::HALF_YEAR => 'success',
      self::ONE_YEAR => 'primary',
      self::LIFETIME => 'danger',
   ];

   public static $colorReal = [
      self::NO_LICENSE => '#ff7500',
      self::THIRTY_DAYS => '#00BBD3',
      self::NINETY_DAYS => '#D0D128',
      self::HALF_YEAR => '#D0D128',
      self::ONE_YEAR => '#8B1ED4',
      self::LIFETIME => '#001011',
   ];

   public static $timeModifier = [
      self::NO_LICENSE => '-1 day',
      self::THIRTY_DAYS => '+30 days',
      self::NINETY_DAYS => '+90 days',
      self::HALF_YEAR => '+180 days',
      self::ONE_YEAR => '+1 year',
      self::LIFETIME => '+100 years',
   ];

   public static function getNome($id)
   {
      if (array_key_exists($id, self::$nomes)) {
         return self::$nomes[$id];
      }
   }

   public static function getColor($id)
   {
      if (array_key_exists($id, self::$color)) {
         return self::$color[$id];
      }
   }

   public static function getColorReal($id)
   {
      if (array_key_exists($id, self::$colorReal)) {
         return self::$colorReal[$id];
      }
   }
   
   public static function getTimeModifier($id)
   {
      if (array_key_exists($id, self::$timeModifier)) {
         return self::$timeModifier[$id];
      }
   }
}
