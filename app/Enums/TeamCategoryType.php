<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Inactive()
 * @method static static Active()
 */
final class  TeamCategoryType extends Enum
{
    const Directors =   0;
    const Investors =   1;
}
