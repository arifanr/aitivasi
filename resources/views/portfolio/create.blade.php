@extends('layouts.dashboard')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Portfolio</h4>
        <p class="card-description"> Basic form elements </p>
        <form class="forms-sample" action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama*</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Nama" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Deskripsi*</label>
            <textarea name="description" class="form-control h-auto" rows="5" id="exampleInputEmail3" placeholder="Deskripsi" required></textarea>
          </div>
          <div class="form-group">
            <label>Image*</label>
            <input type="file" name="image" class="file-upload-default" required>
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Link</label>
            <input type="text" name="link" class="form-control" id="exampleInputName1" placeholder="Link">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <a href="{{ route('portfolio.index') }}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
