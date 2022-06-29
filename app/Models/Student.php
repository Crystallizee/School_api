<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birthday',
        'birthplace',
        'gender',
        'photo',
        'generation',
        'status',
    ];
}

// $table->unsignedBigInteger('user_id');
// $table->foreign('user_id')->references('id')->on('users');
// $table->string('fullname');
// $table->date('birthday');
// $table->string('birthplace');
// $table->string('gender');
// $table->string('photo');
// $table->string('generation');
// $table->string('status');
// $table->timestamps();