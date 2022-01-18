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
<script>
  // Register service worker.
  if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('service-worker.js')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
  });
}
</script>

<!-- Live search for users -->
<script src="/scripts/live-search.js"></script>

<script src="/scripts/block-user.js"></script>
<script src="/scripts/delete-chat.js"></script>
<script src="/scripts/send-message.js"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">
var userToId = @if(Auth::user()) {{ Auth::user()->id }} @endif

Echo.private(`message.${userToId}`)
   .listen('MesssageSent', (e) => {
       console.log(e);
   });
</script>
