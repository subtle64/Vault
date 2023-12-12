<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'city',
        'card_holder',
        'card_number',
        'country',
        'zip'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transaction_details() {
        return $this->hasMany(TransactionDetails::class);
    }
}
