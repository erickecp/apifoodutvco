<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
    public function postFood(Request $request){
        $product = Food::create($request->all());
        return response($product, 201);
    }


    public function searchFood(Request $request){
        $busqueda = $request->input("search");
        $products = Food::where('nombre', 'LIKE', '%'.$busqueda.'%')->get();
        return response()->json($products, 201);
    }


    public function getFoods()
    {

        $foods = Food::where('activo', '=', '1')
        ->addSelect(['categoria' => Category::select('nombre')
        ->whereColumn('category_id', 'id')])
        ->get();

        return response()->json($foods, 200);
    }

    public function deleteFood($id)
    {
        $prod = Food::find($id);
        if (is_null($prod)) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        $prod->delete();
        return response(null, 204);
    }

    public function putFood(Request $request, $id)
    {
        $prod = Food::find($id);
        if (is_null($prod)) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        $prod->update($request->all());
        return response($prod, 200);
    }

    public function getFood($id)
    {
        $prod = Food::find($id);
        if (is_null($prod)) {
            return response()->json(['message' => 'producto no encontrado'], 404);
        }
        return response()->json(Food::find($id), 200);
    }


}
