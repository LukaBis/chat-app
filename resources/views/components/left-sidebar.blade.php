<!-- sidebar group -->
<div class="sidebar-group left-sidebar chat_sidebar @if(Route::currentRouteName() == 'chatUser') hide-left-sidebar @endif">
    <!-- Chats sidebar -->
    <div id="chats" class="left-sidebar-wrap sidebar active">
        <div class="header">
            <div class="header-top">
                <div class="logo ml-2 mt-3">
                    <a href="index.html">
                        <img src="/template-images/logo.png" class="header_image img-fluid" alt="">
                    </a>
                </div>
                <ul class="header-action mt-4">
                    <li>
                        <a href="#" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-h ellipse_header"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right header_drop_icon">
                            <a class="dropdown-item" data-toggle="modal" data-target="#profile_modal">Profile</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#settings_modal">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class="dropdown-item">Logout</a>
                             </form>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="nav nav-tabs chat-tabs mt-4">
                <li class="nav-item">
                    <a class="nav-link  active" href="index.html">Chat</a>
                </li>
            </ul>
        </div>
        <div class="search_chat has-search">
            <span class="fas fa-search form-control-feedback"></span>
            <input class="form-control chat_input" id="search-contact" type="text" placeholder="">
        </div>
        <div class="sidebar-body" id="chatsidebar">
            <ul class="user-list" id="user-list">

                <li class="user-list-item">
                    <div class="avatar avatar-online">
                        <img src="images/avatar-8.jpg" class="rounded-circle" alt="image">
                    </div>
                    <div class="users-list-body">
                        <div>
                            <h5>user name</h5>
                            <p>It seems logical that the strategy of providing!</p>
                        </div>
                        <div class="last-chat-time">
                            <small class="text-muted">14:45 pm</small>
                            <div class="chat-toggle mt-1">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="fas fa-ellipsis-h ellipse_header"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item dream_profile_menu">Profile</a>
                                        <a href="#" class="dropdown-item">Add to archive</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <!-- / Chats sidebar -->
</div>
<!-- /Sidebar group -->
