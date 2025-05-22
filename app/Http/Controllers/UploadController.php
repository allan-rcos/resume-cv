<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Models\UserData;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $data = UserData::find($user_id);
        try {
            Storage::delete('profiles\\'.$data->filename);
        } catch (Exception) {
        }
        $file->storeAs('profiles', $filename);
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
        $data = UserData::find($user_id);
        try {
            Storage::delete('covers\\'.$data->cover);
        } catch (Exception) {
        }
        $file->storeAs('covers', $cover);
        $data->cover = $cover;
        $data->save();

        return redirect()->back()->with('status', __('upload.success'));
    }
}
