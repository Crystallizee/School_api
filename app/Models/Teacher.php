<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birthday',
        'birthplace',
        'gender',
        'salary',
        'photo',
        'status',

    ];
}



// $table->id('teacher_id');
// $table->unsignedBigInteger('user_id');
// $table->foreign('user_id')->references('id')->on('users');
// $table->date('birthday');
// $table->string('birthplace');
// $table->string('gender');
// $table->double('salary', 15, 8);
// $table->string('teacher_id');
// $table->string('photo');
// $table->string('status');