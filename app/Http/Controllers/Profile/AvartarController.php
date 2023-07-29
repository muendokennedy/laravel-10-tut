<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AvartarController extends Controller
{
    //
    public function update(UpdateAvatarRequest $request)
    {
        // store the avartar field in the database

        // $userData = User::find($user);

        $path = $request->file('avatar')->store('avatars', 'public');

        auth()->user()->update(['avatar' => $path]);

        return redirect(route('profile.edit'))->with('message', 'The profile avatar is updated succesfully');

    }
}
