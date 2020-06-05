@extends('layouts.app')

@section('title', 'Login')
@section('body', 'class=bg-light')
@section('wrapper','class=container')

@section('content')
<div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden shadow-sm my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                @if(session('status'))
                <div class="alert alert-danger" role="alert">
                  {{ session('status') }}
                </div>
                @endif
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                <form class="user" method="post" action="{{ url('/userLogin')}}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="username" class="form-control form-control-user" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                  </div>
                  <button type="submit" class="btn btn-danger btn-user btn-block">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
@endsection
