<?php namespace App\Services;

use Illuminate\Support\Arr;

class AuthorizationService extends AbstractService {
    
    public function hasPermission($resource = '', $action = '', $userId = 0): bool {
        
        $actions = (array)config('authz.actions');
        
        $query = "SELECT 
                COUNT(*) as total 
            FROM user 
            INNER JOIN profile ON(user.profile_id = profile.id) 
            INNER JOIN permission ON(profile.id = permission.profile_id) 
            WHERE user.id = " . $userId . " 
            AND permission.resource = '" . $resource . "' 
            AND JSON_CONTAINS(permission.actions, JSON_QUOTE('" . Arr::get($actions, $action) . "')) > 0";
                
        [$row] = app('db')->select($query);
        
        return $row->total > 0;
    }
}