<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'question'
    ];    

    public function PollAnswer()
    {
        return $this->hasMany(PollAnswer::class);
    }    
}
