<?php

namespace App\Http\Controllers;

use App\Models\news_post;
use Illuminate\Http\Request;

class NewsPostController extends Controller
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
        return view('admin.add_news');
    }
    public function manage_news()
    {
        $data = news_post::all();
        return view('admin.manage_news', ['news' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|max:60',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048'
        ]);
        $data = new news_post();

        $data->admin_id = 1;
        $data->heading = $request->heading;
        $data->category = $request->category;
        $data->description = $request->description;
        $file = $request->file('image');
        $filename = time() . "_img." . $request->file('image')->getClientOriginalExtension();
        $file->move('admin/upload/news/', $filename);
        $data->image = $filename;

        $data->save();
        echo "<script>
        alert('News Inserted Successfully !');
        window.location='/insert-news';
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
