<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    // Table Name
    protected $table = 'category';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
