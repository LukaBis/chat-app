<x-app-layout>

    <!-- Main Wrapper -->
       <div class="main-wrapper">

           <!-- content -->
           <div class="content main_content">

               <x-left-sidebar />

               @if(Route::currentRouteName() == "chatUser")
                   <x-chat :messages="$messages" :user="$user" :chatUser="$chatUser" />
                   <x-right-sidebar :user="$user" :chatUser="$chatUser" />
               @endif

               @if(Route::currentRouteName() == "dashboard")
                   <x-welcome :user="$user" />
               @endif

               <x-profile-modal :user="$user" />
               <x-settings-modal :user="$user" />

           </div>
           <!-- /Content -->

       </div>
       <!-- /Main Wrapper -->

       <div class="notification-install-col">
           <p>Add to home screen</p>
           <button id="butInstall" aria-label="Install">Install</button>
       </div>

</x-app-layout>
