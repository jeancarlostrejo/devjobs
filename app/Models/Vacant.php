<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'salary_id',
        'company',
        'last_day_apply',
        'description',
        'image',
        'user_id',
        'status'
    ];

    protected $casts = [
        'last_day_apply' => 'date',
        'status' => Status::class
    ];
}
