<?php

namespace App\Enums;

enum NotifcationStates:string{
    case read="Read";
    case delivered="Delivered";
    case failed="Failed";
}