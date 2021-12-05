<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "issuer",
    ];

    public function assignments() {
        return $this->belongsToMany(User::class, "assignments", "order_id", "user_id");
    }

    public function emissions() {
        return $this->belongsToMany(User::class, "emissions", "order_id", "user_id");
    }
}
