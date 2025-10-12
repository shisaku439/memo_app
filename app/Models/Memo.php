<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = ['title', 'body', 'priority'];

    public function getPriorityTextAttribute()
    {
        return match ($this->priority) {
            1 => '低',
            2 => '中',
            3 => '高',
            default => '不明',
        };
    }
}
