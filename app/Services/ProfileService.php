<?php namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\Profile as Model;

class ProfileService extends AbstractService {
    
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
            
            $deleted = $service->all([
                    ['profile_id', $model->id],
                    ['resource', 'notIn', array_keys($data['permissions']) ]
                ], 
                ['id']
            );
                           
            if(!empty($deleted)){
                
                foreach($deleted as $row){
                    
                    $service->delete($row['id']);
                }
            }
            
            $saved = array_column($service->all([
                    ['profile_id', $model->profile_id],
                    ['resource', 'in', array_keys($data['permissions'])]
                ], 
                ['resource', 'id']
            ), 'id', 'resource');
            
            foreach($data['permissions'] as $resource => $actions) {
                
                if(Arr::has($saved, $resource)){
                     
                    $id = $saved[$resource];
                     
                    $service->update(['actions' => $actions], $id);  
                 }
                 else {
                     
                    $service->create([
                        'resource' => $resource,
                        'actions' => $actions,
                        'profile_id' => $model->id  
                    ]); 
                }
            }      
        }
        
        return $model;
    }
    
    public function delete($id = 0): Model {
        
        $model = $this->find($id);
        $model->delete();

        return $model;
    }
}