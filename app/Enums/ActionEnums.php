<?php 

namespace App\Enums;

enum ActionEnums:int{
    case Pending=0;
    case Reject=3;
    case Approved=1;
    case Canceled=2;
    case Completed=5;

}