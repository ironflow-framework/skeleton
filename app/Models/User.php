<?php

namespace App\Models;


use IronFlow\Database\Traits\HasFactory;
use IronFlow\Database\Traits\HasForm;
use IronFlow\Database\Model;

class User extends Model
{
    use HasFactory;
    use HasForm;
    
    protected static string $table = 'users';

    protected array $fillable = [
      'name',
      'email',
      'password'
    ];

    protected array $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}