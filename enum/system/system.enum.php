<?php
namespace API\enum; 

class Informations {
   const PENDENTE = 1; 
   const AGUARDANDO_WETALK = 2; 
   const ACEITO_EM_ANDAMENTO = 3; 
   const CONCLUIDO = 4; 
   const AGUARDANDO_NOVA_PROPOSTA = 5; 
   const RECUSADO = 9;  

   public static $nomes =[
       self::PENDENTE => 'Pendente(Parceiro)', 
       self::AGUARDANDO_WETALK => 'Aguardando Wetalk', 
       self::ACEITO_EM_ANDAMENTO => 'Aceito / Em Andamento', 
       self::CONCLUIDO => 'Concluído', 
       self::AGUARDANDO_NOVA_PROPOSTA => 'Aguardando Nova Proposta', 
       self::RECUSADO => 'recusado',
   ]; 
   
   public static $color = [
      self::PENDENTE=>'warning', 
      self::AGUARDANDO_WETALK=>'info', 
      self::ACEITO_EM_ANDAMENTO=>'success', 
      self::CONCLUIDO=>'success', 
      self::AGUARDANDO_NOVA_PROPOSTA=>'primary', 
      self::RECUSADO =>'danger',
   ];
    
   public static $colorReal = [
      self::PENDENTE=>'#ff7500', 
      self::AGUARDANDO_WETALK=>'#00BBD3', 
      self::ACEITO_EM_ANDAMENTO=>'#D0D128', 
      self::CONCLUIDO=>'#D0D128', 
      self::AGUARDANDO_NOVA_PROPOSTA=>'#8B1ED4', 
      self::RECUSADO =>'#001011',
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