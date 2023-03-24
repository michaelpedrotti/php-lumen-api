<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
    
    protected string $table = 'permission';

    protected $fillable = ['profile_id', 'resource', 'actions'];
}