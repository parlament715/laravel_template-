<?php

namespace App\Enums;

enum TableType: int
{
    case REGULAR = 0;
    case VIP = 1;
    case PREMIUM = 2;
}
