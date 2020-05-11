<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Daftar Mahasiswa</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('assets/a/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('assets/a/assets/css/scrolling-nav.css')}}" rel="stylesheet">
   @laravelPWA
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Data Mahasiswa</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Tabel Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/login">Login Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>LIST MAHASISWA</h1>
      <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About this page</h2>
          <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
          <ul>
            <li>Clickable nav links that smooth scroll to page sections</li>
            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      
                    <form method="GET" class="form-inline">
                                         <!-- Search form -->
                    <div class="active-cyan-3 active-cyan-4 mb-4">
                      <input class="form-control" type="text" aria-label="Search" placeholder="Cari Mahasiswa .." value="{{ request()->get('search') }}" name="search">
                    </div>

                    </form> 
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">nama barang</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Total</th>
                                <th scope="col">Broken</th>
                                <th scope="col">Image</th>
                                <th scope="col">Crated By</th>
                                <th scope="col">Updated By</th>
                                

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
                  
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>

                        <br/>

 
    {{ $barang ?? ''->links() }}
    </div>
  </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact us</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('assets/a/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/a/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('assets/a/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="{{asset('assets/a/assets/js/scrolling-nav.js')}}"></script>

</body>

</html>
