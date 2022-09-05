<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UrlController extends Controller
{
    public function getAllUrls()
    {
        $urls = DB::table('urls')->get();
        return view('urls', compact('urls'));
    }

    public function addUrl()
    {
        return view('main-page');
    }

    public function addUrlSubmit(Request $request)
    {
            DB::table('urls')->insert([
                'name' => $request->name['url'],
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
            $urls = DB::table('urls')->get();
            return view('urls', compact('urls'));
    }
}
