<?php namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\Profile as Model;

class UserService extends AbstractService {
    
    public function paginate($filter = []): Paginator {

        return Model::query()->paginate(perPage: 10);
    }
    
    public function find($id = 0): Model {
        
        $model = Model::query()->find($id);
        
        if(!$model){
            throw new \Exception('User was not found');
        }
        
        return $model;
    }
    
    public function create($data = []): Model {
        
        $model = new Model();
        $model->fill($data);
        $model->save();
        
        if(Arr::has($data, 'permissions')) {
            
            $service = PermissionService::newInstance();
            
            foreach($data['permissions'] as $resource => $actions){
                
                $service->create([
                    'resource' => $resource,
                    'actions' => $actions,
                    'profile_id' => $model->id
                    
                ]);
            }
        }
        
        return $model;
    }
    
    public function update($data = [], $id = 0): Model {
        
        $model = $this->find($id);
        $model->fill($data);
        $model->save();
        
        if(Arr::has($data, 'permissions')) {
            
            $service = PermissionService::newInstance();
            
            
            
        }
        
        return $model;
    }
    
    public function delete($id = 0): Model {
        
        $model = $this->find($id);
        $model->delete();

        return $model;
    }
}