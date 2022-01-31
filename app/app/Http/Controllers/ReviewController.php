<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('review');
    }

    public function store(Request $request)
    {
        $post = $request->all();

        //バリデーション
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('image'))
        {
            $request->file('image')->store('/public/images');
            Review::insert([
                'user_id' => \Auth::id(),
                'title' => $post['title'],
                'body' => $post['body'],
                'image' => $request->file('image')->hashName(),
            ]);
        }else{
            Review::insert([
                'user_id' => \Auth::id(),
                'title' => $post['title'],
                'body' => $post['body'],
            ]);
        }

        return redirect()->route('index');
    }
}
