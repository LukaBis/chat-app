<!-- jQuery -->
<script src="/scripts/jquery-3.4.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="/scripts/popper.min.js"></script>
<script src="/scripts/bootstrap.min.js"></script>

<!-- Custom Scroll JS -->
<script src="/scripts/plugins/mcustomscroll/jquery.mCustomScrollbar.js"></script>

<script src="/scripts/luxon-1.11.4.js"></script>
<script src="/scripts/app.js"></script>

<!-- Add the install script here -->
<!-- <script>
  // Register service worker.
  if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('service-worker.js')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
  });
}
</script> -->

<!-- Live search for users -->
<script src="/scripts/live-search.js"></script>

<script src="/scripts/block-user.js"></script>
<script src="/scripts/delete-chat.js"></script>
<script src="/scripts/send-message.js"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">
function add_chat_user_text_message_to_chat(text) {
    var htmlViewMessage = `
        <div class="chats">
            <div class="chat-content">
                <div class="message-content">
                    ` + text + `
                </div>
            </div>
        </div>
    `;

    $('.messages').append(htmlViewMessage);
}

function add_chat_user_image_message_to_chat(image) {
    var htmlViewMessage = `
        <div class="chats">
            <div class="chat-content">
                <div class="message-content">
                    <a href="{{ asset('/storage/images/messages/').'/' }}` + image + `">
                        <img src="{{ asset('/storage/images/messages/').'/' }}` +image + `" alt="image" class="img-fluid rounded">
                    </a>
                </div>
            </div>
        </div>
    `;

    $('.messages').append(htmlViewMessage);
}

var userToId = @if(Auth::user()) {{ Auth::user()->id .";" }} @endif

window.Echo.private(`message.` + userToId)
   .listen('.MessageSent', (e) => {
       add_chat_user_text_message_to_chat(e.message.text);
   })
   .listen('.ImageMessageSent', (e) => {
       console.log(e.message.image);
       add_chat_user_image_message_to_chat(e.message.image);
   });

</script>
