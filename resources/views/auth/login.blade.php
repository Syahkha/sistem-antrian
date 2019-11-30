@extends('layouts.app')

@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <!-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Silahkan Login</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate= "">
                @csrf
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="name" class="form-control" name="name" tabindex="1" required autofocus>
                    
                    @error('name')
                <div class="">
               
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                
                                </div>
                                @enderror
                    
                
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                     
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    @error('password')
                <div class="">
               
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                
                                </div>
                                @enderror
                    
                  </div>

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
            
                  
                </form>
               

              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>

<!--  -->
<!-- <div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('app2/images/img-01.jpg')}}');">
        <div class="wrap-login100 p-t-190 p-b-30">
            
            <form  method="POST" action="{{ route('login') }}" class="login100-form validate-form">
            @csrf
              

                <span class="login100-form-title p-t-20 p-b-45">
                LOGIN
                </span>

                <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                    <input class="input100" type="text" name="name" id="name" placeholder="Username">
                   
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user"></i>
                    </span>
                   
                </div>
                @error('name')
                <div class="wrap-input100 validate-input m-b-10">
               
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                
                                </div>
                                @enderror

                <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                    <input class="input100" type="password" name="password" id="password" placeholder="Password">
                   
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>
                @error('password')
                <div class="wrap-input100 validate-input m-b-10">
               
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                
                                </div>
                                @enderror

                <div class="container-login100-form-btn p-t-10 p-b-230">
                    <button type="submit" class="login100-form-btn" >
                        Login
                    </button>
                </div>

             
            </form>
        </div>
    </div>
</div> -->



@endsection

