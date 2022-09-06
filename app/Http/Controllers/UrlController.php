<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UrlController extends Controller
{
    public function getAllUrls()
    {
        $urls = DB::table('urls')->paginate(5);
        return view('urls', compact('urls'));
    }

    public function addUrl()
    {
        return view('main-page');
    }

    public function addUrlSubmit(Request $request)
    {
        $url = $request->url['name'];
        $filtredUrl = filter_var($url, FILTER_VALIDATE_URL);
        if($filtredUrl) {
            $tempUrl = parse_url ($filtredUrl);
            $parsedUrl = $tempUrl['scheme'] . '://' . $tempUrl['host'];
        } else {
            flash('Некорректный URL')->error();
            return back();
        }
        if (DB::table('urls')->where('name', $parsedUrl)->exists()) {
            $id = DB::table('urls')->where('name', $parsedUrl)->value('id');
            flash('URL уже существует')->warning();
            return redirect()->route('url.getbyid', ['id' => $id]);
        }
        if ($filtredUrl) {
            DB::table('urls')->insert([
            'name' => $parsedUrl,
            'created_at' => Carbon::now()->toDateTimeString()
            ]);
            $id = DB::table('urls')->where('name', $parsedUrl)->value('id');
            flash('Сайт успешно добавлен')->success();
            return redirect()->route('url.getbyid', ['id' => $id]);
        }
    }

    public function getUrlById($id)
    {
        $url = DB::table('urls')->where('id', $id)->first();
        return view('single-url', compact('url'));
    }
}
