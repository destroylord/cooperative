<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_loan',
        'interest_id',
        'total_interest',
        'long_installment',
        'total_installment',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function interest() {
        return $this->belongsTo(CooperativeInterest::class, 'interest_id', 'id');
    }
}
