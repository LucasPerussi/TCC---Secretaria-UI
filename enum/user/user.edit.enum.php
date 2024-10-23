<?php
namespace API\enum; 

class Social_networks_enum {
    const LINKEDIN= 1;
    const FACEBOOK= 2;
    const INSTAGRAM= 3;
    const TWITTER= 4;
    const GITHUB = 5; 
    const YOUTUBE =6; 
    const BEHANCE =7; 
    const DRIBBBLE=8;
    const WHATSAPP=9;
    const PDF=10; 

public static $nomes=[
self::LINKEDIN=>'LinkedIn:', 
self::FACEBOOK=>'Facebook:', 
self::INSTAGRAM=>'Instagram:', 
self::TWITTER=>'Twitter:',
self::GITHUB=>'GitHub:', 
self::YOUTUBE=>'Youtube:', 
self::BEHANCE=>'Behance:', 
self::DRIBBBLE=>'Dribbble:', 
self::WHATSAPP=>'WhatsApp:', 
self::PDF=>'PDF:',
];


public static $icones = [
    self::LINKEDIN=>'<i class="fa-brands fa-linkedin" style="color: #f0efef;"></i>', 
    self::FACEBOOK=>'<i class="fa-brands fa-facebook" style="color: #f0efef;"></i>', 
    self::INSTAGRAM=>'<i class="fa-brands fa-instagram" style="color: #f0efef;"></i>', 
    self::TWITTER=>'<i class="fa-brands fa-x-twitter" style="color: #f0efef;"></i>', 
    self::GITHUB=>'<i class="fa-brands fa-github" style="color: #f0efef;"></i>',
    self::YOUTUBE=>'<i class="fa-brands fa-youtube" style="color: #f0efef;"></i>', 
    self::BEHANCE=>'<i class="fa-brands fa-behance" style="color: #f0efef;"></i>', 
    self::DRIBBBLE=>'<i class="fa-brands fa-dribbble" style="color: #f0efef;"></i>', 
    self::WHATSAPP=>'<i class="fa-brands fa-whatsapp" style="color: #f0efef;"></i>',
    self::PDF=>'<i class="fa-regular fa-file-pdf" style="color: #f0efef;"></i>',
]; 

public static $color = [

]; 

public static function getIcone($id) {
    if (array_key_exists($id, self::$icones)) {
        return self::$icones[$id];
    }
    return "Indefinido";
}
public static function getNomes($id) {
    if (array_key_exists($id, self::$nomes)) {
        return self::$nomes[$id];
    }
    return "Indefinido";
} 

}