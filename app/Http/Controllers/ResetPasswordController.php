<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResetPasswordController extends Controller
{
    public function forgot()
    {
        return view('ResetPasswordViews.olvido');
    }
}