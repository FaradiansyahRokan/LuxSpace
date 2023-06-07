<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'telp',
        'courrier',
        'payment',
        'payment_url',
        'total_price',
        'status'

        
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
