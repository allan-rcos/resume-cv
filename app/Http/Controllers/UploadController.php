<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Models\UserData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    /**
     * Upload the profile image.
     * @param  ImageUploadRequest  $request
     * @return RedirectResponse
     */
    public function image(ImageUploadRequest $request): RedirectResponse
    {
        $user_id = Auth::id();
        $file = $request->file('image');
        $filename = $user_id.'.'.$file->getClientOriginalExtension();
        $file->storeAs('profiles', $filename);
        $data = UserData::find($user_id);
        $data->filename = $filename;
        $data->save();

        return redirect()->back()->with('status', __('upload.success'));
    }

    /**
     * Upload the cover image.
     * @param  ImageUploadRequest  $request
     * @return RedirectResponse
     */
    public function cover(ImageUploadRequest $request): RedirectResponse
    {
        $user_id = Auth::id();
        $file = $request->file('image');
        $cover = $user_id.'.'.$file->getClientOriginalExtension();
        $file->storeAs('covers', $cover);
        $data = UserData::find($user_id);
        $data->cover = $cover;
        $data->save();

        return redirect()->back()->with('status', __('upload.success'));
    }
}
