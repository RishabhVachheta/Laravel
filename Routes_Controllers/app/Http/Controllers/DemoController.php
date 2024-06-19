<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    // public function index()
    // {
    //     return view("home");
    // }

    // public function create()
    // {
    //     return view("about");
    // }

    public function index()
    {
        return "This is the index method of the ProductController.";
    }

    public function show($id)
    {
        return "Showing product with ID: " . $id;
    }
}
