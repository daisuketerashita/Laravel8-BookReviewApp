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

        Review::insert([
            'user_id' => \Auth::id(),
            'title' => $post['title'],
            'body' => $post['body'],
        ]);

        return redirect()->route('index');
    }
}
