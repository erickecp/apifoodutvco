<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Category;
class Food extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'category_id',
        'imagen'
    ];

    public function categories()
    {
        return $this->belongsTo(category::class);
    }

    public function orders(){
        return
        $this->BelongsToMany(Order::class, 'order_user');
    }


}
