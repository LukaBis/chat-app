<!-- Profile Modal -->
<div class="modal fade" id="profile_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Profile
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times close_icon"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- Card -->
                <div class="card mb-6 profile_Card">
                    <div class="card-body">
                        <div class="text-center py-6">
                            <!-- Photo -->
                            <div class="avatar avatar-xl mb-3">
                                <img class="avatar-img rounded-circle mCS_img_loaded" src="{{ asset('storage/images/users/' . $user->image) }}" alt="">
                            </div>
                            <h5>{{ $user->name }}</h5>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <!-- Card -->
                <form action="{{ route('update-profile') }}" method="post" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Photo</label>
                        <input class="form-control form-control-lg group_formcontrol" name="photo" type="file">
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <input value="{{ $user->country }}" class="form-control form-control-lg group_formcontrol" name="country" type="text" placeholder="Country Name">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input value="{{ $user->phone }}" class="form-control form-control-lg group_formcontrol" name="phone" type="text" placeholder="+39 02 87 21 43 19">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input value="{{ $user->email }}" class="form-control form-control-lg group_formcontrol" name="email" type="email" placeholder="johnjanousek@gmail.com">
                    </div>
                    <div class="form-group">
                        <label>About</label>
                        <input value="{{ $user->about }}" class="form-control form-control-lg group_formcontrol" name="about" type="text" placeholder="Say something about yourself">
                    </div>
                    <button type="submit" name="button" class="btn btn-block newgroup_create mb-0 mt-4">
                        Update Profile
                    </button>
                </form>

                @if ($errors->any())
                     <div class="alert alert-danger mt-2">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif

            </div>
        </div>
    </div>
</div>
<!-- /Profile Modal -->
