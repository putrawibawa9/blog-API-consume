<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FetchBlogController extends Controller
{
    public function fetchData()
    {
        // Making a GET request to another URL
        $response = Http::get('localhost:8000/api/blogs');

        // Handling the response
        if ($response->successful()) {
            $data = $response->json(); // Assuming the response is in JSON format
            return view('blogs.index', ['data' => $data['data']['data']]);
        } else {
            // Handle the error
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function store(){
        // store to my own API
        Http::post('localhost:8000/api/blogs', [
            'title' => request('title'),
            'desc' => request('desc'),
            'author' => request('author'),
            'date' => request('date'),
        ]);
        return redirect('/blogs');
    }

    public function addBlog()
    {
        return view('blogs.add');
    }

    public function editBlog($id){
        // Making a GET request to another URL
        $response = Http::get('localhost:8000/api/blogs/'.$id);

        // Handling the response
        if ($response->successful()) {
            $data = $response->json(); // Assuming the response is in JSON format
            return view('blogs.view', ['data' => $data['data']]);
        } else {
            // Handle the error
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function updateBlog(){
        // store to my own API
        Http::put('localhost:8000/api/blogs/'.request('id'), [
            'title' => request('title'),
            'desc' => request('desc'),
            'author' => request('author'),
            'date' => request('date'),
        ]);
        return redirect('/blogs');
    }

    public function deleteBlog($id)
    {
        // Making a DELETE request to another URL
        $response = Http::delete('localhost:8000/api/blogs/' . $id);

        // Handling the response
        if ($response->successful()) {
            return redirect('/blogs')->with('success', 'Blog deleted successfully');
        } else {
            // Handle the error
            return response()->json(['error' => 'Failed to delete blog'], $response->status());
        }
    }
}
