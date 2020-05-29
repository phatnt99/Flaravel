<?php

namespace App\Http\Controllers\API;

use App\FlowerCatalog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFlowerCatalogRequest;
use App\Http\Requests\UpdateFlowerCatalogRequest;
use App\Transformers\FlowerCatalogTransformer;
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
        return responder()->success(FlowerCatalog::all(), FlowerCatalogTransformer::class)
            ->with('flowers')->respond();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UpdateFlowerCatalogRequest $request)
    {

        $flowerCatalog = new FlowerCatalog();
        $flowerCatalog->fill([
            'name_catalog' => $request->input['name_catalog'],
            'parent_id' => $request->input['parent_id']
        ]);
        $flowerCatalog->save();

        return response()->json("store flower catalog successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param FlowerCatalog $flowerCatalog
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(FlowerCatalog $flowerCatalog)
    {
        //
        return responder()->success($flowerCatalog)->respond();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CreateFlowerCatalogRequest $request, FlowerCatalog $flowerCatalog)
    {
        //
        $flowerCatalog->update([
            'name_catalog' => $request->input['name_catalog'],
            'parent_id' => $request->input['parent_id'],
        ]);

        return response()->json("store flower catalog successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(FlowerCatalog $flowerCatalog)
    {
        //
        $flowerCatalog->delete();
        return response()->json("delete successfully");

    }
}
