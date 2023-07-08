<?php

namespace Modules\Ticket\Http\Enums;

use App\Http\Enums\EnumToArray;

enum priorityEnum :int
{
    use EnumToArray;

    case low = 1;
    case medium = 2;
    case high = 3;
    case emergency = 4;
}
