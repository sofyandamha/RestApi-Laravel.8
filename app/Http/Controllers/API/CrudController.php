<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Crud;
use Validator;
use App\Http\Resources\Crud as CrudResource;
   
class CrudController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Crud::all();
    
        return $this->sendResponse(CrudResource::collection($cruds), 'Cruds retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'status' => 'required',
            'posisi' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $crud = Crud::create($input);
   
        return $this->sendResponse(new CrudResource($crud), 'Crud created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crud = Crud::find($id);
  
        if (is_null($crud)) {
            return $this->sendError('Crud not found.');
        }
   
        return $this->sendResponse(new CrudResource($crud), 'Crud retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crud $crud)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'status' => 'required',
            'posisi' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $crud->status = $input['status'];
        $crud->posisi = $input['posisi'];
        $crud->save();
   
        return $this->sendResponse(new CrudResource($crud), 'Crud updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
        $crud->delete();
   
        return $this->sendResponse([], 'crud deleted successfully.');
    }
}