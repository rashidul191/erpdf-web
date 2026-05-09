<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Inactive()
 * @method static static Active()
 */
final class PageLayoutType extends Enum
{
    const OneColumn = 1;
    const TowColumn = 2;
}
