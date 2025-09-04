<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $portfolios = Portfolio::all();
    return view('portfolio.index', compact('portfolios'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('portfolio.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'image' => 'required',
    ]);

    $image = $request->file('image');
    $path = $image->store('portfolios', 'public');

    $portfolio = Portfolio::create([
      'name' => $request->name,
      'description' => $request->description,
      'image' => 'storage/' . $path,
    ]);
    return redirect()->route('portfolio.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request, $id)
  {
    $portfolio = Portfolio::findOrFail($id);
    if (!$portfolio) {
      return redirect()->route('portfolio.index');
    }

    return view('portfolio.edit', compact('portfolio'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $portfolio = Portfolio::findOrFail($id);

    if (!$portfolio) {
      return redirect()->route('portfolio.index');
    }

    $request->validate([
      'name' => 'required',
      'description' => 'required',
    ]);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $path = $image->store('portfolios', 'public');
      $portfolio->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => 'storage/' . $path,
      ]);
    } else {
      $portfolio->update([
        'name' => $request->name,
        'description' => $request->description,
      ]);
    }
    return redirect()->route('portfolio.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, $id)
  {
    $portfolio = Portfolio::findOrFail($id);
    if (!$portfolio) {
      return redirect()->route('portfolio.index');
    }
    $portfolio->delete();
    return redirect()->route('portfolio.index');
  }
}
