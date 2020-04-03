@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('jurusan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{route('jurusan.create')}}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Fakultas</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php $no = 1; ?>
               @forelse($jurusan as $jurusan)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $jurusan->fakultas->name }}</td>
                  <td>{{ $jurusan->nama_jurusan }}</td>
                  <td>
                    <form action="{{ route('jurusan.destroy', $jurusan->id_jurusan) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('jurusan.edit', $jurusan->id_jurusan) }}"><i class="fas fa-pen"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger delete color" onclick="return confirm('Are you sure to delete this data ?');"><i class="fas fa-trash"></i></button>
                        </div>
                    </form>
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()