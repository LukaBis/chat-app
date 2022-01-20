<h3>Chat app</h3>

<p>This is a simple <b>messaging app</b>. User can create an account by giving
username, password and email. Simpler way is a one click registration with
Google account.</p>

<p>User can update his/her profile picture and give some personal data which is
optional. On left side of the screen, user can search users by username and results of the search will automatically update.</p>

<p>Messaging is real time (no page refresh for new messages). That is implemented
with Laravel Events, Broadcasting and Pusher. User can send text and images.</p>

<p>On the right side of the screen, user can view the profile of the user he/she is
messaging at that moment.</p>

<p>If you want to clone this on your machine, you have to setup your .env file and give your pusher account credentials.</p>

<p>After you setup your database you can migrate and seed the database. Don't forget to run php artisan storage:link</p>
