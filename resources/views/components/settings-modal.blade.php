<!-- Settings Modal -->
<div class="modal fade" id="settings_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Settings
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times close_icon"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header position-relative account_details">
                    <a href="#" class="text-reset d-block stretched-link collapsed">
                        <div class="row no-gutters align-items-center">
                            <!-- Title -->
                            <div class="col">
                                <h5>Account</h5>
                                <p class="m-0">Update your profile details.</p>
                            </div>
                            <!-- Icon -->
                            <div class="col-auto">
                                <i class="text-muted icon-md fas fa-user"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card-header position-relative mt-3 security_details">
                    <a href="#" class="text-reset d-block stretched-link collapsed">
                        <div class="row no-gutters align-items-center">
                            <!-- Title -->
                            <div class="col">
                                <h5>Security</h5>
                                <p class="m-0">Update your profile details.</p>
                            </div>
                            <!-- Icon -->
                            <div class="col-auto">
                                <i class="text-muted icon-md fas fa-crosshairs"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <form action="{{ route('update-account') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mt-3">
                        <label for="profile-name">Name</label>
                        <input class="form-control form-control-lg profile_input group_formcontrol" name="name" id="profile-name" type="text" placeholder="Type your name" value="{{ $user->name }}">
                    </div>
                    @if(!$user->google_id)
                    <div class="mt-4">
                        <label for="profile-name">Current Password</label>
                        <input class="form-control form-control-lg group_formcontrol" name="current_password" id="profile-name_pswd" type="password" placeholder="Current Password">
                    </div>
                    <div class="mt-4">
                        <label for="profile-name">New Password</label>
                        <input class="form-control form-control-lg group_formcontrol" name="password" id="profile-name_new" type="password" placeholder="New Password">
                    </div>
                    <div class="mt-4">
                        <label for="profile-name">Verify Password</label>
                        <input class="form-control form-control-lg group_formcontrol" name="password_confirmation" id="profile-name_prfname" type="password" placeholder="Verify Password">
                    </div>
                    @else
                    <div class="mt-4">
                        You are registered with google account
                    </div>
                    @endif
                    <div class="mt-3 text-center">
                        <button class="btn btn-block newgroup_create mb-0" type="submit">Save Settings</button>
                    </div>

                    @if ($errors->accountUpdate->any())
                         <div class="alert alert-danger mt-2">
                             <ul>
                                 @foreach ($errors->accountUpdate->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                </form>

            </div>
        </div>
    </div>
</div>
<!-- /Settings Modal -->
