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
        return view('urls', compact('urls'), [
            'urls' => DB::table('urls')->paginate(4)]);
    }

    public function addUrl()
    {
        return view('main-page');
    }

    public function addUrlSubmit(Request $request)
    {
        $url = $request->url['name'];
        if (DB::table('urls')->where('name', $url)->exists()) {
            $id = DB::table('urls')->where('name', $url)->value('id');
            flash('URL уже существует')->warning();
            return redirect()->route('url.getbyid', ['id' => $id]);
        }
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            DB::table('urls')->insert([
                'name' => $request->url['name'],
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
            $id = DB::table('urls')->where('name', $url)->value('id');
            flash('Сайт успешно добавлен')->success();
            return redirect()->route('url.getbyid', ['id' => $id]);
        } else {
            flash('Некорректный URL')->error();
            return back();
        }
    }

    public function getUrlById($id)
    {
        $url = DB::table('urls')->where('id', $id)->first();
        return view('single-url', compact('url'));
    }
}
