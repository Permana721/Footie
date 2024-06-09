<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = [
        'sku',
        'nama_product',
        'link',
        'category',
        'tipe',
        'alamat_penjual',
        'halal',
        'harga',
        'discount',
        'foto',
        'is_active',
    ];

    public function likes()
{
    return $this->hasMany(Like::class);
}

public function likedBy($user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}

}
