<?php

namespace App\Models\constant;

class FormType
{
    const CREATE = 1;
    const UPDATE = 2;

    const TXT_CREATE = 'Register';
    const TXT_UPDATE = 'Update';

    /**
     * @return array
     */
    public static function getArray(): array
    {
        return [
            self::CREATE => self::TXT_CREATE,
            self::UPDATE => self::TXT_UPDATE
        ];
    }

    /**
     * @param int $type
     * @return string
     */
    public static function getTxt(int $type): string
    {
        $array = self::getArray();
        return array_key_exists($type, $array) ? $array[$type] : '';
    }
}
