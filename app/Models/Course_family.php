<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_family extends Model
{
    public function courses()
    {
        return $this->hasMany(Course::class, 'course_family_id'); // 'course_family_id' - это внешний ключ
    }
}
