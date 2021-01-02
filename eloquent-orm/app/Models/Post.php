<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;

    //if you change the class name, laravel will search for a table matching class name, so in that case a protected 'table'variable 
    //have to be declared assigning value to as same as mode name, in this case 'protected $table = "posts"'
    //same also goes for primary key, if you decide to use different column as a primary key rather than 'id'  


    protected $fillable = [
        "title",
        "content",
        "is_admin"
    ];

    
}
