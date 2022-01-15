<!-- Chat -->
<div class="chat @if(Route::currentRouteName() == 'chatUser') show-chatbar @endif" id="middle">
    <div class="chat-header">
        <div class="user-details">
            <div class="d-lg-none ml-2">
                <ul class="list-inline mt-2 mr-2">
                    <li class="list-inline-item">
                        <a class="text-muted px-0 left_side" href="#" data-chat="open">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <figure class="avatar ml-1">
                <img src="{{ asset('storage/images/users/' . $chatUser->image); }}" class="rounded-circle" alt="image">
            </figure>
            <div class="mt-1">
                <h5 class="mb-1">{{ $chatUser->name }}</h5>
            </div>
        </div>
        <div class="chat-options">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="btn btn-outline-light" href="#" data-toggle="dropdown">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item dream_profile_menu">Profile</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="chat-body">
        <div class="messages">

            @foreach($messages as $message)
                @if($message->user_from_id == $user->id)
                    <div class="chats chats-right">
                        <div class="chat-content">
                            <div class="@if(!$message->image) message-content @endif">
                                @if($message->text)
                                    {{ $message->text }}
                                @endif

                                @if($message->image)
                                <a href="{{ asset('/storage/images/messages/'.$message->image) }}">
                                    <img src="{{ asset('/storage/images/messages/'.$message->image) }}" alt="image" class="img-fluid rounded">
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if($message->user_from_id != $user->id)
                <div class="chats">

                    <div class="chat-avatar">
                        <img src="{{ asset('storage/images/users/' . $chatUser->image); }}" class="rounded-circle dreams_chat" alt="image">
                    </div>

                    <div class="chat-content">
                        <div class="@if(!$message->image) message-content @endif">
                            @if($message->text)
                                {{ $message->text }}
                            @endif

                            @if($message->image)
                            <a href="{{ asset('/storage/images/messages/'.$message->image) }}">
                                <img src="{{ asset('/storage/images/messages/'.$message->image) }}" alt="image" class="img-fluid rounded">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

            @endforeach

        </div>
    </div>
    <div class="chat-footer">
        <form>
            <input id="chat-user-id" type="text" name="chatUserId" value="{{ $chatUser->id }}" class="d-none">
            <input id="text-message" name="text" type="text" class="form-control chat_form" placeholder="Write a message.">
            <div class="form-buttons">
                <button class="btn" type="button" data-toggle="modal" data-target="#drag_files">
                    <i class="fas fa-image mr-2"></i>
                </button>
                <button id="send-message-button" class="btn send-btn">
                    <i class="fab fa-telegram-plane"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- /Chat -->

<!-- Upload Documents -->
<div id="drag_files" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Drag and drop files upload</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sendImageMessage') }}" method="post" id="js-upload-form" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                      <label for="image-upload">Example file input</label>
                      <input type="file" name="image" class="form-control-file" id="image-upload">
                      <input type="text" name="chatUserId" class="d-none" value="{{ $chatUser->id }}">
                    </div>
                    <div class="text-center mt-0">
                        <!-- data-dismiss="modal" -->
                        <button class="btn newgroup_create m-0" type="submit">Send this image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Upload Documents -->
