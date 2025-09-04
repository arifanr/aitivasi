<?php

namespace App\Http\Controllers;

use App\Models\Service;

class DashboardController extends Controller
{
  public function index()
  {
    return view('dashboard.index');
  }

  public function service()
  {
    $services = Service::all();
    return view('service.index', compact('services'));
  }

  public function portfolio()
  {
    return view('portfolio.index');
  }

  public function blog()
  {
    return view('blog.index');
  }
}
