@extends('layouts.template')

@section('content')
    <div class="container">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Staff Tata Usaha</li>
            </ol>
          </nav>

        <div class="h2">Hello,  {{ Auth::user()->name }}</div>
        <div class="h4 mb-5">Berikut adalah Data Staff Tata Usaha</div>

        <a href="{{ route('staff.tambah') }}"><button class="btn btn-info mb-3 text-white">Tambah Data</button></a>

        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($staffs as $i)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->email }}</td>
                            <td>
                                <div class="d-flex">
                                <a href="{{ route('staff.edit', $i->id) }}"><button class="btn btn-success text-white me-2">Edit</button></a>
                                <form action="{{ route('staff.delete', $i->id) }}" method="post">
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