<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ trans('auth.continue-signin') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.jpg') }}"/>
    <!-- Scripts -->
    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
</head>
<body class="sidebar-dark">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="{{ asset('assets/admin/images/logo.svg') }}" alt="logo">
                        </div>
                        <h4>{{ trans('auth.lets-start') }}</h4>
                        <h6 class="font-weight-light">{{ trans('auth.continue-signin') }}</h6>
                        <form class="pt-3" role="form" method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <input type="email" name="email"
                                       class="form-control form-control-lg {{ $errors->has('email') ? ' form-control-danger' : '' }}"
                                       id="inputEmail" placeholder="{{ trans('users.email') }}"
                                       value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <label id="inputEmail-error" class="error mt-2 text-danger"
                                           for="inputEmail">{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <input type="password" name="password"
                                       class="form-control form-control-lg {{ $errors->has('password') ? ' form-control-danger' : '' }}"
                                       id="inputPassword" placeholder="{{ trans('users.password') }}" required>
                                @if ($errors->has('password'))
                                    <label id="inputPassword-error" class="error mt-2 text-danger"
                                           for="inputPassword">{{ $errors->first('password') }}</label>
                                @endif
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ trans('auth.signin') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/admin/js/template.js') }}"></script>
<!-- endinject -->
</body>
</html>
