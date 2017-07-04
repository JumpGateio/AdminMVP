<?php

namespace App\Services\Characters\Models;

use App\Models\BaseModel;
use App\Models\User;

class Character extends BaseModel
{
    protected $table = 'user_characters';

    protected $fillable = [
        'user_id',
        'name',
        'profession',
        'race',
        'gender',
        'level',
        'age',
        'deaths',
        'created_at',
    ];

    public function getImageAttribute()
    {
        return '<img src="/img/icons/'. strtolower($this->profession) .'.png" />';
    }

    public function getNameAndImageAttribute()
    {
        return $this->image .'&nbsp;'. $this->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
