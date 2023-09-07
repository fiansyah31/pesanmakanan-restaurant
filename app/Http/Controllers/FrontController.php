<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function detailFood(string $id)
    {
        $foods = Food::find($id);
        return view('detail', compact('foods'));
    }
}
