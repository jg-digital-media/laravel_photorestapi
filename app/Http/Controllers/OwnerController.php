<?php

namespace App\Http\Controllers;

use App\Http\Resources\OwnerResource;
use App\Owner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response(OwnerResource::collection(Owner::all(), 200));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validator = Validator::make($request->toArray(), [
              //fields go here copied from create   - obtained from the model
              "name" => 'required',
              "copyright" => 'required'

        ]);
        
        return response(new OwnerResource(Owner::create($validator->validate())), 201);
       
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner) {
        return response( new OwnerResource($owner, 200) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner) {

        $data = $request->validate([
            //fields go here copied from create   - obtained from the model
            "name" => 'required',
            "copyright" => 'required'

        ]);

        $owner->update($data);

        //return response on validated data
        return response($owner->update($data), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //delete all photos from specified owner
        foreach($owner->photos as $photo) {
            $photo->delete();
        }
        $owner->delete();
        return response(null, 204);
    }
}
