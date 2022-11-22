<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Jlist;

class HomeController extends Controller {

    /**
     * Display home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $jobs = Jlist::whereHas('promotions', function (Builder $query) {
                    $query->where('type', 'like', '%home%')
                            ->where('start', '<', now())
                            ->where('end', '>', now())
                            ->where('activation', 1);
                })->get();
        $contents = DB::table('contents')
                ->where('featured', '1')
                ->orderBy('id', 'desc')
                ->limit(4)
                ->get();
        return view('pages.home', compact('jobs', 'contents'));
    }

    /**
     * Display adpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function adpage($rek, $rekcat) {
        $adblog = DB::table('adpages')
                ->where('link', $rekcat)
                ->first();
        return view('pages.adpage', compact('adblog'));
    }

}
