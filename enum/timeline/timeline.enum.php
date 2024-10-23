<?php 
namespace API\enum;

// INFELIZMENTE PRECISA ATUALIZAR SEMPRE EM JS - ACCOUNT HISTORY

class Timeline_enum{
  const TICKET_OPEN = 1;
  const TICKET_CLOSE = 3; 
  const NEW_COMMENT = 32;
  const ACCESS_ALERT = 6; 
  const CONFIGS_USER = 9; 
  const CHANGE_PASSWORD = 5; 
  const PROCEDURE = 7;
  const PROCEDURE_2 = 8; 
  const PROGRESS = 10; 
  const INTERNAL_OS_CREATE = 30;
  const INTERNAL_OS_STATUS = 31;
  const INTERNAL_OS_ALLOCATION = 32;
  const INTERNAL_OS_CHANGES = 33;
  const INTERNAL_OS_GALERY= 34;
  const INTERNAL_OS_EXCLUSION = 39; 
  const OS_ATTRIBUTE = 21; 
  const USER_CHANGE = 66 ; 
  const OS_PARTENER = 78;
  const PRODUCT = 79;
  const MESSAGE_ERROR = 81; 
  const MOVE_ATTRIBUTE = 83;
  const COMPANY = 85;

  public static $colorReal = [
    self::TICKET_OPEN=>'#3CB371',
    self::TICKET_CLOSE=>'#808080', 
    self::CHANGE_PASSWORD=>'#20B2AA', 
    self::ACCESS_ALERT=>'#1E90FF', 
    self::CONFIGS_USER=>'#FF8C00', 
    self::PROCEDURE=>'#FF8C00', 
    self::PROCEDURE_2 =>'#FF8C00',
    self::PROGRESS=>'#FF8C00', 
    self::INTERNAL_OS_CREATE => '#3CB371',
    self::INTERNAL_OS_STATUS => '#808080',
    self::INTERNAL_OS_ALLOCATION => '#20B2AA',
    self::INTERNAL_OS_CHANGES => '#1E90FF',
    self::INTERNAL_OS_GALERY => '#ff0000',
    self::INTERNAL_OS_EXCLUSION => '#FF8C00',
    self::NEW_COMMENT=>'#1E90ff', 
    self::OS_ATTRIBUTE=>'#4682B4',
    self::USER_CHANGE =>'#3CB371',
    self::OS_PARTENER =>'#A020F0', 
    self::PRODUCT =>'#FFD700', 
    self::MESSAGE_ERROR=>'#ff0000', 
    self::MOVE_ATTRIBUTE=>'#3CB371', 
    self::COMPANY=>'#FFD700', 
  ]; 

  public static $badgeText = [
    self::TICKET_OPEN=>'settings.card_historico.aberto',
    self::TICKET_CLOSE=>'settings.card_historico.fechado', 
    self::CHANGE_PASSWORD=>'settings.card_historico.senha', 
    self::ACCESS_ALERT=>'settings.card_historico.alerta', 
    self::CONFIGS_USER=>'settings.card_historico.usuario', 
    self::PROCEDURE=>'settings.card_historico.proc', 
    self::PROCEDURE_2=>'settings.card_historico.proc',
    self::PROGRESS=>'settings.card_historico.proc', 
    self::INTERNAL_OS_CREATE  =>'timelines.os_internal.definida',
    self::INTERNAL_OS_STATUS =>'timelines.os_internal.att',
    self::INTERNAL_OS_ALLOCATION =>'timelines.os_internal.modific',
    self::INTERNAL_OS_CHANGES =>'timelines.os_internal.modific',
    self::INTERNAL_OS_GALERY=>'timelines.os_internal.definida',
    self::INTERNAL_OS_EXCLUSION =>'timelines.os_internal.cancelada', 
    self::NEW_COMMENT=>'timelines.user_message.atualizado', 
    self::OS_ATTRIBUTE=>'timelines.os_internal.modific',
    self::USER_CHANGE =>'timelines.user_message.alteração',
    self::OS_PARTENER =>'timelines.os_internal.definida', 
    self::PRODUCT =>'timelines.user_message.produto',
    self::MESSAGE_ERROR =>'timelines.user_message.erro', 
    self::MOVE_ATTRIBUTE =>'timelines.user_message.atualizado',
    self::COMPANY =>'News'
  ]; 

  public static $button = [
    self::CHANGE_PASSWORD=>'settings.card_historico.alterar',
    self::ACCESS_ALERT=>'settings.card_historico.gerenciar', 
    self::PROCEDURE=>'settings.card_historico.master', 
    self::PROCEDURE_2=>'settings.card_historico.admin',
    self::TICKET_OPEN=>'', 
    self::TICKET_CLOSE=>'',
    self::CONFIGS_USER=>'',
    self::PROGRESS=>'',
  ]; 

  public static $invisible = [
    self::TICKET_OPEN=>'hidden', 
    self::TICKET_CLOSE=>'hidden',
    self::CONFIGS_USER=>'hidden',
    self::PROGRESS=>'hidden', 
    self::CHANGE_PASSWORD=>'',
    self::ACCESS_ALERT=>'', 
    self::PROCEDURE=>'', 
    self::PROCEDURE_2=>'', 
    self::PROGRESS=> 'hidden',
    self::INTERNAL_OS_CREATE=>'hidden',
    self::INTERNAL_OS_STATUS=>'hidden',
    self::INTERNAL_OS_ALLOCATION=>'hidden',
    self::INTERNAL_OS_CHANGES=>'hidden',
    self::INTERNAL_OS_GALERY=>'hidden',
    self::INTERNAL_OS_EXCLUSION=> 'hidden', 
    self::NEW_COMMENT=>'hidden', 
    self::OS_ATTRIBUTE=>'hidden',
    self::USER_CHANGE =>'hidden',
    self::OS_PARTENER =>'hidden', 
    self::MOVE_ATTRIBUTE =>'hidden',
    self::COMPANY =>'hidden'
  ];


  public static $buttonColor = [
    self::CHANGE_PASSWORD=>'#808080',
    self::ACCESS_ALERT=>'#808080', 
    self::PROCEDURE=>'#FF8C00', 
    self::PROCEDURE_2=>'#FF8C00',
  ];

   public static function getColorReal($id){
    if(array_key_exists($id, self::$colorReal)){
       return self::$colorReal[$id];
    } 
    return '#1E90FF';
  }   

   public static function getBadgeText($id){
    if(array_key_exists($id, self::$badgeText)){
       return __(self::$badgeText[$id]);
    }  
    return 'Andamento';
  } 
   public static function getButton($id){
    if(array_key_exists($id, self::$button)){
       return __(self::$button[$id]);
    } 
  } 
   public static function getButtonColor($id){
    if(array_key_exists($id, self::$buttonColor)){
       return (self::$buttonColor[$id]);
    } 
    return '#1E90FF';
  } 
   public static function getInvisible($id){
    if(array_key_exists($id, self::$invisible)){
       return (self::$invisible[$id]);
    } 
    return 'hidden';
  } 

}