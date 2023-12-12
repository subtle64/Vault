<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'img_path',
        'name',
        'category',
        'brief',
        'description',
        'price',
    ];

    public function transaction_details() {
        return $this->hasMany(TransactionDetails::class);
    }

    public function cart_details() {
        return $this->hasMany(CartDetails::class);
    }
}
