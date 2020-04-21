@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang <small>Add Data</small></h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('barang.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                  
                </div>
                @endif

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="nama_barang" class="form-control">
              </div>
              <div class="form-group">
                    <label for="ruangan_id" class="control-label">Ruangan</label>
                    <select class="form-control" name="ruangan_id">
                        @foreach($data as $ruang)
                          <option value="{{ $ruang->id_ruangan }}">{{ $ruang->nama_ruangan }}</option>
                        @endforeach
                    </select>
              </div>

              <div class="form-group">
                <label>Total</label>
                <input type="text" name="total" class="form-control">
              </div>
              <div class="form-group">
                <label>Broken</label>
                <input type="text" name="broken" class="form-control">
              </div>

              <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input id="file-upload" type="file" name="image">
                              <label class="custom-file-label" label for="file-upload" id="file-drag">Choose file</label>
                            </div>
                          </div>

               <div class="form-group">
                  <input type="hidden" name="created_by" value="{{auth()->user()->id_user}}" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()