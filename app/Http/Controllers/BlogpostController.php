<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Blogpost::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogposts,title|max:255',
            'text' => 'required|max:255',
        ]);
        return Blogpost::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Blogpost::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:blogposts,title,' . $id . ',id|max:255',
            'text' => 'required|max:255',
        ]);
        $blogpost = Blogpost::find($id);
        $blogpost->update($request->all());
        return $blogpost;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Blogpost::destroy($id) === 0
        ? response(["status" => "failure"], 404)
        : response(["status" => "success"], 200);
    }
}
