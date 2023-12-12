<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transaction_header_id',
        'menu_id',
        'quantity',
    ];

    public function transaction_header() {
        return $this->belongsTo(TransactionHeader::class);
    }

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
}
