<?php

use App\Events\NewNotificationEvent;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notifications', function ($user) {
    return true; // Atur otorisasi channel sesuai kebutuhan Anda
});

Broadcast::channel('user.{userId}.notifications', function ($user, $userId) {
    return $user->id === (int)$userId; // Atur otorisasi channel sesuai kebutuhan Anda
});

Broadcast::channel('private-notifications', function ($user) {
    return $user != null; // Atur otorisasi channel sesuai kebutuhan Anda
});
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

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
