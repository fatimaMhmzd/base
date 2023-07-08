<?php

namespace Modules\Ticket\Http\Enums;

use App\Http\Enums\EnumToArray;

enum statusEnum : int
{
    use EnumToArray;

    case Unread = 1;
    case Read = 2;
    case Replied = 3;

}
