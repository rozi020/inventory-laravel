<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Bernd</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Be</a>
          </div>
          <ul class="sidebar-menu">
              @if(auth()->user()->role == 'admin')
              <li class="">
                  <a class="nav-link" href="{{url('dashboard')}}"><i class="fas fa-square"></i> <span>Dashboard</span></a>
                </li>
                <li class="">
                  <a class="nav-link" href="{{ route('fakultas.index') }}"><i class="fas fa-fire"></i> <span>Fakultas</span></a>
                </li>
                <li class="">
                  <a class="nav-link" href="{{ route('jurusan.index') }}"><i class="fas fa-newspaper"></i> <span>Jurusan</span></a>
                </li>
                <li class="">
                  <a class="nav-link" href="{{ route('ruangan.index') }}"><i class="far fa-square"></i> <span>Ruangan</span></a>
                </li>
              @endif
              <li class="">
                <a class="nav-link" href="{{ route('barang.index') }}"><i class="fas fa-gift"></i> <span>Barang</span></a>
              </li>
          </ul>
        </aside>
      </div>