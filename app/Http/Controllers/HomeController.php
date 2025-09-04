<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Blog;

class HomeController extends Controller
{
  public function index()
  {
    $services = Service::all();
    $portfolios = Portfolio::all();
    $blogs = Blog::all();
    return view('home', compact('services', 'portfolios', 'blogs'));
  }
}
