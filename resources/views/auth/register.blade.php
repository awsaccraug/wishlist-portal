 @extends('layouts.auth')
 @section('content')
 <section class="login-block">
     <!-- Container-fluid starts -->
     <div class="container-fluid">
         <div class="row">
             <div class="col-sm-12">
                 <form class="md-float-material form-material" method="POST" action="{{ route('register') }}">
                     @csrf
                     <div class="text-center">
                         @include('shared.logo')
                     </div>
                     <div class="auth-box card">
                         <div class="card-block">
                             <div class="row m-b-20">
                                 <div class="col-md-12">
                                     <h3 class="text-center txt-primary">Register as a Wisher</h3>
                                 </div>
                             </div>
                             {{-- <div class="form-group form-primary">
                                            <input type="text" name="user-name" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Choose Username</label>
                                        </div> --}}
                             <div class="form-group form-primary">
                                 <input type="text" name="email" class="form-control" required>
                                 <span class="form-bar"></span>
                                 <label class="float-label">Your Email Address</label>
                             </div>
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="form-group form-primary">
                                         <input type="password" name="password" class="form-control" required>
                                         <span class="form-bar"></span>
                                         <label class="float-label">Password</label>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group form-primary">
                                         <input type="password" name="password_confirmation" class="form-control"
                                             required>
                                         <span class="form-bar"></span>
                                         <label class="float-label">Confirm Password</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="row m-t-30">
                                 <div class="col-md-12">
                                     <button type="submit"
                                         class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
                                 </div>
                             </div>
                             <hr />
                             <div class="row">
                                 <div class="col-md-10">
                                     <p class="text-inverse text-left m-b-0">Thank you.</p>
                                     <p class="text-inverse text-left"><a href="{{ route('welcome') }}"><b>Back to
                                                 website</b></a></p>
                                 </div>
                                 {{-- <div class="col-md-2">
                                     <img src="{{ asset('files/assets/images/new-logo-small.png') }}"
                                 alt="small-logo.png">
                             </div> --}}
                         </div>
                     </div>
             </div>
             </form>
             <div class="col-sm-12 w-50 mx-auto my-2">
                 @if ($errors->any())
                 <div class="alert alert-danger text-center">
                     <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
                 @endif
                 @if (\Session::has('duplicateEntry'))
                 <div class="alert alert-danger text-center">
                     {{ session::get('duplicateEntry') }}
                 </div>
                 @endif
                 @if (\Session::has('registerError'))
                 <div class="alert alert-danger text-center">
                     {{ session::get('registerError') }}
                 </div>
                 @endif
             </div>
         </div>
         <!-- end of col-sm-12 -->
     </div>
     <!-- end of row -->
     </div>
     <!-- end of container-fluid -->
 </section>
 @endsection
