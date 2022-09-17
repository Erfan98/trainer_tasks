@extends('layouts.master')

@section('body')

<div class="row">
    <div class="col-4">

    </div>

    <div class="col-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{$errors->first()}}
            </ul>
        </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Mobile Number</label>
              <input name="mobile_number" type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your phone with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input  name='password' type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    <div class="col-4">

    </div>
</div>
@endsection
