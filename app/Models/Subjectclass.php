<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjectclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
    ];
}


// $table->unsignedBigInteger('subject_id');
// $table->foreign('subject_id')->references('id')->on('subjects');
// $table->unsignedBigInteger('student_id');
// $table->foreign('student_id')->references('id')->on('students');
// $table->timestamps();