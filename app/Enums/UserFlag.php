<?php

namespace App\Enums;

use BenSampo\Enum\FlaggedEnum;

/**
 * @method static static Agent()
 * @method static static WithdrawAgent()
 * @method static static Club()
 * @method static static None()
 */
final class UserFlag extends FlaggedEnum
{
    // const Agent   = 1 << 0;
    // const WithdrawAgent   = 1 << 1;
    // const Dealer   = 1 << 2;
    // const Club   = 1 << 3;
}
