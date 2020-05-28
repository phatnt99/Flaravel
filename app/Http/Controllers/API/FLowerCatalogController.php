<?php

namespace App\Http\Controllers\API;

use App\FlowerCatalog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFlowerCatalogRequest;
use Illuminate\Http\Request;

class FLowerCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $res = FlowerCatalog::all();
        return response()->json($res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateFlowerCatalogRequest $request)
    {

        $validatedData = $request->validated();
        $flowerCatalog = new FlowerCatalog();
        $flowerCatalog->fill([
            'name_catalog' => $validatedData['name_catalog'],
            'parent_id' => $validatedData['parent_id']
        ]);
        $flowerCatalog->save();

        return response()->json("store flower catalog successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
        $res = FlowerCatalog::where('id',$id)->get();
        return response()->json($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CreateFlowerCatalogRequest $request, $id)
    {
        //
        $validatedData = $request->validated();
        $res = FlowerCatalog::where('id', $id)->update([
            'name_catalog' => $validatedData['name_catalog'],
            'parent_id' => $validatedData['parent_id'],
        ]);

        return response()->json("store flower catalog successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
