<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    use HasFactory;

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function studyPlans(): HasMany
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(
            Student::class,
            StudyPlan::class,
            'course_id', //foreign key StudyPlan ke Courses
            'id', //Primary key Student
            'id', //primary key Course
            'student_id' //foreign key StudyPlan ke Student
        )->where('study_plans.is_cancel', 0);
    }

    public function studentCount(): int
    {
        return $this->students()->count();
    }
}
