<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;
use App\Http\Resources\ImageUploadResource;
class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('upload')->with('images', ImageUploadResource::collection(ImageUpload::orderBy('id', 'DESC')->paginate(3)));
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
    public function store(Request $request)
    {
        $response = cloudinary()->upload($request->file('file')->getRealPath());
        $orm = new ImageUpload();
        $orm->file_url = $response->getSecurePath();
        $orm->file_name = $response->getFileName();
        $orm->file_type = $response->getFileType();
        $orm->size = $response->getReadableSize();
        $orm->save();
        return back();       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ImageUpload $image)
    {
        //
        $url_image = $image->file_url;
        return view('show', compact('url_image'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageUpload $image)
    {
        //
        $image->delete();
        return back();
    }
}
