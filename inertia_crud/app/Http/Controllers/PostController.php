<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = User::all();
        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $post = new User();
        $post->name = $request->name; // $post->name es como se llama el campo en la base de datos  y $request->name es como se llama el campo en el formulario
        $post->email = $request->email;
        $post->password = $request->password;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(User $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $post)
    {
        $post = User::find($request->id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password = bcrypt($request->password);
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function estadisticas()
    {
        $posts = Post::all();
        return Inertia::render('Posts/Estadisticas', [
            'posts' => $posts
        ]);
        
    }
    
}
