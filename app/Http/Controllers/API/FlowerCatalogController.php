<?php

namespace App\Http\Controllers\API;

use App\Models\FlowerCatalog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFlowerCatalogRequest;
use App\Http\Requests\UpdateFlowerCatalogRequest;
use App\Traits\JWTUserTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class FlowerCatalogController extends Controller
{
    use JWTUserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        return responder()->success(FlowerCatalog::all())->respond();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFlowerCatalogRequest $request)
    {
        //
        FlowerCatalog::create($request->all());
        return response('Store successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        /*use Policy:
        Only user who own this catalog can view detail
        */
        $flowerCatalog = FlowerCatalog::where('id', $id)->first();
        $user = JWTAuth::parseToken()->toUser(); //this returns the user
        if($user->can('view', $flowerCatalog)) {
            return response()->json($flowerCatalog);
        }
        else
            return response()->json('You are not allow to see this content', '403');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFlowerCatalogRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(UpdateFlowerCatalogRequest $request, $id)
    {
        // Here cannot use full Model FlowerCatalog? Not know why
        //$flowerCatalog->update($request->all());
        //dd($id);
        $res =FlowerCatalog::where('id', $id)->update($request->except(['_method', '_token']));
        return response($res);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FlowerCatalog $flowerCatalog
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(FlowerCatalog $flowerCatalog)
    {
        //
        $flowerCatalog->delete();
        return response('Delete successfully');

    }
}
