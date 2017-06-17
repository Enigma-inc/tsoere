<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $quarded=['id'];
    protected $table="genres";
}
