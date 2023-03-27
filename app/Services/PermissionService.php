<?php namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\Permission as Model;

class PermissionService extends AbstractService {
    
    public function paginate($filter = []): Paginator {

        return Model::query()->paginate(perPage: 10);
    }
    
    public function all($where = [], $columns = ['*']): array {
        
        [ $where, $query ] = $this->_query($where, Model::query());
         
        $query->where($where);
        
        return $query->get($columns)->all();
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