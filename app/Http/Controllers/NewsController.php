<?php

namespace App\Http\Controllers;

use App\Models\news_post;

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
        $data = news_post::with('admins')->get()->sortByDesc('id');
        return view('website.index', ['news' => $data]);
    }
    public function show_news(Request $request, $id)
    {
        $data = news_post::with('admins')
            ->where('id', base64_decode($id))->first();

        $dataa = news_post::all()->sortByDesc('id')->skip(0)->take(6);

        return view('website.show_news', ['news' => $data], ['newses' => $dataa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
