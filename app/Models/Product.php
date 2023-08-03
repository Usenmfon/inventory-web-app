<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductStatusEnum;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'status' => ProductStatusEnum::class
    ];
}
