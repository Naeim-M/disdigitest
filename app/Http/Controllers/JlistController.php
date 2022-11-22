<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJlistRequest;
use App\Http\Requests\UpdateJlistRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Jlist;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JlistController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        return view('dashboard.db-add-job', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJlistRequest  $request
     * @return \Illuminate\Http\Response
     * --------------------------------from user panel ------------------------------
     */
    public function store(StoreJlistRequest $request) {
        $user = Auth::user();
        if ($user && $user->level > 1) {
            $job = new Jlist($this->validjob());
            $job->cat()->associate(request('cat'));
            $user->jlists()->save($job);
            $this->generateCode($validated, $jlist);
            $job->update();
            $this->calcRate($job);
            return view('dashboard.db-add-job2', compact('job'));
        } else {
            return redirect()->back()->with('Failed', 'Access Denied!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jlist  $jlist
     * @return \Illuminate\Http\Response
     */
    public function show(Jlist $jlist) {
        $ads = Jlist::whereHas('promotions', function (Builder $query) {
                    $query->where('type', 'like', '%page%')
                            ->where('start', '<', now())
                            ->where('end', '>', now());
                })->get();
        return view('pages.buisiness-detail', compact('jlist', 'ads'));
    }

    //-----------------------------------------------------------------------------------------------
    //---------------- transfer job to new table (jlist) admin ---------------------------------
    public function transfer(StoreJlistRequest $request, Jlist $jlist) {
        $user = Auth::user();
        if ($user->level > 7) {
            $jobid = $request->jobid;
            $validated = $request->validated();
            $jlist = new Jlist($validated);
            $user->jlists()->save($jlist);
            $this->generateCode($jlist);
            $code = $jlist->code;
            $this->savePics($request, $code);
            if ($request->input('promotion')) {
            $this->createPromotion($jlist);
            }
            $this->calcRate($jlist);
            $jlist->update();
            $deleted = DB::table('jobs')->where('id', $jobid)->delete();
            if(!$deleted){
                return redirect()->route('admin-dash')->with('success', 'Business Registered Successfully - But old job didn`t deleted');
            }
            return redirect()->route('admin-dash')->with('success', 'Business Registered Successfully!');
        } else {
            return redirect()->back()->with('Failed', 'Access Denied!');
        }
    }

    //-----------------------------------------------------------------------------------------------
    //------------------------------add job to jlist admin-----------------------------------
    public function add_new(StoreJlistRequest $request, Jlist $jlist) {
        $user = Auth::user();
        if ($user->level > 7) {
            $validated = $request->validated();
            $jlist = new Jlist($validated);
            $user->jlists()->save($jlist);
            $this->generateCode($jlist);
            $code = $jlist->code;
            $this->savePics($request, $code);
            if ($request->input('promotion')) {
            $this->createPromotion($jlist);
            }
            $this->calcRate($jlist);
            $jlist->update();
            return redirect()->route('admin-dash')->with('success', 'Business Registered Successfully!');
        } else {
            return redirect()->back()->with('Failed', 'Access Denied!');
        }
    }

    //--------------------------------------------------------------------------------
    //---------------------------edit job in jlist----------------------------------
    public function edit(Jlist $jlist) {
        $user = Auth::user();
        if ($user->level > 7) {
            return view('adminp.p-list-edit', compact('jlist'));
        } elseif ($user->id === $jlist->user_id) {
            return view('dashboard.db-job-edit', compact('jlist'));
        } else {
            return redirect()->back()->with('Failed', 'Access Denied!');
        }
    }

    //--------------------------------------------------------------------------------
    //-------------------------update jlist admin------------------------------------
    public function update(UpdateJlistRequest $request, Jlist $jlist) {
        $user = Auth::user();
        if ($user->level > 7 || $user->id === $jlist->user_id) {
            $validated = $request->validated();
            $jlist->update($validated);
            $code = $jlist->code;
            $this->savePics($request, $code);
            if ($request->input('promotion')) {
            $this->createPromotion($jlist);
            }
            $this->calcRate($jlist);
            if ($user->level > 7){
               return redirect()->route('adminp-all-list')->with('success', 'Business Updated Successfully!'); 
            }
            return redirect()->route('step2')->with('success', 'İş bilgileriniz başarıyla uzmana gönderilir');
        } else {
            return redirect()->back()->with('Failed', 'Access Denied!');
        }
    }

    //--------------------------------------------------------------------------------
    //-------------------------Show user jobs------------------------------------
    public function myjobs() {
        $jobs = Auth::user()->jobs()->orderBy('id', 'DESC')->get();
        return view('dashboard.db-my-jobs', compact('jobs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $jlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jlist $jlist) {
        $user = Auth::user();
        if ($user) {
            if ($user->level >= 7) {
                $jlist->promotions()->delete();
                $jlist->delete();
                return redirect()->back()->with('success', 'Business Deleted Successfully!');
            }
            if ($user->id == $jlist->user_id) {
                $jlist->delete();
                return redirect()->route('dashboard')->with('success', 'İşletme Başarıyla Kaydedildi!');
            }
        } else {
            return redirect()->home()->with('Failed', 'Access Denied!');
        }
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function promotiondestroy(Promotion $promotion) {
        $user = Auth::user();
        if ($user) {
            if ($user->level >= 7) {
                $promotion->delete();
                return redirect()->back();
            }
        }
    }

    //-------------------------------------------------------------------------------
    //------------------------------ protected functions-----------------------------

    protected function savePics($request,$code) {
        $logo = $request->file('logo');
        $cover = $request->file('cover');
        $pic1 = $request->file('pic1');
        $pic2 = $request->file('pic2');
        $pic3 = $request->file('pic3');
        $pic4 = $request->file('pic4');
        if ($logo) {
            $path = $request->file('logo')->storeAs('lists/jobs/', $code . '-l.jpg', 'public');
        }
        if ($cover) {
            $path = $request->file('cover')->storeAs('lists/jobs/', $code . '-c.jpg', 'public');
        }
        if ($pic1) {
            $path = $pic1->storeAs('lists/jobs/', $code . '1.jpg', 'public');
        }
        if ($pic2) {
            $path = $pic2->storeAs('lists/jobs/', $code . '2.jpg', 'public');
        }
        if ($pic3) {
            $path = $pic3->storeAs('lists/jobs/', $code . '3.jpg', 'public');
        }
        if ($pic4) {
            $path = $pic4->storeAs('lists/jobs/', $code . '4.jpg', 'public');
        }
    }

    protected function generateCode($jlist) {
        $email = $jlist->email;
        $i = $jlist->id;
        $code = crc32($email . $i);
        $jlist->code = $code;
        $jlist->update();
    }

        protected function validPromotion() {
        return Request()->validate([
                    'name' => '',
                    'jlist_id' => '',
                    'type' => '',
                    'start' => '',
                    'end' => '',
                        ]
        );
    }
    
    protected function createPromotion($jlist) {
            $promotion = new Promotion($this->validPromotion());
            $jlist->promotions()->save($promotion);
    }

    protected function calcRate($job) {
        $code = $job->code;
        $rate = 0;
        if ($job->mobile) {$rate++;}
        if ($job->website) {$rate++;}
        if ($job->fax) {$rate++;}
        if ($job->postalcode) {$rate++;}
        if ($job->summary) {$rate++;}
        if ($job->description) {$rate++;}
        if (($job->lng) && ($job->lat)) {$rate++;}
        if (file_exists(public_path() . "'lists/jobs/', $code . '-l.jpg'")) {$rate++;}
        if (file_exists(public_path() . "'lists/jobs/', $code . '-c.jpg'")) {$rate++;}
        if ((file_exists(public_path() . "'lists/jobs/', $code . '1.jpg'")) ||
                (file_exists(public_path() . "'lists/jobs/', $code . '2.jpg'")) ||
                (file_exists(public_path() . "'lists/jobs/', $code . '3.jpg'")) ||
                (file_exists(public_path() . "'lists/jobs/', $code . '4.jpg'"))) {
            $rate++;
        }
        $job->rate = $rate;
        $job->update();
    }
}