<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\BlockedUsers;

class UserController extends Controller
{
    /**
     * Returns data and view after user login
     *
     * @return \Illuminate\View\View
     */
    public function home() {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    /**
     * It is used to search users by the keyword provided in request
     *
     * @return string
     */
    public function searchUsers(Request $request) {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        
        if($request->keyword != ''){
            $users = User::where([
                    ['name','LIKE','%'.$request->keyword.'%'],
                    ['id', '!=', Auth::user()->id]
            ])->get();
        };

        $filtered = $users->filter(function ($user) {
            return !$user->isBlocked(Auth::user()->id);
        })->values();

        return response()->json([
            'users' => $filtered
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request) {

        if ($request->photo) {
            // avatar-2.jpg is default image for every user we don't delete that
            // othervise we delete old user image and add new one
            if (!(Auth::user()->image == "avatar-2.jpg")) {
                // deleting old user image
                unlink(public_path("/storage/images/users/") . Auth::user()->image);
                //Storage::disk('public')->delete('images/users/' . Auth::user()->image);
            }

            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $path = $request->file('photo')->storeAs(
              'images/users/', $fileName, 'public'
            );

            $user = Auth::user();
            $user->image = $fileName;
            $user->save();
        }

        $user = Auth::user();

        if($request->country) $user->country = $request->country;
        if($request->phone) $user->phone = $request->phone;
        if($request->country) $user->email = $request->email;
        if($request->country) $user->about = $request->about;

        $user->save();

        return redirect('dashboard');
    }

    public function updateAccount(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'max:40',
            'current_password' => [
                Rule::requiredIf($request->password != null),
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The '.$attribute.' is invalid.');
                    }
                },
            ],
            'password' => [
                Rule::requiredIf($request->current_password != null),
                'confirmed'
            ]
        ]);

        if ($validator->fails()) {
            return redirect('dashboard')->withErrors($validator, 'accountUpdate');
        }

        //  update given data
        $user = Auth::user();

        if($request->name) $user->name = $request->name;
        if($request->current_password) $user->password = Hash::make($request->password);

        $user->save();

        return redirect('dashboard');
    }

    public function getChatUser(Request $request, $id) {
        $validator = Validator::make(
            ["id" => $id],
            ["id" => ["required", "exists:users,id"]]
        );

        if ($validator->fails()) return redirect('dashboard');

        $chatUser = User::find($id);
        $user = Auth::user();
        $messages = $user->getMessages($id);

        return view("dashboard", compact("chatUser", "user", "messages"));
    }

    public function blockUser(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "user1" => ["required", "exists:users,id"],
                "user2" => ["required", "exists:users,id"]
            ]
        );

        if ($validator->fails()) return redirect('dashboard');

        $row = new BlockedUsers;
        $row->user_one_id = $request->user1;
        $row->user_two_id = $request->user2;
        $row->save();

        return redirect('dashboard');
    }

    public function deleteChat(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "user2" => ["required", "exists:users,id"]
            ]
        );

        if ($validator->fails()) return redirect('dashboard');

        $user = Auth::user()->deleteMessaages($request->user2);

        return redirect()->back();
    }
}
