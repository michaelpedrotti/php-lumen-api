<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Response;
use App\Services\UserService as Service;


class UserController extends Controller {
    
    public function index(Request $req, Response $res): Response {
        
        $json = ['error' => false ];
        
        try {
            
            $paginator = Service::newInstance()->paginate();
            
            $json['total'] = $paginator->total();
            $json['rows'] = $paginator->items();
        } 
        catch (\Exception $e) {
            
            $json['message'] = $e->getMessage();
            $json['trace'] = $e->getTraceAsString();
            $json['error'] = true;
        }
        
        return $res->setData($json);
    }
    
    public function create(Request $req, Response $res): Response {
        
        return $res->setData([
            
            'error' => false,
            'forms' => (object)[]
        ]);
    }
    
    public function store(Request $req, Response $res): Response {
        
        $json = ['error' => false ];
        
        try {
            
            $json['data'] = Service::newInstance()->create($req->post());
        } 
        catch (\Exception $e) {
            
            $json['message'] = $e->getMessage();
            $json['trace'] = $e->getTraceAsString();
            $json['error'] = true;
        }
        
        return $res->setData($json);
        
    }
    
    public function edit(Request $req, Response $res): Response {
        
        return $res->setData([
            
            'error' => false,
            'forms' => (object)[],
            'data' => Service::newInstance()->find($req->route('id'))
        ]);
    }
    
    public function update(Request $req, Response $res): Response {
        
        $json = ['error' => false ];
        
        try {
            
            $json['data'] = Service::newInstance()->update($req->post(), $req->route('id'));
        } 
        catch (\Exception $e) {
            
            $json['message'] = $e->getMessage();
            $json['trace'] = $e->getTraceAsString();
            $json['error'] = true;
        }
        
        return $res->setData($json); 
    }
    
    public function destroy(Request $req, \Illuminate\Http\JsonResponse $res): \Illuminate\Http\JsonResponse {
        
        $json = ['error' => false ];
        
        try {
            
            $json['data'] = Service::newInstance()->delete($req->route('id'));
        } 
        catch (\Exception $e) {
            
            $json['message'] = $e->getMessage();
            $json['trace'] = $e->getTraceAsString();
            $json['error'] = true;
        }
        
        return $res->setData($json); 
    }
}