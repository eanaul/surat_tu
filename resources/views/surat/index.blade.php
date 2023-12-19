@extends('layouts.template')

@section('content')
    <div class="container">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Surat</li>
            </ol>
          </nav>

        <div class="h2">Hello,  {{ Auth::user()->name }}</div>
        <div class="h4 mb-5">Berikut adalah Data Surat</div>

        <div class=" d-flex">
            <a href="{{ route('surat.create') }}"><button class="btn btn-info mb-3 text-white me-2">Tambah Data</button></a>
            <a href="{{ route('staff.tambah') }}"><button class="btn btn-secondary mb-3 text-white">Eksport Excel</button></a>
        </div>
        

        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Perihal</th>
                            <th>Tanggal Keluar</th>
                            <th>Penerima Surat</th>
                            <th>Notulis</th>
                            <th>Hasil Rapat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($letters as $i)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $i->letter_type_id }}</td>
                            <td>{{ $i->letter_perihal }}</td>
                            <td>{{ $i->created_at }}</td>
                            <td>{{ $i->recipients }}</td>
                            <td>{{ $i->notulis }}</td>
                            <td>?</td>
                            <td>
                                <div class="d-flex">
                                <a href="{{ route('klasifikasi.edit', $i->id) }}"><button class="btn btn-success text-white me-2">Edit</button></a>
                                <form action="{{ route('klasifikasi.delete', $i->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white">Hapus</button>
                                </form>     
                                </div>                           
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

    </div>
@endsection