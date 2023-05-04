<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function swap($locale)
    {
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
