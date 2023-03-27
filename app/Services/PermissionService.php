<?php namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\Permission as Model;

class PermissionService extends AbstractService {
    
    public function paginate($filter = []): Paginator {

        return Model::query()->paginate(perPage: 10);
    }
    
    public function all($where = [], $columns = ['*']): array {
        
        $query = Model::query();
        
        foreach($where as $key => $val){
            
            if(is_numeric($key) && is_array($val) && count($val) == 3 && in_array($val[1], ['in', 'notIn'])){
                
                $query->{$val[1] == 'in' ? 'whereIn' : 'whereNotIn'}($val[0], $val[2]);
                                
                unset($where[$key]);   
            }
        }
        
        return $query->where($where)->get($columns)->all();
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
        
         
        return $model;
    }
    
    public function update($data = [], $id = 0): Model {
        
        $model = $this->find($id);
        $model->fill($data);
        $model->save();
        
        return $model;
    }
    
    public function delete($id = 0): Model {
        
        $model = $this->find($id);
        $model->delete();

        return $model;
    }
}