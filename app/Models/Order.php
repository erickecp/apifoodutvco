<?php

namespace App\Models;
use App\Models\User;
use App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
    use HasFactory;
    protected $fillable = [
        'estado',
        'total',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function foods(){
        return
        $this->BelongsToMany(Food::class, 'order_user');
    }
}
