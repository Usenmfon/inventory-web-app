<?php

namespace App\Enums;

enum ProductStatusEnum:string {
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
