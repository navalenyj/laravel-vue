<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        $posts_result = [];
        foreach ($posts as $post) {
            $posts_result[] = [
                'id' => $post->id,
                'name' => $post->name,
                'body' => $post->body,
                'price' => $post->price,
                'images' => $post->images()->first(),
            ];
        }
        return response()->json($posts_result, 201);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'body' => 'required|max:1000',
            'price' => 'required|integer',
            'image_main' => 'required'

        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }

        $post = Post::create([
            'name' => $request->name,
            'body' => $request->body,
            'price' => $request->price
        ]);

        PostImage::create([
            'post_id' => $post->id,
            'image' => $request->image_main
        ]);

        if (!is_null($request->image_middle)) {
            PostImage::create([
                'post_id' => $post->id,
                'image' => $request->image_middle
            ]);
        }

        if (!is_null($request->image_last)) {
            PostImage::create([
                'post_id' => $post->id,
                'image' => $request->image_last
            ]);
        }


        return [
            "status" => true,
            "post" => $post->id
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }

        return response()->json([
            'name' => $post->name,
            'body' => $post->body,
            'price' => $post->price,
            'images' => $post->images()->get()
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
