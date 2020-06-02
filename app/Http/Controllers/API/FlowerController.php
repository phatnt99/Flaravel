<?php

namespace App\Http\Controllers\API;

use App\Flower;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFlowerRequest;
use App\Transformers\FlowerTransformer;
use Flugg\Responder\Responder;
use App\Http\Requests\CreateFlowerRequest;
use function foo\func;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Responder $responder
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Responder $responder)
    {
        //
        $res = Flower::all();
        //return response()->json($res);
        //return $responder->success($res);
        return \responder()->success(Flower::all())->respond();
        //return \responder()->success(Flower::paginate())->respond();
        /*return responder()->success(Flower::all(), function ($flower) {
            return ['name' => $flower->name];
        })->respond();
        */

        //filter with query string
        //pass "only" in query string
        //http://flower.com:8080/api/flowers?only=id,name,color
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreateFlowerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateFlowerRequest $request)
    {
        //
        //Flower::create($request->all());
        $newFlower = new Flower;
        $newFlower->catalog_id = $request->input('catalog_id');
        $newFlower->name = $request->input('name');
        $newFlower->color = $request->input('color');
        $newFlower->price = $request->input('price');
        $newFlower->discount = $request->input('discount');
        $newFlower->image_link = $request->input('image_link');
        $newFlower->image_list = $request->input('image_list');
        $newFlower->view = $request->input('view');
        $newFlower->votes = $request->input('votes');

        $newFlower->save();

        return response()->json("store successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param Flower $flower
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Flower $flower)
    {
        //
        //return response()->json($flower);
        return responder()->success($flower)->respond();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFlowerRequest $request
     * @param Flower $flower
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFlowerRequest $request, Flower $flower)
    {
        //
        $flower->update($request->all());
        //dd($flower);
        return response()->json("store successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Flower $flower
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Flower $flower)
    {
        //
        $flower->delete();
        return response()->json("delete successfully");
    }

    public function indexWithTransformer() {

        //Include by query string
        //return response(Flower::all());
        //http://flower.com:8080/api/flowersfractal?with=flowerCatalog
        //$a = (new FlowerTransformer())->transform(Flower::all());

        $a = (new FlowerTransformer)->getCustomCollection(Flower::all());
        return \responder()->success($a)->respond();
    }
}
