<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Response;
use App\Services\UserService as Service;

class UserController extends Controller {
    
    public function index(Request $req, Response $res): Response {
        
        $paginator = Service::newInstance()->paginate();  

        return $res->setData([
            'error' => false,
            'total' => $paginator->total(),
            'rows' => $paginator->items()
        ]);
    }
    
    public function create(Request $req, Response $res): Response {
        
        return $res->setData([
            'error' => false,
            'forms' => (object)[]
        ]);
    }
    
    public function store(Request $req, Response $res): Response {
           ;
        $data = $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'profile_id' => 'required',
        ]);
               
        return $res->setData([
            'error' => false,
            'data' => Service::newInstance()->create($data)
        ]);  
    }
    
    public function edit(Request $req, Response $res): Response {
        
        return $res->setData([
            'error' => false,
            'forms' => (object)[],
            'data' => Service::newInstance()->find($req->route('id'))
        ]);
    }
    
    public function update(Request $req, Response $res): Response {
        
        $data = $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'profile_id' => 'required',
        ]);
                
        return $res->setData([
            'error' => false,
            'data' => Service::newInstance()->update($data, $req->route('id'))
        ]); 
    }
    
    public function destroy(Request $req, Response $res): Response {
        
        return $res->setData([
            'error' => false,
            'data' => Service::newInstance()->delete($req->route('id'))
        ]); 
    }
}