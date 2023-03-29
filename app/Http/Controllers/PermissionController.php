<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Response;
use App\Services\PermissionService as Service;

class PermissionController extends Controller {
    
    public function index(Request $req, Response $res): Response {
        
        $filter = $req->query();
        $filter['profile_id'] = $req->route('profile_id');
                
        $paginator = Service::newInstance()->paginate($filter);  

        return $res->setData([
            'error' => false,
            'total' => $paginator->total(),
            'rows' => $paginator->items()
        ]);
    }
    
    public function create(Request $req, Response $res): Response {
        
        return $res->setData([
            'error' => false,
            'forms' => (object)[
                'actions' => (array)config('authz.actions')
            ]
        ]);
    }
    
    public function store(Request $req, Response $res): Response {

        $data = $this->validate($req, [
            'resource' => 'required',
            'actions' => 'required',
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
            'forms' => (object)[
                'actions' => (array)config('authz.actions')
            ],
            'data' => Service::newInstance()->find($req->route('id'), $req->route('profile_id'))
        ]);
    }
    
    public function update(Request $req, Response $res): Response {
        
        $data = $this->validate($req, [
            'resource' => 'required',
            'actions' => 'required',
        ]);
                
        return $res->setData([
            'error' => false,
            'data' => Service::newInstance()->update($data, $req->route('id'), $req->route('profile_id'))
        ]); 
    }
    
    public function destroy(Request $req, Response $res): Response {
        
        return $res->setData([
            'error' => false,
            'data' => Service::newInstance()->delete($req->route('id'), $req->route('profile_id'))
        ]); 
    }
}