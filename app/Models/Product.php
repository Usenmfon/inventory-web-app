<?php

namespace App\Models;

use App\Enums\ProductSoldEnum;
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
        'status',
        'sold',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'status' => ProductStatusEnum::class,
        'sold' => ProductSoldEnum::class,
    ];
}
