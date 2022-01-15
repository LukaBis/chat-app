<!-- Right sidebar -->
<div class="right-sidebar right_sidebar_profile" id="middle1">
    <div class="right-sidebar-wrap active">
        <div class="contact-close_call mr-4 mt-4 text-right">
            <a href="#"
                class="btn btn-outline-light close_profile close_profile4">
                <i class="fas fa-times close_icon"></i>
            </a>
        </div>
        <div class="sidebar-body">
            <div class="pl-4 pr-4 mt-0 right_sidebar_logo">
                <div class="text-center mb-3">
                    <figure class="avatar avatar-xl mb-3">
                        <img src="{{ asset('storage/images/users/' . $chatUser->image); }}" class="rounded-circle" alt="image">
                    </figure>
                    <h5 class="profile-name">{{ $chatUser->name }}</h5>
                </div>
                <div>

                    <div class="accordion-col">
                        <div class="accordion-title">
                            <h6 class="primary-title">About and phone number <i class="fas fa-chevron-right float-right"></i></h6>
                        </div>
                        <div class="accordion-content">
                            <p class="text-muted text-center mt-1">
                                {{ $chatUser->about }}
                            </p>
                            <div class="mt-2 text-center">
                                <h6>Phone: <span class="text-muted ml-2">{{ $chatUser->phone }}</span></h6>
                            </div>
                        </div>
                        <div class="accordion-title">
                            <h6 class="primary-title">Settings <i class="fas fa-chevron-right float-right"></i></h6>
                        </div>
                        <div class="accordion-content">
                            <ul class="contact-action">
                                <li class="block-user mt-1">
                                    <a id="block-submit" style="cursor: pointer;"><i class="fas fa-ban mr-2 text-muted"></i>Block</a>
                                    <form id="block-form" class="d-none" action="{{ route('block-user') }}" method="post">
                                        @csrf
                                        <input type="text" name="user1" value="{{ $user->id }}" />
                                        <input type="text" name="user2" value="{{ $chatUser->id }}" />
                                    </form>
                                </li>
                                <li class="delete-chat">
                                    <a id="delete-chat" style="cursor: pointer;"><i class="fas fa-trash-alt mr-2"></i> Delete Chat</a>
                                    <form id="delete-form" class="d-none" action="{{ route('delete-chat') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="text" name="user2" value="{{ $chatUser->id }}" />
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Right sidebar -->
