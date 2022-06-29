<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_name',
        'capacity',
        'room',
        'mark',
    ];
}

// $table->id();
// $table->unsignedBigInteger('teacher_id');
// $table->foreign('teacher_id')->references('id')->on('teachers');
// $table->string('subject_name');
// $table->integer('capacity');
// $table->string('room');
// $table->integer('mark');
// $table->timestamps();
