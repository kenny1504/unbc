<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }
    
    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $userId): RedirectResponse
    {
    
        $user = User::find($userId);
        if ($user) {
            $user->fill($request->validated());
    
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }
    
            $user->save();
        }
    
        return Redirect::to('/');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return Redirect::to('/login');
    }
    
    public function destroyUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
        }
        
        return Redirect::to('/');
    }
    
    public function editUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            return view('profile.edit', [
                'user' => $user,
            ]);
        }
        
        return Redirect::to('/');
    }
}
