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

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control form-control-lg group_formcontrol" name="name" type="text" placeholder="Enter your Name" id="name" :value="old('name')" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control form-control-lg group_formcontrol" name="email" type="email" placeholder="Enter your email" :value="old('email')" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="new-chat-topic">Create Password</label>
                                            <input class="form-control form-control-lg group_formcontrol" name="password" id="password" type="password" placeholder="Enter your password" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group">
                                            <label for="new-chat-topic">Confirm Password</label>
                                            <input class="form-control form-control-lg group_formcontrol" name="password_confirmation" id="password_confirmation" type="password" placeholder="Enter your password" required>
                                        </div>

                                        <div class="pt-1">
                                            <div class="text-center">
                                                <button class="btn newgroup_create btn-block d-block w-100" type="submit">Register</button>
                                            </div>
                                        </div>

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
                                    <div class="text-center dont-have">Already have an account? <a href="{{ route('login') }}">Login</a></div>
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
