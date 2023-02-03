<?php

namespace App\Http\Controllers;

use App\Support\Toast\ToastData;
use App\Support\Toast\ToastTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AppProfileController extends Controller
{
    public function view()
    {
        return inertia('App/Profile');
    }

    public function saveUserData(Request $request): void
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        auth()->user()?->update($data);

        if (auth()->user()?->wasChanged()) {
            $toastData = new ToastData(type: ToastTypeEnum::SUCCESS, content: 'Profile saved');
        } else {
            $toastData = new ToastData(type: ToastTypeEnum::INFO, content: 'Nothing to save');
        }

        session()->flash('toast', $toastData);
    }

    public function updateUserPassword(Request $request): void
    {
        $data = $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        auth()->user()?->update(['password' => Hash::make($data['password'])]);

        session()->flash('toast', new ToastData(type: ToastTypeEnum::SUCCESS, content: 'Password updated'));
    }
}
