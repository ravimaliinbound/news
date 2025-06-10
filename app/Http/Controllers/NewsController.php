<?php

namespace App\Http\Controllers;
use App\Models\news_admin;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'heading' => 'required|alpha:ascii',
            'description' => 'required',
            'price' => 'required|',
            'image' => 'required|image|max:2048'
        ]);
        $data = new news_admin();

        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $file = $request->file('image');
        $filename = time() . "_img." . $request->file('image')->getClientOriginalExtension();
        $file->move('website/upload/product/', $filename);
        $data->image = $filename;

        $data->save();
        echo "<script>
        alert('News Inserted Success !');
        window.location='/insert_news';
        </script>";
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
