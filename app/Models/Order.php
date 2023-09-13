<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'is_paid',
        'payment_receipt'
    ];
    public function user(){

        return $this->belongsTo(User::class);
    }
    public function transactions(){

        return $this->hasMany(Transaction::class);
    }
}