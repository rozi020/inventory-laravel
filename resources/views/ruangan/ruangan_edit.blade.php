@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Ruangan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('ruangan.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('ruangan.update', ['ruangan' => $ruangan->id_ruangan]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
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
                  <label for="jurusan_id" class="control-label">Jurusan</label>
                    <select class="form-control" name="jurusan_id">
                      @foreach( $jurusan as $jur)
                      <option value="{{ $jur->id_jurusan }}" {{ $jur->id_jurusan == $ruangan->jurusan_id ? 'selected="selected"' : '' }}> {{ $jur->nama_jurusan }} </option>
                      @endforeach
                    </select>
              </div>

              <div class="form-group">
                <label>Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="{{ $ruangan->nama_ruangan }}">
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