<?php namespace App\Services;

abstract class AbstractService {
    
    public function paginate($args = []){}
    
    public function find($id = 0){}
    
    public function create($data = []){}
    
    public function update($data = [], $id = 0){}
    
    public function delete($id = 0){}
    
    static public function newInstance(){
        return new static();
    }
}