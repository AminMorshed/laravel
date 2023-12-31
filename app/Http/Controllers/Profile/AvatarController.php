<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar' => storage_path('app')."/$path"]);
        dd(auth()->user());
//        return back()->with('message', 'Avatar is changed.');
//        $request->file('avatar')->store('avatars');
        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
    }
}
