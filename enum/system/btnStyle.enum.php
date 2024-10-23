<?php

namespace API\enum;

class BtnStyle
{
    const carrouselIcones = 0;
    const btnSimples = 1;
    const btnSimplesIcones = 2;
    const cardVertical = 3;
    const cardHorizontal = 4;

    public static $names = [
        self::carrouselIcones => 'Carrousel de Ícones',
        self::btnSimples => 'Botão simples',
        self::cardVertical => 'Cartão vertical, em carrousel',
    ];

    public static $color = [
        self::carrouselIcones => 'secondary',
        self::btnSimples => 'info',
        self::cardVertical => 'primary'
    ];

    public static $borderText = [
        self::carrouselIcones => 'var(--border-radius)',
        self::btnSimples => 'var(--border-radius)',
        self::cardVertical => '0px',
    ];

    public static $borderIcons = [
        self::carrouselIcones => 'var(--border-radius)',
        self::btnSimples => 'var(--border-radius)',
        self::cardVertical => '0px',
    ];

    public static function getName($id)
    {
        if (array_key_exists($id, self::$names)) {
            return self::$names[$id];
        }
    }

    public static function getBorderText($id)
    {
        if (array_key_exists($id, self::$borderText)) {
            return self::$borderText[$id];
        }
    }

    public static function getBorderIcon($id)
    {
        if (array_key_exists($id, self::$borderIcons)) {
            return self::$borderIcons[$id];
        }
    }

    public static function getcolor($id)
    {
        if (array_key_exists($id, self::$color)) {
            return self::$color[$id];
        }
    }
}
