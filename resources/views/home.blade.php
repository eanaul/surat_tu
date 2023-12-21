@extends('layouts.template')

@section('content')
    <div class="container">

      @if (Session::get('cannotAccess'))
      <div class="alert alert-danger">{{ Session::get('cannotAccess') }}</div>
      @endif
      @if (Session::get('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home ></li>
            </ol>
          </nav>


        <div class="h1 mb-3">Selamat Datang, {{ Auth::user()->name }} !</div>
        <div class="h2">Ini Halaman Home.</div>
        
        @if (Auth::check())
        @if (Auth::user()->role == 'staff')
        <center>
        <div class="row" style="margin-top: 200px">
            <div class="col-md-3">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title mb-3">{{ $datasur }}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">Surat Keluar</h6>
                    </div>
                  </div>
            </div>
            <div class="col-md-3" style="margin-left: 100px">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title mb-3">{{ $surat }}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">Klasifikasi Surat</h6>
                    </div>
                  </div>
            </div>
          </div>

            <div class="row" style="margin-top:20px">
            <div class="col-md-3">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title mb-3">{{ $staff }}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">Staff yang Terdaftar</h6>
                    </div>
                  </div>
            </div>
            <div class="col-md-3" style="margin-left: 100px">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title mb-3">{{ $guru }}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">Guru yang Terdaftar</h6>
                    </div>
                  </div>
            </div>
        </div>
        @else
        <div class="row" style="margin-top: 200px">
          <div class="col-md-3">
              <div class="card" style="width: 25rem;">
                  <div class="card-body">
                    <h5 class="card-title mb-3">{{ $letter }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Surat Masuk</h6>
                  </div>
                </div>
          </div>
        </div>
        @endif
        @endif

    </div>
@endsection