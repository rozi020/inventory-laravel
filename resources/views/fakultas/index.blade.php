@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
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
            <a href="{{ route('fakultas.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
              <button type="button" class="btn btn-primary">Add New</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Import Data</button>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
               @forelse($fakultas as $f)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $f->name }}</td>
                  <td>
                    <form action="{{ route('fakultas.destroy', $f->id) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('fakultas.edit', $f->id) }}"><i class="fas fa-pen"></i></a>
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
      {{ $fakultas->links() }}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>

            

          </div>
        </div>
      </div>  
  </div>

</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="{{ url('/importfakultas') }}" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
{{ csrf_field() }}
        
        <div class="form-group">
                <label>Import Data</label>
                      <div class="custom-file">
                        <input id="file-upload" type="file" name="file">
                       <label class="custom-file-label" label for="file-upload" id="file-drag">Choose file</label>
                      </div>
                 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection()