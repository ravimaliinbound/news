<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\news_post;
use Illuminate\Http\Request;
class NewsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = news_post::all();
        return view('admin.manage_news', ['news' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_news');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $admin_id = session()->get('admin_id');

        $data = new news_post();

        $data->admin_id = $admin_id;
        $data->heading = $request->heading;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->date = date('F d, Y');
        $file = $request->file('image');
        $filename = time() . "_img." . $request->file('image')->getClientOriginalExtension();
        $file->move('admin/upload/news/', $filename);
        $data->image = $filename;

        $data->save();
        return redirect()->route('news.create')->with('success', 'News Inserted successfully !');
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
        $news = news_post::find(base64_decode($id));
        return view('admin.edit_news', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $news = news_post::find(base64_decode($id));
        $news->heading = $request->heading;
        $news->category = $request->category;
        $news->description = $request->description;

        if ($request->file('image')) {
            $filePath = 'admin/upload/news/' . $news->image;
            if (File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));
            }

            $file = $request->file('image');
            $filename = time() . "_img." . $request->file('image')->getClientOriginalExtension();
            $file->move('admin/upload/news/', $filename);
            $news->image = $filename;
        }

        $news->save();
        return redirect()->route('news.index')->with('success', 'News updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd(base64_decode($id));
        $data = news_post::find(base64_decode($id));
        $filePath = 'admin/upload/news/' . $data->image;
        if (File::exists(public_path($filePath))) {
            File::delete(public_path($filePath));
        }
        $data->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully !');
    }
}
