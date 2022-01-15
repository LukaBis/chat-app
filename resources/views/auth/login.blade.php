<x-guest-layout>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Page Content -->
        <div class="content align-items-center">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <!-- Login Tab Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <a href="{{ route('login') }}">
                                            <img src="template-images/logo.png" alt="" class="header_image">
                                       </a>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control form-control-lg group_formcontrol" name="email" type="email" placeholder="Enter your email" :value="old('email')" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-lg group_formcontrol" name="password" id="password" type="text" placeholder="Enter your password" required autocomplete="current-password">
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="pt-1">
                                            <div class="text-center">
                                            <button class="btn newgroup_create btn-block d-block w-100" type="submit">Login</button>
                                        </div>

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    </form>

                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="row form-row social-login">
                                        <div class="col-6 ml-auto mr-auto">
                                            <a href="{{ route('auth/google') }}" class="btn btn-google btn-block" target=""><i class="fab fa-google mr-1"></i> Login</a>
                                        </div>
                                    </div>
                                    <div class="text-center dont-have">Don’t have an account? <a href="{{ route('register') }}">Register</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- /Login Tab Content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Main Wrapper -->

</x-guest-layout>
