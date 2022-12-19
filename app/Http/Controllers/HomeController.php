<?php

namespace App\Http\Controllers;

use App\Models\GlobalSetting;
use App\Models\NavigationItems;
use App\Models\NavigationVideoItems;
use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Job;


class HomeController extends Controller
{
    public function index()
    {

        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();


        // client
        $home_client  = Navigation::query()->where('nav_category', 'Main')->where('page_type', '=', 'client')->where('page_status', '1')->orderBy('position', 'ASC')->paginate(30);
        //   return $home_client;


        $notice_data = Navigation::all()->where('page_type', '=', 'Notice');

        // return $notice_data;





        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->paginate(10);
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first() != null) {
            $about_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id', $about_id)->latest()->first();
        } else {
            $About = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first() != null) {
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
            // return $partners;
        } else {
            $partners = null;
        }

        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%steps%")->where('page_type', 'Group')->latest()->first() != null) {
            $steps_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%steps%")->where('page_type', 'Group')->latest()->first()->id;
            $steps = Navigation::query()->where('parent_page_id', $steps_id)->latest()->get()->take(3);
            // return $steps;
        } else {
            $steps = null;
        }

        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%testimonials%")->where('page_type', 'Group')->latest()->first() != null) {
            $testimonials_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%testimonials%")->where('page_type', 'Group')->latest()->first()->id;
            $testimonials = Navigation::query()->where('parent_page_id', $testimonials_id)->latest()->get()->take(3);
            // return $testimonials;
        } else {
            $testimonials = null;
        }




        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%statistic%")->where('page_type', 'Group')->latest()->first() != null) {
            $statistics_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%statistic%")->where('page_type', 'Group')->latest()->first()->id;
            $statistics = Navigation::query()->where('parent_page_id', $statistics_id)->latest()->get();
            // return $statistics;
        } else {
            $statistics = null;
        }

        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first() != null) {
            $banner_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id', $banner_id)->latest()->get();
        } else {
            $banners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first() != null) {
            $slider_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id', $slider_id)->latest()->get();
        } else {
            $sliders = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first() != null) {
            $misson_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id', $misson_id)->latest()->get();
            //return $misson;
        } else {
            $missons = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
            // return $message;
        } else {
            $message = null;
        }

        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%news&events%")->where('page_type', 'Group')->latest()->first() != null) {
            $notice_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%news&events%")->where('page_type', 'Group')->latest()->first()->id;
        } else {
            $message = null;
        }






        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first() != null) {
            $process_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first()->id;
            $process = Navigation::query()->where('parent_page_id', $process_id)->latest()->get();
        } else {
            $process = null;
        }
        //return $misson;
        $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        // return $job_categories;
        $global_setting = GlobalSetting::all()->first();
        //return $missons;       
        return view("website.index")->with(['statistics' => $statistics, 'partners' => $partners, 'jobs' => $jobs, 'banners' => $banners, 'about' => $About, 'menus' => $menus, 'global_setting' => $global_setting, 'sliders' => $sliders, 'missons' => $missons, 'job_categories' => $job_categories, 'message' => $message, 'process' => $process, 'home_client' => $home_client, 'notice_data' => $notice_data, 'steps' => $steps, 'testimonials' => $testimonials]);
    }



    public function category($menu)
    {
        //return $menu." this is category";
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        //return $menus->first()->submenus;
        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->get();
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first() != null) {
            $about_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id', $about_id)->latest()->first();
        } else {
            $About = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first() != null) {
            $banner_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id', $banner_id)->latest()->get();
        } else {
            $banners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first() != null) {
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
            //return $partners;
        } else {
            $partners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
            // return $message;
        } else {
            $message = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first() != null) {
            $slider_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id', $slider_id)->latest()->get();
        } else {
            $sliders = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first() != null) {
            $misson_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id', $misson_id)->latest()->get();
            //return $misson;
        } else {
            $missons = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
        } else {
            $message = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first() != null) {
            $process_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first()->id;
            $process = Navigation::query()->where('parent_page_id', $process_id)->latest()->get();
        } else {
            $process = null;
        }
        //return $misson;
        $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        //sreturn $job_categories;
        $global_setting = GlobalSetting::all()->first();
        //return view("website.index")->with(['jobs'=>$jobs,'banners'=>$banners,'about'=>$About,'menus'=>$menus,'global_setting'=>$global_setting,'sliders'=>$sliders,'missons'=>$missons,'job_categories'=>$job_categories,'message'=>$message,'process'=>$process]);
        if (Navigation::all()->where('nav_name', $menu)->count() > 0) {
            $job_id = Navigation::all()->where('nav_name', $menu)->first()->id;
            $jobs = Navigation::query()->where('parent_page_id', $job_id)->where('page_type', 'Job')->orderBy('created_at', 'desc')->get();
        } else {
            $jobs = null;
        }
        $slug_detail = Navigation::all()->where('nav_name', $menu)->first();
        //
        if (Navigation::all()->where('nav_name', $menu)->count() > 0) {
            //$normal_notice_page = Navigation::all()->where('nav_name',$slug)->first();
            $category_id = Navigation::all()->where('nav_name', $menu)->first()->id;

            if (Navigation::all()->where('parent_page_id', $category_id)->count() > 0) {
                $category_type = Navigation::all()->where('parent_page_id', $category_id)->first()->page_type;
            } else {
                $category_type = Navigation::all()->where('nav_name', $menu)->where('page_type', '!=', 'Notice')->first()->page_type;
            }
        } else {
            $category_type = null;
        }
        if ($category_type == "Photo Gallery") {
            //return "return to page gallary";
            $photos = Navigation::query()->where('parent_page_id', $category_id)->where('page_status', '1')->latest()->get();
            return view("website.gallery")->with(['partners', 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Video Gallery") {
            return "return to page gallary";
            $photos = Navigation::query()->where('parent_page_id', $category_id)->where('page_status', '1')->latest()->get();
            return view("website.gallery")->with(['photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Job") {
            //return "return to view job";
            return view("website.job-list")->with(['jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Notice") {
            // return "return to view Notice";
            $notices = Navigation::query()->where('parent_page_id', $category_id)->latest()->get();
            $notice_heading = Navigation::find($category_id)->first();
            // return $notice_heading;
            //return $notice_heading;
            return view("website.notice")->with(['notice_heading' => $notice_heading, 'notices' => $notices, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Normal") {
            //return $category_id;
            $normal = Navigation::find($category_id);

            return view("website.normal")->with(['message' => $message, 'normal' => $normal, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "client") {
            // return $category_id;
            $client = Navigation::find($category_id);
            $client_breed = $client->client_childs;
            // return $client_breed;

            return view("website.clients")->with(['message' => $message, 'client' => $client, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, "client_breed" => $client_breed]);
        } else {

            return redirect('/');
        }
    }

    public function subcategory($slug1, $submenu)
    {
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        //return $menus->first()->submenus;
        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->get();
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first() != null) {
            $about_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id', $about_id)->latest()->first();
        } else {
            $About = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first() != null) {
            $banner_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id', $banner_id)->latest()->get();
        } else {
            $banners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
        } else {
            $message = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first() != null) {
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
            //return $partners;
        } else {
            $partners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first() != null) {
            $slider_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id', $slider_id)->latest()->get();
        } else {
            $sliders = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first() != null) {
            $misson_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id', $misson_id)->latest()->get();
            //return $misson;
        } else {
            $missons = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
        } else {
            $message = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first() != null) {
            $process_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first()->id;
            $process = Navigation::query()->where('parent_page_id', $process_id)->latest()->get();
        } else {
            $process = null;
        }
        //return $misson;
        $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        //sreturn $job_categories;
        $global_setting = GlobalSetting::all()->first();
        //return view("website.index")->with(['jobs'=>$jobs,'banners'=>$banners,'about'=>$About,'menus'=>$menus,'global_setting'=>$global_setting,'sliders'=>$sliders,'missons'=>$missons,'job_categories'=>$job_categories,'message'=>$message,'process'=>$process]);
        if (Navigation::all()->where('nav_name', $submenu)->count() > 0) {
            $job_id = Navigation::all()->where('nav_name', $submenu)->first()->id;
            $jobs = Navigation::query()->where('parent_page_id', $job_id)->where('page_type', 'Job')->orderBy('created_at', 'desc')->get();
        } else {
            $jobs = null;
        }
        $slug_detail = Navigation::all()->where('nav_name', $submenu)->first();
        //
        if (Navigation::all()->where('nav_name', $submenu)->count() > 0) {
            $subcategory_id = Navigation::all()->where('nav_name', $submenu)->first()->id;
            if (Navigation::all()->where('parent_page_id', $subcategory_id)->count() > 0) {
                $subcategory_type = Navigation::all()->where('parent_page_id', $subcategory_id)->first()->page_type; //slug/slug2(GROUP)
            } else {
                //return Navigation::all()->where('nav_name',$submenu)->where('page_type','Normal')->first()->page_type;
                if (Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Normal')->count() > 0) {
                    $subcategory_type = Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Normal')->first()->page_type; //slug/slug2(group)

                } elseif (Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Video Gallery')->count() > 0) {
                    $subcategory_type = Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Video Gallery')->first()->page_type; //slug/slug2(group)
                    //return $subcategory_type;
                } elseif (Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Photo Gallery')->count() > 0) {
                    $navigataion_id = Navigation::where('nav_name', $submenu)->first()->id;
                    $photos = NavigationItems::where('navigation_id', $navigataion_id)->get();
                    return view("website.gallery_view")->with(['partners' => $partners, 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
                } else {
                    return redirect('/'); //submenu is page_type=Group and its internal items are empty
                }
            }
        } else {
            $subcategory_type = null;
        }
        if ($subcategory_type == "Photo Gallery") {
            //return "return to page gallary";
            $photos = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_status', '1')->latest()->get();
            return view("website.gallery")->with(['partners' => $partners, 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Video Gallery") {
            $photos = NavigationVideoItems::where('navigation_id', $subcategory_id)->get();
            return view("website.video_gallery")->with(["partners" => $partners, 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Team") {
            $Team_category = Navigation::find($subcategory_id);
            $Teams = Navigation::find($subcategory_id)->childs;
            // return $Teams;
            return view("website.team_member")->with(["partners" => $partners, 'Teams' => $Teams, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, "Team_category" => $Team_category, "Teams" => $Teams]);


        } elseif ($subcategory_type == "Client") {
            $Client_category = Navigation::find($subcategory_id);
            $Clients = Navigation::find($subcategory_id)->client_childs;
            // return $Clients;
            return view("website.clients")->with(["partners" => $partners, 'Clients' => $Clients, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, "Client_category" => $Client_category, "Clients" => $Clients]);
        


         } elseif ($subcategory_type == "Our Program") {
            $program_category = Navigation::find($subcategory_id);
            $programs = Navigation::find($subcategory_id)->childs;
            // return $programs;
            return view("website.our_program")->with(["partners" => $partners, 'programs' => $programs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, "program_category" => $program_category, "programs" => $programs]);
        }


        
        elseif ($subcategory_type == "Notice") {
            // return "return to view Notice";
            $notices = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_type', 'Notice')->latest()->get();
            $notice_heading = Navigation::find($subcategory_id);
            //return $notice_heading;
            return view("website.notice")->with(["partners" => $partners, 'notice_heading' => $notice_heading, 'notices' => $notices, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Normal") {
            $normal = Navigation::find($subcategory_id);
            return view("website.normal")->with(["partners" => $partners, 'message' => $message, 'normal' => $normal, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Group") {

            return view("website.job-list")->with(["partners" => $partners, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } else {
            // return redirect("/");
        }
    }
    public function singlePage($slug)
    {
        $program_details = Navigation::all()->where('nav_name', $slug)->first();
        // return $program_details;
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first() != null) {
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
            //return $partners;
        } else {
            $partners = null;
        }
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'program_details')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.program_detail")->with(["partners" => $partners, 'program_details' => $program_details, 'menus' => $menus, 'global_setting' => $global_setting]);
    }


    public function ReadMore($slug)
    {
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
        } else {
            $message = null;
        }
        $normal = Navigation::where('nav_name', $slug)->first();
        //return $normal;
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        // return $menus;
        return view("website.normal")->with(['message' => $message, 'slug_detail' => $normal, 'normal' => $normal, 'menus' => $menus, 'global_setting' => $global_setting, 'job_slug' => $slug]);
    }
    public function allCategory()
    {
        $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.all_category")->with(['job_categories' => $job_categories, 'menus' => $menus, 'global_setting' => $global_setting]);
    }
    public function allJobs()
    {
        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->get();
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.job-list")->with(['jobs' => $jobs, 'menus' => $menus, 'global_setting' => $global_setting]);
    }
    public function GalleryView($slug)
    {
        $navigataion_id = Navigation::where('nav_name', $slug)->first()->id;
        $photos = NavigationItems::where('navigation_id', $navigataion_id)->get();
        $normal = Navigation::find($navigataion_id);

        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.gallery_view")->with(['photos' => $photos, 'menus' => $menus, 'global_setting' => $global_setting, "normal" => $normal]);
    }
}
