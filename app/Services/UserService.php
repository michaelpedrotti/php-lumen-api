<?php namespace App\Services;

use App\Models\User as Model;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class UserService extends AbstractService {
    
    public function paginate($args = []): Paginator {

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