<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $foods = Food::latest()->paginate(5);
        return view('food/index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::select("*")->get();
        return view('food/create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg',
        ]);


        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $lokasiPath = public_path('image');
        $image->move($lokasiPath, $imageName);

        Food::create([
            'name' => $request->name,
            'description' => $request->deskripsi,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $imageName
        ]);

        return redirect()->route('food.index')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $foods = Food::find($id);
        return view('food/edit', compact('foods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ]);

        $food = Food::find($id);
        $imageName = $food->image;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $lokasiPath = public_path('image');
            $image->move($lokasiPath, $imageName);

            $food->name = $request->name;
            $food->description = $request->deskripsi;
            $food->price = $request->price;
            $food->category_id = $request->category;
            $food->image = $imageName;
            $food->save();

            return redirect()->route('food.index')->with('success', 'Berhasil diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('food.index')->with('success', 'Berhasil dihapus');
    }

    public function listFood()
    {
        $categories = Category::with('food')->get();

        return view('index', compact('categories'));
    }
}
