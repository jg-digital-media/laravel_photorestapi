<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use App\Photo;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response(PhotoResource::collection(Photo::all(), 200));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->validate([

              //fields go here taken from model   - obtained from the model
              "name" => 'required',
              "caption" => 'required',
              "copyright" => 'required',
              "email" => 'required',
              "owner_id" => 'required'

        ]);
        
        //return response(Photo::create($data), 200);
        $photo = Photo::create($data);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo) {
        return response( new PhotoResource($photo, 200) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo) {

        $data = $request->validate([
              //fields go here as per store method
              "name" => 'required',
              "caption" => 'required',
              "copyright" => 'required',
              "email" => 'required',
              "owner_id" => 'required'

        ]);
        
        //return response on validated data
        return response($photo->update($data), 200);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo) {

        $photo->delete();
        return response(null, 204);
     }
}
