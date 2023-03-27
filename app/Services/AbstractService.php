<?php namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractService {
    
    
    /**
     * 
     * 
     */
    protected function _query($where = [], Builder $query): array {

        foreach($where as $key => $val){
            
            if(is_numeric($key) && is_array($val) && count($val) == 3 && in_array($val[1], ['in', 'notIn'])){
                
                if(!empty($val[2])){
                
                    $query->{$val[1] == 'in' ? 'whereIn' : 'whereNotIn'}($val[0], $val[2]);
                }
 
                unset($where[$key]);   
            }
        }
        
        return [$where, $query];
    }
    
    
    protected function _filter($filter = [], Builder $query): Builder {
        
        foreach($filter as $name => $value){
            
            if(is_array($value)){

                $val = current($value);
                
                switch(key($value)) {
                    
                    case 'in': $query->whereIn($name, $val); break;
                    case 'notIn': $query->whereNotIn($name, $value); break;
                } 
            }
            else {
                
                $query->where($name, '=', $value);
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
    
    static public function newInstance(): static{
        return new static();
    }
}