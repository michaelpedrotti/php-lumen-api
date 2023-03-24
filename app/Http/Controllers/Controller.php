<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Response;

class Controller extends \Laravel\Lumen\Routing\Controller {
    
    
     public function index(Request $req, Response $res): Response {
        
        return $res->setData([
            'error' => false, 
            'message' => 'index was not implemented'
        ]);
    }


    public function create(Request $req, Response $res): Response {
		
	return $res->setData([
            'error' => false, 
            'message' => 'create was not implemented'
        ]);
    }
    

    public function store(Request $req, Response $res): Response {
		
	return $res->setData([
            'error' => false, 
            'message' => 'store was not implemented'
        ]);
    }
	

    public function edit(Request $req, Response $res): Response {
		
	return $res->setData([
            'error' => false, 
            'message' => 'edit was not implemented'
        ]);
    }	


    public function update(Request $req, Response $res): Response {
		
	return $res->setData([
            'error' => false, 'message' => 
            'update was not implemented'
        ]);
    }


    public function show(Request $req, Response $res): Response {
        
	return $res->setData([
            'error' => false, 
            'message' => 'show was not implemented'
        ]);
    }

    public function destroy(Request $req, Response $res): Response {
        
	return $res->setData([
            'error' => false, 
            'message' => 'destroy was not implemented'
        ]);
    }	
}
