<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = "memberId";
    protected $fillable = [
		  'memberId', 'memberName', 'memberPassword', 'memberEmail', 'isAdmin', 'api_token',
	];
}
