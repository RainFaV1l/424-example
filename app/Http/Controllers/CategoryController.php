<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function __construct() {
    //     if(!auth()->user() || auth()->user()->role_id !== 3) {
    //         abort(403);
    //     }
    // }

    public function index() {
        return view('pages.category');
    }
}
