<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    public function changeLanguage(Request $request): RedirectResponse
    {
        session()->put('locale', $request->language);
        return redirect()->back();
    }

}
