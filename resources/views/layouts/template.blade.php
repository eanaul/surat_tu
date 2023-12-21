<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Surat</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('surat.png') }}">
    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  </head>
  <body>

    <style>
 
      .loader-wrapper {
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
background-color: #242f3f;
display: flex;
justify-content: center;
align-items: center;
}

.loader {
display: inline-block;
width: 30px;
height: 30px;
position: relative;
border: 4px solid #Fff;
animation: loader 3s infinite ease;
}

.loader-inner {
vertical-align: top;
display: inline-block;
width: 100%;
background-color: #fff;
animation: loader-inner 2s infinite ease-in;
}

@keyframes loader {
0% {
  transform: rotate(0deg);
}

25% {
  transform: rotate(180deg);
}

50% {
  transform: rotate(180deg);
}

75% {
  transform: rotate(360deg);
}

100% {
  transform: rotate(360deg);
}
}

@keyframes loader-inner {
0% {
  height: 0%;
}

25% {
  height: 0%;
}

50% {
  height: 100%;
}

75% {
  height: 100%;
}

100% {
  height: 0%;
}
}
      
  </style>

    <nav class="navbar navbar-expand-lg bg-info navbar-dark mb-5">
        <div class="container">
          <a class="navbar-brand" href="#">Kelola Surat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              @if (Auth::check())
              <a class="nav-link" href="{{ route('home') }}">Home</a>
                  @if (Auth::user()->role == 'staff')
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Data User
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('staff.home') }}">Data Staff Tata Usaha</a></li>
                      <li><a class="dropdown-item" href="{{ route('guru.home') }}">Data Guru</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Data Surat
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('klasifikasi.home') }}">Data Klasifikasi Surat</a></li>
                      <li><a class="dropdown-item" href="{{ route('surat.home') }}">Data Surat</a></li>
                    </ul>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('data') }}">Data Surat Masuk</a>
                  </li>
                  @endif
                  <a class="nav-link ms" href="{{ route('logout') }}">Logout</a>
              @endif
              <a class="nav-link disabled" aria-disabled="true"></a>
            </div>
          </div>
        </div>
      </nav>
    
    @yield('content')

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
      tinymce.init({
        selector: 'textarea#your-textarea-id',
        height: 300, // Set the height of the editor
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      });
    </script>
    

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
  
    <script>
      $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
      });
    </script>
    @stack('script')
  </body>
</html>