@extends('layouts.dashboard')

@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-end">
      <a href="{{ route('service.create') }}" class="btn btn-secondary btn-rounded btn-fw">Add Service</a>
    </div>
    <div class="row">
      @foreach ($services as $service)
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body position-relative pe-5">
              <h5 class="card-title">{{ $service->title }}</h5>
              <p class="card-text">{{ $service->description }}</p>
              <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary btn-rounded btn-fw position-absolute btn-edit">
                <i class="mdi mdi-pencil"></i>
              </a>
              <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-rounded btn-fw position-absolute top-0 right-0 btn-delete">
                  <i class="mdi mdi-delete"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
