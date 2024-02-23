<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {
        auth()->user()->update([
            'avatar' => $request->file('avatar')->store('avatars', 'public')
        ]);
        return back()->with('message', 'Avatar is changed');
    }
}
