@extends('layouts.dashboard')

@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-end">
      <a href="{{ route('portfolio.create') }}" class="btn btn-secondary btn-rounded btn-fw">Tambah Portfolio</a>
    </div>
    <div class="row">
      @foreach ($portfolios as $portfolio)
        <div class="col-12 col-md-4">
          <div class="card overflow-hidden position-relative">
            <div class="card-body p-0">
              <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->name }}" class="img-fluid">
              <h5 class="card-title pt-2 px-2 mb-0">{{ $portfolio->name }}</h5>
              <p class="card-text px-2 pb-2">{{ $portfolio->description }}</p>
              <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-primary btn-rounded btn-fw position-absolute btn-edit">
                <i class="mdi mdi-pencil"></i>
              </a>
              <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" style="display: inline;">
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
