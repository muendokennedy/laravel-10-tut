<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RedirectResponse;
use OpenAI\Laravel\Facades\OpenAI;

class AvartarController extends Controller
{
    //
    public function update(UpdateAvatarRequest $request): RedirectResponse
    {
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

        // $path = $request->file('avatar')->store('avatars', 'public');

        // check whether the user has submitted a file

        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar' => $path]);

        return redirect(route('profile.edit'))->with('message', 'The profile avatar is updated succesfully');

    }

    public function generate(Request $request): RedirectResponse
    {
        // Genrate the avatar image from ai

        $result = OpenAI::images()->create([
            "prompt" => "Create avatar for user with name" . auth()->user()->name,
            "n" => 1,
            "size" => "256x256"
        ]);

        $content = file_get_contents($result->data[0]->url);

        $filename = Str::random(25);

        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }


        Storage::disk('public')->put("avatars/$filename.jpg", $content);

        auth()->user()->update(['avatar' => "avatars/$filename.jpg"]);

        return redirect(route('profile.edit'))->with('message', 'The avatar has been generated successfully');

    }
}
