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

    public function issuedBy() {
        return $this->belongsTo(User::class, "issuer_id", "id");
    }

    public function assignedTo() {
        return $this->belongsTo(User::class, "assigned_id", "id");
    }
}
