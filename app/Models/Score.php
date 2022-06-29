<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'student_id',
        'assignment',
        'mid_test',
        'final_test',
        'attitude',
    ];
}


// $table->unsignedBigInteger('subject_id');
// $table->foreign('subject_id')->references('id')->on('subjects');
// $table->unsignedBigInteger('student_id');
// $table->foreign('student_id')->references('id')->on('students');
// $table->integer('assignment');
// $table->integer('mid_test');
// $table->integer('final_test');
// $table->enum('attitude', ['A', 'B','C','D']); 