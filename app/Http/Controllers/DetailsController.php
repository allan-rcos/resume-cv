<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailsRequest;
use App\Models\UserData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    /**
     * Update or Create (if don't exist) a UserData
     * @param  DetailsRequest  $request
     * @return RedirectResponse
     */
    public function __invoke(DetailsRequest $request): RedirectResponse
    {
        $data = array_filter($request->validated());
        $user_id = ['user_id' => Auth::id()];

        if ($data) UserData::updateOrCreate($user_id, $data);

        return redirect(redirect()->back()->getTargetUrl().'#Details')->with('status', __('details-updated'));
    }
}
