<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Models\Post;
use App\Models\Homeslider;
use App\Models\Upcoming;
use App\Models\Ourclients;
use App\Models\Ourgallary;
use App\Models\Ourmission;
use App\Models\Websitesettings;
use App\Models\Ebulletins;
use App\Models\ourportfolio;



class HomeController extends Controller{

    public function index(){
        $categorys = DB::table('portfolio_category')->where('status', 1)->orderBy('id', 'desc')->get();
        $protfolios = ourportfolio::where('status', 1)->select(DB::raw('category_id,count(*) as count'))->groupBy('category_id')->orderBy('id', 'desc')->get();
        foreach($protfolios as $item){
            $item['singlePortfolio'] = ourportfolio::where('category_id', $item->category_id)->orderBy('id', 'desc')->get(); 
        }
        $about_basic =  DB::table('dit_about_basic')->where('id', 1)->first();
        $banner =  DB::table('con_banner_slider')->where('type', 'homebanner')->first();
        $blogs =  DB::table('tb_pages')->where('pagetype', 'post')->where('status', 'enable')->orderBy('pageID', 'DESC')->get();
        $ourclients = Ourclients::where('status', 1)->orderBy('id', 'DESC')->get();
        $Ebulletins = Ebulletins::where('status', 1)->orderBy('id', 'DESC')->get();
        $sacrifices =  DB::table('dit_sacrifices')->where('id', 1)->first();
        $how_work =  DB::table('dit_how_work')->where('status', 1)->get();
        foreach($blogs as $item){
            $user = DB::table('tb_users')->where('id', $item->userid)->first();
            $item->username = $user->username;
            $item->avatar = $user->avatar;
            $item->created_at = $item->created;
            
        }

        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'blogs' =>  $blogs,
            'ourclients' =>  $ourclients,
            'sacrifices' =>  $sacrifices,
            'Ebulletins' =>  $Ebulletins,
            'banner' =>  $banner??null,
            'how_work' =>  $how_work,
            'about_basic' =>  $about_basic,
            'protfolio_categorys' =>  $categorys,
            'protfolios' =>  $protfolios,
        ]);
     }



     public function posts(Request $request ,  $category = ''){
        $posts = DB::table('tb_pages')
            ->select('tb_pages.*','tb_users.username')
            ->leftJoin('tb_users','tb_users.id','tb_pages.userid')
            ->leftJoin('tb_comments','tb_comments.pageID','tb_pages.pageID')		
            ->leftJoin('tb_categories','tb_categories.cid','tb_pages.cid')	
            ->orderBy('tb_pages.pageID', 'DESC')				
            ->where('tb_pages.pagetype','post');
            if( $category !=''  ) {
                $mode = 'category';
                $this->data['categoryDetail'] = Post::categoryDetail( $category );
                $posts = $posts->where('tb_categories.alias',$category )->paginate(6);					
            }else {
                $mode = 'all';
                $posts = $posts->paginate(6);
            }
            return Inertia::render('Components/Posts', [
                'title' =>  'Post Articles',
                'posts' =>  $posts,
                'popular' =>  Post::lists('popular'),
                'headline' =>  Post::lists('headline'),
                'breadcum' =>   DB::table('con_banner_slider')->where('type', 'blogs')->where('status', 1)->first(),
                'mode' =>   $mode,
            ]);
	    }









     public function singleService($id){
        $services = DB::table('dit_services')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $banner =  DB::table('con_banner_slider')->where('type', 'service')->first();
        $serviceSingle = DB::table('dit_services')->where('id', $id)->where('status', 1)->first();
         
        return Inertia::render('Components/SingleService', [
            'services' =>  $services,
            'serviceSingle' =>  $serviceSingle,
            'banner' => $banner?$banner->image:null,
        ]);
     }


    public function read($slug){
        $blogs =  DB::table('tb_pages')->where('pagetype', 'post')->where('status', 'enable')->orderBy('pageID', 'DESC')->get();
         
        $banner =  DB::table('con_banner_slider')->where('type', 'blogs')->first();
        $data =  DB::table('tb_pages')->where('pagetype', 'post')->where('status', 'enable')->where('alias', $slug)->first();
        $user =  DB::table('tb_users')->where('id', $data->userid)->first();

        return Inertia::render('Components/SingleBlog', [
            'data' =>  $data,
            'blogs' =>  $blogs,
            'banner' => $banner?$banner->image:null,
            'user' =>  $user,
        ]);
    }
     public function message(Request $request){
        $this->validate($request, [
		    'name' => 'required',
            'email'=> 'required|email',
            'message'=> 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] =  $request->message;
        $data['status'] =  1;
        DB::table('contact')->insert($data);

        $response['status'] = 1;
        $response['message'] = 'Message send successfully.';
        return response()->json($response, 200);
    }

    public function services(){
        $banner =  DB::table('con_banner_slider')->where('type', 'service')->first();
        $services = DB::table('dit_services')->where('status', 1)->get();
         
        return Inertia::render('Components/Services', [
            'services' =>  $services,
            'banner' => $banner?$banner->image:null,
        ]);
    }
    public function about(){
        $banner =  DB::table('con_banner_slider')->where('type', 'about')->first();
        $about_basic =  DB::table('dit_about_basic')->where('id', 1)->first();
        $about_ourself =  DB::table('tbl_about_us')->where('id', 1)->first();
        
        $ourclients = Ourclients::where('status', 1)->orderBy('id', 'DESC')->get();
        $testimonials =DB::table('dit_testimonials')->where('status', 1)->get();
        $discovers =DB::table('dit_discover')->where('status', 1)->get();
        $optimalSolutions =DB::table('dit_optimal_solutions')->where('status', 1)->get();
        return Inertia::render('Components/About', [
 
            'ourclients' =>  $ourclients,
            'testimonials' =>  $testimonials,
            'discovers' =>  $discovers,
            'optimalSolutions' =>  $optimalSolutions,
            'about_basic' =>  $about_basic,
            'about_ourself' =>  $about_ourself,
            'banner' => $banner?$banner->image:null,
        ]);
    }
    public function contact(){
        $offices = DB::table('dit_offices')->where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $banner =  DB::table('con_banner_slider')->where('type', 'contact')->first();
         
        $ourclients = Ourclients::where('status', 1)->orderBy('id', 'DESC')->get();
        $testimonials =DB::table('dit_testimonials')->where('status', 1)->get();
        return Inertia::render('Components/Contact', [
            'ourclients' =>  $ourclients,
            'testimonials' =>  $testimonials,
            'offices' =>  $offices,
            'banner' => $banner?$banner->image:null,
        ]);
    }
    

    public function team(){
        $teams = DB::table('con_team')->where('status', 1)->orderBy('sort_number', 'ASC')->get();
        $banner =  DB::table('con_banner_slider')->where('type', 'team')->first();
         
        return Inertia::render('Components/Team', [
            'teams' =>  $teams,
            'banner' => $banner?$banner->image:null,
        ]);
    }
    public function portfolio(){
        $categorys = DB::table('portfolio_category')->where('status', 1)->orderBy('id', 'DESC')->get();
        $protfolios = DB::table('our_protfolios')->where('status', 1)->orderBy('id', 'DESC')->paginate(12);
        $teams = DB::table('con_team')->where('status', 1)->orderBy('sort_number', 'ASC')->get();
        $banner =  DB::table('con_banner_slider')->where('type', 'portfolio')->first();
         
        return Inertia::render('Components/Portfolio', [
            'categorys' =>  $categorys,
            'protfolios' =>  $protfolios,
            'banner' => $banner?$banner->image:null,
        ]);
    }
    public function career(){
        $categorys = DB::table('portfolio_category')->where('status', 1)->orderBy('id', 'DESC')->get();
        $protfolios = DB::table('our_protfolios')->where('status', 1)->orderBy('id', 'DESC')->paginate(12);
        $teams = DB::table('con_team')->where('status', 1)->orderBy('sort_number', 'ASC')->get();
        $banner =  DB::table('con_banner_slider')->where('type', 'portfolio')->first();
         
        return Inertia::render('Components/Career', [
            'categorys' =>  $categorys,
            'protfolios' =>  $protfolios,
            'banner' => $banner?$banner->image:null,
        ]);
    }    
      
    public function category_portfolio($id){
        if($id == 0){
            $protfolios = DB::table('our_protfolios')->where('status', 1)->orderBy('id', 'DESC')->paginate(50);;
        }else{
            $protfolios = DB::table('our_protfolios')->where('category_id', $id)->where('status', 1)->orderBy('id', 'DESC')->paginate(50);
        }
        if($protfolios){
            return $protfolios;
        }else{
            return null;
        }
    }

    public function privacyPolicy(){
        $pageContent = DB::table('tb_pages')->where('alias', 'privacy-policy')->first();
        $banner =  DB::table('con_banner_slider')->where('type', 'privacy')->first();
         
        return Inertia::render('Components/Privacy', [
            'pageContent' =>  $pageContent,
            'banner' => $banner?$banner->image:null,
        ]);
    }


    public function termsConditions(){
        $pageContent = DB::table('tb_pages')->where('alias', 'terms-and-condition')->first();
        $banner =  DB::table('con_banner_slider')->where('type', 'termsandconditions')->first();
         
        return Inertia::render('Components/Terms', [
            'pageContent' =>  $pageContent,
            'banner' => $banner?$banner->image:null,
        ]);
    }
    


}
