<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));
        return redirect()->intended(route('post.index', absolute: false));//Sec10-4P.313_ログイン後のリダイレクト先の変更
        // この部分がv12になって、ログイン後にダッシュボードに飛ばされる部分。
        // route('/post/index’)と書いてはいけない。コントローラーなどで使っているみたいにroute('post.index'と書く
        //古いテキストだと、RouteServiceProvider.phpを編集とか出てくるけど、このVarではもう無い。
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
