<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id'); // 'teacher_id' - это внешний ключ
    }
}

