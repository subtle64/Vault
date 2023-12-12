<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'menu_id',
        'cart_header_id',
        'quantity',
    ];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function cart_header() {
        return $this->belongsTo(CartHeader::class);
    }
}
