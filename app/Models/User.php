<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
        
    protected $table = 'user';

    protected $fillable = ['name', 'email', 'profile_id'];

    protected $hidden = ['password'];
    
    public $timestamps = true;
}
