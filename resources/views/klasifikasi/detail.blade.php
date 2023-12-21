@extends('layouts.template')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('klasifikasi.home') }}">Klasifikasi Surat</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Klasifikasi</li>
            </ol>
          </nav>

          <div class="h4 mb-5">Berikut adalah Detail dari Klasifikasi Surat</div>

          <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Surat</th>
                        <th>Klasifikasi</th>
                        <th>Perihal</th>
                        <th>Peserta</th>
                        <th>Waktu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($letters as $i)
                    <tr>
                        <td>{{ $i->letterType->letter_code }}</td>
                        <td>{{ $i->letterType->name_type }}</td>
                        <td>{{ $i->letter_perihal }}</td>
                        <td>{{ implode(', ', array_column($i->recipients, 'name')) }}</td>
                        <td>{{ $i->created_at->format('d/m/Y') }}</td>
                        <td><a href="{{ route('surat.print', $i->id) }}"><button class="btn btn-primary text-white me-2">.pdf</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
          </table>
    </div>
@endsection