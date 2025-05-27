<?php

namespace App\Models;


use IronFlow\Database\Traits\HasFactory;
use IronFlow\Database\Traits\HasForm;
use IronFlow\Database\Model;

class User extends Model
{
    use HasFactory;
    use HasForm;
    protected $table = 'users';

    protected $fillable = [
      'name',
      'email',
      'password'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}