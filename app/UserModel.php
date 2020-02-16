<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    
    public $fillable = ['id', 'email', 'password', 'role'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
}
