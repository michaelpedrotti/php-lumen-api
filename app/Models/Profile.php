<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    
    protected string $table = 'profile';

    protected $fillable = ['name'];
}