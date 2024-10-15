<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function salary(): BelongsTo
    {
        return $this->belongsTo(Salary::class);
    }

    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class);
    }
}
