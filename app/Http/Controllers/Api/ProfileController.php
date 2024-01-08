<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function image(UserRequest $request)
    {
        $user = User::findOrFail($request->user()->id);

        $user->image = $request->file('image')->storePublicly('images', 'public');

        if (!is_null($user->image)){
            Storage::disk('public')->delete($user->image);
        }

        $user->save();

        return $user;
    }
    public function show(Request $request)
    {
        return $request->user();
    }
}
