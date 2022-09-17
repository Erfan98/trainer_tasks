@extends('layouts.master')
@section('body')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form action="/register" method="POST">
                @csrf

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" id="firstName" class="form-control form-control-lg" name="first_name" />
                      <label class="form-label" for="firstName">First Name</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" id="lastName" class="form-control form-control-lg" name="last_name" />
                      <label class="form-label" for="lastName">Last Name</label>
                    </div>

                  </div>
                </div>
                <div class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" id="birthdayDate" name="org" />
                    <label for="birthdayDate" class="form-label">Name of Organization</label>
                  </div>
                {{-- <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">



                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker w-100">
                        <input type="text" class="form-control form-control-lg" id="birthdayDate" />
                        <label for="birthdayDate" class="form-label">Street</label>
                      </div>


                  </div>
                </div> --}}

                <div class="row">
                    <div class="col-md-6 mb-4 d-flex align-items-center">

                      <div class="form-outline datepicker w-100">
                        <input type="text" class="form-control form-control-lg" id="birthdayDate"  name="street"/>
                        <label for="birthdayDate" class="form-label">Street</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline datepicker w-100">
                          <input type="text" class="form-control form-control-lg" id="birthdayDate" name="city" />
                          <label for="birthdayDate" class="form-label">City</label>
                        </div>


                    </div>
                  </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="email" id="emailAddress" class="form-control form-control-lg" name="email"/>
                      <label class="form-label" for="emailAddress">Email</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="mobile_number"/>
                      <label class="form-label" for="phoneNumber">Phone Number</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="password" id="password" class="form-control form-control-lg" name="password" />
                        <label class="form-label" for="emailAddress">Password</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="password" id="phoneNumber" class="form-control form-control-lg" name="" />
                        <label class="form-label" for="confirm_password">confirm-password</label>
                      </div>

                    </div>
                  </div>



                <div class="mt-4 pt-2">
                  <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- /resources/views/post/create.blade.php -->



<!-- Create Post Form -->
@endsection
