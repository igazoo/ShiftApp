<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PublishStatus extends Enum
{
    const Private = 0;
    const Public = 1;

    /**
     * @param mixed $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Private:
                return '非公開';
                brake;
            case self::Public:
                return '公開';
                brake;
            default:
                return self::getKey($value);
        }
    }

    /**
     * @param string $key
     * @return int|mixed
     */
    public static function getValue(string $key)
    {
        switch ($key) {
            case '非公開':
                return 0;
            case '公開':
                return 1;
            default:
                return self::getValue($key);
        }
    }
}
