@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
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
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
           @if(auth()->user()->role == 'admin')
          <div class="card-header">
            <a href="{{route('barang.create')}}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          @endif

          <form action="/exportbarang" method="get">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-file-excel"></i> &nbsp; Export Excel
              </button>
          </form>

          
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">nama barang</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Total</th>
                  <th scope="col">Broken</th>
                  <th scope="col">Image</th>
                  <th scope="col">Crated By</th>
                  <th scope="col">Updated By</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php $no = 1; ?>
               @forelse($barang as $bar)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $bar->nama_barang }}</td>
                  <td>{{ $bar->ruangan->nama_ruangan }}</td>
                  <td>{{ $bar->total }}</td>
                  <td>{{ $bar->broken }}</td>
                  <td> <img src="{{ url('image/'.$bar->image) }}" width="40px"> </td>


                   <td>@foreach($user as $u)
                        @if($u->id_user == $bar->created_by)
                          {{ $u->name }}
                        @endif
                      @endforeach
                  </td>
                  <td>@foreach($user as $u)
                        @if($u->id_user == $bar->updated_by)
                          {{ $u->name }}
                        @endif
                      @endforeach
                  </td>
                  <td>

                    <form action="{{ route('barang.destroy', $bar->id_barang) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('barang.edit', $bar->id_barang) }}"><i class="fas fa-pen"></i></a>
                            @csrf
                            @method('DELETE')
                            @if(auth()->user()->role == 'admin')
                            <button type="submit" class="btn btn-sm btn-danger delete color" onclick="return confirm('Are you sure to delete this data ?');"><i class="fas fa-trash"></i></button>
                            @endif
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
            {!! $barang->links() !!}
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