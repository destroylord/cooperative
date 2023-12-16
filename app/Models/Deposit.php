<?php

namespace App\Models;

use App\Enum\TypeSavingEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deposit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'type' => TypeSavingEnum::class
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
