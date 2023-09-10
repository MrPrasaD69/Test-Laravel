<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable=['first_name','last_name','email_id'];
}