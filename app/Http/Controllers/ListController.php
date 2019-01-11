<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      
        $todos = Post::where('user_id',Auth::user()->id)->get();
        
        return view ('home', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'name' => 'required'
        ]);
        Post::create($request->all());
        return redirect('/home')->with('status', 'Задание успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function show(Post $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $todos = Post::find($id);
        return view ('edit', compact('todos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            ]);
            
            Post::find($id)->fill($request->all())->save();
            return redirect('/home')->with('status', 'Задание успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('/home')->with('statusdelete', 'Задание успешно удалено');
    }
}
