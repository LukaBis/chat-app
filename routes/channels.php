<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Message;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('message.{userToId}', function ($user, $userToId) {
    // return $user->id === Message::find($messageId)->user_to_id; ovo ce mzd trebat prominit userToId
    return true;
});
