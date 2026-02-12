<?php

namespace App\Http\Controllers;

use App\Models\AboutLeftSide;
use App\Models\AboutRightSide;
use App\Models\Admin\Slider;
use App\Models\Admin\Team;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\OurStory;
use App\Models\Service;
use Illuminate\Http\Request;

class PageViewController extends Controller
{

    public function aboutPage()
    {
        $data['aboutLeftSideContents'] = AboutLeftSide::oldest()->get();
        $data['aboutRightSideContents'] = AboutRightSide::oldest()->get();
        $data['ourStories'] = OurStory::oldest()->get();
        $data['services'] = Service::oldest()->get();
        $data['teams'] = Team::orderBy('serial', 'asc')->get();
        return view('front-end.pages.about', $data);
    }

    public function blogPage()
    {
        $data['blogs'] = Blog::latest()->paginate(10);
        return view('front-end.pages.blog', $data);
    }

    public function blogDetails($id)
    {
        $data['blog'] = Blog::findOrFail($id);
        $data['recentBlogs'] = Blog::where('id', '!=', $id)->latest()->take(4)->get();
        $data['relatedBlogs'] = Blog::where('blog_category_id', $data['blog']->blog_category_id)->where('id', '!=', $id)->latest()->take(4)->get();
        $data['galleries'] = Gallery::latest()->take(12)->get();

        return view('front-end.pages.blog-details', $data);
    }

    public function galleryPage()
    {
        $data['galleryImages'] = Gallery::latest()->paginate(12);
        return view('front-end.pages.gallery', $data);
    }

    public function contactPage()
    {
        return view('front-end.pages.contact');
    }
}
