<?php namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractService {
    
    protected function _filter($filter = [], Builder $query): Builder {
        
        foreach($filter as $name => $value){
            
            if(is_array($value)){
                
                [$oper, $val] = $value;
                
                switch($oper) {
                    
                    case 'in': $query->whereIn($name, $val); break;
                    case 'notIn': $query->whereNotIn($column, $values); break;
                } 
            }
            else {
                
                $query->where($name, null, $value);
            }
            
        }
        
        return $query;
    }
    
    public function paginate($filter = []){}
    
    public  function all($filter = []){}

    public function find($id = 0){}
    
    public function create($data = []){}
    
    public function update($data = [], $id = 0){}
    
    public function delete($id = 0){}
    
    static public function newInstance(){
        return new static();
    }
}