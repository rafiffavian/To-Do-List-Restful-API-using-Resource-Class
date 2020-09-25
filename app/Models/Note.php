<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'date',
        'user_id',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
