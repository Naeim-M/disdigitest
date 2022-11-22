<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\Storage;

class ContentController extends Controller {

        /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function cats() {
        $contents = DB::table('contents')->get();
        return view('pages.content-lists', compact('contents'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contents = Content::latest()->paginate(50);
        $type ['name'] = 'content';
        return view('admin.p-contents', compact('contents', 'type'));
    }
        /**
     * Display a listing of the resource to admin panel.
     *
     * @return \Illuminate\Http\Response
     */
        public function indexAdmin() {
        $contents = Content::latest()->paginate(50); 
        $type ['name'] = 'content';
        return view('adminp.p-contents', compact('contents', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create() {
        $user = Auth::user();
        if ($user && $user->level > 3) {
            $type ['name'] = 'content';
            $type['link'] = '';
            return view('adminp.p-add-content', compact('type'));
        } else {
            return redirect()->home();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContentRequest  $request
     * @return \Illuminate\Http\Response
     */
        public function store(StoreContentRequest $request) {
        $user = Auth::user();
        if ($user && $user->level >= 3) {
            $picname = request()->input('code');
            $content = Content::create($this->valid());
            $path = $request->file('pic')->storeAs('content', $picname . '.jpg', 'public');
            return redirect()->route('admin-dash');
        } else {
            return redirect()->home();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content) {
        $contents = DB::table('contents')
                ->where('id', '!=', $content->id)
                ->where('lang', 'tr')
                ->where('activation', 1)
                ->orderby('date', 'desc')
                ->take(4)
                ->get();
        return view('pages.content', compact('contents', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
        public function edit(Content $content) {
        $user = Auth::user();
        if ($user && $user->level > 3) {
            $type ['name'] = 'content';
            $type['link'] = '';
            return view('adminp.p-add-content', compact('content', 'type'));
        } else {
            return redirect()->home();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentRequest  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
        public function update(UpdateContentRequest $request, Content $content) {
        $user = Auth::user();
        if ($user && $user->level >= 3) {
            $picname = request()->input('code');
            $pic = $request->file('pic');
            $content->update($this->valid());
            if ($pic) {
                $path = $request->file('pic')->storeAs('content', $picname . '.jpg', 'public');
            }
            return redirect()->route('admin-new-contents');
        } else {
            return redirect()->home();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content) {
        $user = Auth::user();
        if ($user && $user->level >= 3) {
            $content->delete();
            return redirect()->route('admin-contents');
        } else {
            return redirect()->home();
        }
    }

    protected function picsave() {
        $picname = request()->link;
        $pic = request()->file('pic');
        if ($pic != null) {
            $pic->save(storage_path('app/public/content/' . $picname . '.jpg'));
        }
    }

    protected function valid() {
        return Request()->validate([
                    'title' => 'required',
                    'link' => 'required',
                    'code' => 'required',
                    'keyword' => '',
                    'text' => '',
                    'seodescription' => '',
                    'summary' => '',
                    'date' => '',
                    'category' => '',
                    'lang' => 'required',
                    'activation' => '',
                    'featured' => '',
                    'pic' => 'file'
                        ]
        );
    }

}
