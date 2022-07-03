<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

use DB;
use Auth;



class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request){
        return parent::version($request);
    }




    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request){







        
        $settings = DB::table('settings')->where('id', 1)->get();
        $services = DB::table('dit_services')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $call_us = DB::table('dit_call_us')->where('id', 1)->first();




        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },

            'settings' => fn () => $settings,
            'services' => fn () => $services,
            'call_us' => fn () => $call_us,
            'base_url' => fn () => 'https://dhakaitsolutions.com',
            'parent_url' => fn () => 'https://admin.dhakaitsolutions.com',



        ]);
    }
}
