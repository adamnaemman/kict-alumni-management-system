<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'new_full_name',
        'file_path',
        'profile_data',
        'status',
        'rejection_reason',
    ];

    protected $casts = [
        'profile_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
