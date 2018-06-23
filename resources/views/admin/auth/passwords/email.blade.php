@extends('admin.layout.master')

@section('body')
    <body class="horizontal-layout horizontal-menu 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="horizontal-menu" data-col="1-column">
    <div class="app-content container center-layout mt-2">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset('admin-asset/app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>We will email you a reset link.</span></h6>
                                </div>
                                <div class="card-content">

                                    <div class="card-body">

                                        @if (session('status'))
                                            <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>Success ! </strong> {{ session('status') }}
                                            </div>

                                        @endif
                                        <form class="form-horizontal" method="post" action="{{ url('/admin/password/email') }}" novalidate>
                                            {{csrf_field()}}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <input type="email" class="form-control form-control-lg" value="{{old('email')}}" id="user-email" name="email" placeholder="Your Email Address">
                                                    <div class="form-control-position">
                                                        <i class="ft-mail"></i>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                     @endif

                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i class="ft-unlock"></i> Recover Password</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="float-sm-left text-center"><a href="{{url('/admin/login')}}" class="card-link">Login</a></p>
                                    <p class="float-sm-right text-center">Global Food <a href="{{url('/')}}" class="card-link">Hub</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</body>
@endsection