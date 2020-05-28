<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flower;
use App\FlowerCatalog;

class FlowerController extends Controller
{
    //
    public function index(Request $req) {
        $name = $req->input('name');
        $color = $req->input('color');
        $catalogName = $req->input('catalog');
        $price =  $req->input('price');
        $orderBy = $req->input('orderby');
        $month = $req->input('month');
        //
        $res = Flower::when($name, function($query) use ($name) {
            return $query->where('name','LIKE', '%'.$name.'%');
        })
        ->when($color, function($query) use ($color) {
            return $query->where('color','LIKE', '%'.$color.'%');
        })
        ->when($catalogName, function($query) use ($catalogName) {
            return $query->whereHas('flower_catalogs', function($query) use ($catalogName) {
                $query->where('name_catalog',$catalogName);
            });
        })
        ->when($price, function($query) use ($price) {
            return $query->whereRaw('price > ?', [$price]);
        })
        ->when($month, function($query) use ($month) {
            return $query->whereRaw("MONTH(created_at) = ?", [$month]);
        })
        ->when($orderBy, function($query) use ($orderBy) {
            return $query->orderBy($orderBy, 'asc');
        })
        ->get();

        return response()->json($res);
    }


    public function getTableView() {
        $flowers = Flower::paginate(2);
        return view('flowers', ['flowers' => $flowers]);
        //return response()->json($flowers);
    }
    //


}
