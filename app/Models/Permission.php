<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
    
    protected $table = 'permission';

    protected $fillable = ['profile_id', 'resource', 'actions'];
    
    protected $casts = [
        'actions' => 'array'
    ];
    
    public $timestamps = false;
}