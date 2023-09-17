<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'ans_id',
    ];    

    public function PollQuestion()
    {
        return $this->hasMany(PollQuestion::class);
    }    
    
}
