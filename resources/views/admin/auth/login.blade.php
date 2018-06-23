@extends('admin.layout.master')

@section('body')

    <body class="horizontal-layout horizontal-menu 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="horizontal-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content container center-layout mt-2">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1"><img src="{{asset('admin-asset/app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo"></div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login to admin portal</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Error ! </strong> {{$error}}
                                                </div>
                                            @endforeach
                                        @endif

                                        <form class="form-horizontal form-simple" method="post" action="{{ url('/admin/login') }}" novalidate>
                                            {{csrf_field()}}
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <input type="text" class="form-control form-control-lg" value="{{old('email')}}" name="email" id="user-name" placeholder="Enter email" required>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>

                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg" name="password" id="user-password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-md-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember" name="remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12 text-center text-md-right"><a href="{{url('admin/password/reset')}}" class="card-link">Forgot Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="">
                                        <p class="float-sm-left text-center m-0"><a href="{{url('admin/password/reset')}}" class="card-link">Recover password</a></p>
                                        <p class="float-sm-right text-center m-0">Global Food <a href="{{url('/')}}" class="card-link">Hub</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection