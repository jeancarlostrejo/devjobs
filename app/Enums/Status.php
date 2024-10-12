<?php 

namespace App\Enums;

enum Status: int
{
    case PUBLISHED = 1;
    case PAUSED = 2;
}