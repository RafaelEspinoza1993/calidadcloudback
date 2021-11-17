<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email','password', 'birthday', 'active'
    ];
    protected $sortable = [
        'id', 'name', 'email','password', 'birthday', 'active'
    ];
}
