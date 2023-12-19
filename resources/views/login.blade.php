@extends('layouts.template')

@section('content')
<center>

    <div class="container">
        <div class="card w-25" style="margin-top: 200px">
            <div class="card-body">
                <form action="{{ route('authLogin') }}" method="POST">
                    @csrf
                    @if (Session::get('failed'))
                        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                    @endif
                    @if (Session::get('logout'))
                        <div class="alert alert-primary">{{ Session::get('logout') }}</div>
                    @endif
                    @if (Session::get('canAccess'))
                        <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
                    @endif
                <div class="h2 mb-4">Login</div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Kamu">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password Kamu">
                    </div>
                    <button type="submit" class="btn btn-info text-white">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>
        
</center>
@endsection