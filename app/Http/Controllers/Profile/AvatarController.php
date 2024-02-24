<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {
        $oldAvatar = $request->user()->avatar;

        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

        auth()->user()->update([
            'avatar' => $path
        ]);

        if ($oldAvatar)
            Storage::disk('public')->delete($oldAvatar);
        return back()->with('message', 'Avatar is changed');
    }
}
