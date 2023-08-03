<?php

namespace App\Enums;

enum ProductStatusEnum:string {
    case Pending = 'pending';
    case Aprroved = 'Aprroved';
    case Rejected = 'Rejected';
}
