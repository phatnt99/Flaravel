<?php

namespace App\Http\Controllers;

use App\FlowerCatalog;
use App\Transformers\FlowerCatalogTransformer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Collective\Html\FormFacade as Form;

class FlowerCatalogController extends Controller
{
    //
    public function index() {
        $allCatalog = FlowerCatalog::paginate(5);
        $arrCatalog = array_values(array_map(function($id) {
            return [$id['id'] => $id['name_catalog']];
        }, FlowerCatalog::all()->toArray()));

        $coll  = FlowerCatalog::all();
        $newCol = $coll->reduce(function ($result, $flow) {
           $result[$flow['id']] = $flow['name_catalog'];
           return $result;
//           return [$flow['id'] => $flow['name_catalog']];
        }, []);

        dd($newCol);
        //return view('catalog', ['catalos' => $arrCatalog, 'catalogs' => $allCatalog]);
    }

    public function update(Request $request, FlowerCatalog $flowerCatalog) {

        echo Form::open(['method' => 'PUT','route' => ['catalogs.update', 'catalog' => $flowerCatalog->id]]);
        echo Form::label('id', 'Id: ');
        echo Form::text('id', $flowerCatalog->id);
        echo "<br>";
        echo Form::label('name_catalog', 'Name: ');
        echo Form::text('name_catalog', $flowerCatalog->name_catalog);
        echo "<br>";
        echo Form::label('parent_id', 'Parent catalog id: ');
        echo Form::text('parent_id', $flowerCatalog->parent_id);
        echo "<br>";
        echo Form::submit('Update');
        echo Form::close();
    }
}
