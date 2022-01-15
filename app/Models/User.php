<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\BlockedUsers;
use App\Models\Message;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function randomId(): int {
        return User::all()->toArray()[rand(0, User::count() - 1)]['id'];
    }

    /**
     * It checks if this user and user whose id is provided are blocked
     *
     * @param int $id
     * @return bool Returns true if the users are blocked
     */
    public function isBlocked(int $id): bool {
        return BlockedUsers::where([
            ["user_one_id", "=" ,$id],
            ["user_two_id", "=" ,$this->id]
        ])->orWhere([
            ["user_two_id", "=" ,$id],
            ["user_one_id", "=" ,$this->id]
        ])->get()->count() > 0;
    }

    /**
     * This function returns collection of messages between two users
     *
     * @param int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getMessages(int $id) {
        return Message::where([
            ["user_from_id", "=" ,$id],
            ["user_to_id", "=" ,$this->id]
        ])->orWhere([
            ["user_to_id", "=" ,$id],
            ["user_from_id", "=" ,$this->id]
        ])->get();
    }

    public function deleteMessaages($id) {
        Message::where([
            ["user_from_id", "=" ,$id],
            ["user_to_id", "=" ,$this->id]
        ])->orWhere([
            ["user_to_id", "=" ,$id],
            ["user_from_id", "=" ,$this->id]
        ])->delete();
    }
}
