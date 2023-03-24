<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller {
    
    	/**
     * 
     *
     * @return \Illuminate\Http\Response|Illuminate\Http\JsonResponse
     */
    public function index(Request $request, Response $response){
        
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Response $response){
		
	return 'create';
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Response $response) {
		
	return 'store';
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Response $response) {
		
	return 'edit';
    }	


	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response) {
		
	return 'update';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Response $response) {
        
	return 'show';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, \Illuminate\Http\JsonResponse $response) {
        
	return 'destroy';
    }	
}