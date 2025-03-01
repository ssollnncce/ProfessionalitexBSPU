<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'start_date',
        'end_date',
        'teacher_id',
        'course_family_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function courseFamily()
    {
        return $this->belongsTo(Course_family::class, 'course_family_id');
    }
}
