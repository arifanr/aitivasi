<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $services = Service::all();
    return view('service.index', compact('services'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('service.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'required',
    ]);

    $path = null;
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $path = $image->store('services', 'public');
    }

    Service::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => $path ? 'storage/' . $path : null,
    ]);
    return redirect()->route('service.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request, $id)
  {
    $service = Service::findOrFail($id);
    if (!$service) {
      return redirect()->route('service.index');
    }

    return view('service.edit', compact('service'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $service = Service::findOrFail($id);

    if (!$service) {
      return redirect()->route('service.index');
    }

    $request->validate([
      'title' => 'required',
      'description' => 'required',
    ]);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $path = $image->store('services', 'public');
      $service->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => 'storage/' . $path,
      ]);
    } else {
      $service->update([
        'title' => $request->title,
        'description' => $request->description,
      ]);
    }
    return redirect()->route('service.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, $id)
  {
    $service = Service::findOrFail($id);
    if (!$service) {
      return redirect()->route('service.index');
    }
    $service->delete();
    return redirect()->route('service.index');
  }
}
