<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;
    protected $primaryKey = "recpieId";
    protected $fillable = ['recpieId', 'recipeName', 'recpieclass', 'memberName', 'ingredients', 'step','recpieimage'];
}
