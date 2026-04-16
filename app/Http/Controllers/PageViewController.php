<?php

namespace App\Http\Controllers;

use App\Enums\CommonStatus;
use App\Models\AboutLeftSide;
use App\Models\AboutRightSide;
use App\Models\Admin\Team;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Gallery;
use App\Models\OurStory;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomComment;
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


    public function projectProgress()
    {
        $data['projectProgress'] = OurStory::oldest()->get();
        return view('front-end.pages.project-progress', $data);
    }

    public function blogPage()
    {
        $data['blogs'] = Blog::latest()->paginate(10);
        return view('front-end.pages.blog', $data);
    }

    public function blogDetails($id)
    {
        $data['blog'] = Blog::findOrFail($id);
        $data['blogComments'] = BlogComment::where('blog_id', $id)->latest()->take(4)->get();
        $data['recentBlogs'] = Blog::where('id', '!=', $id)->latest()->take(4)->get();
        $data['relatedBlogs'] = Blog::where('blog_category_id', $data['blog']->blog_category_id)->where('id', '!=', $id)->latest()->take(4)->get();
        $data['galleries'] = Gallery::latest()->take(12)->get();
        $data['categories'] = BlogCategory::latest()->take(12)->get();

        return view('front-end.pages.blog-details', $data);
    }

    public function blogCommentStore(Request $request)
    {
        $validated =  $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $blogComment = BlogComment::create($validated);
        if (!$blogComment) {
            return redirect()->back()->with('error', 'Failed to add comment.');
        }
        return redirect()->back()->with('success', 'Comment successfully!');
    }

    public function blogSearch(Request $request)
    {
        $data['searchText'] = $request->input('search_text');
        $data['blogs'] = Blog::where('name', 'like', '%' . $data['searchText'] . '%')
            ->orWhere('description', 'like', '%' . $data['searchText'] . '%')
            ->latest()
            ->paginate(12);

        return view('front-end.pages.blog-search', $data);
    }


    public function teamCategory($category_type, $category_name)
    {

        $data["categoryName"] = $category_name;
        $data['teams'] = Team::where('category_type', $category_type)->where('status', CommonStatus::Active)->oldest('serial')->paginate(12);

        return view('front-end.pages.team-category', $data);
    }

    public function roomCategory($id)
    {
        $data['roomCategory'] = RoomCategory::findOrFail($id);
        $data['rooms'] = Room::where('room_category_id', $id)->with('type:id,name')->latest()->paginate(12);

        return view('front-end.pages.room-category', $data);
    }

    public function roomDetails($id)
    {
        $data['room'] = Room::with('type:id,name')->findOrFail($id);
        $data['roomComments'] = RoomComment::where('room_id', $id)->latest()->take(4)->get();
        $data['recentRooms'] = Room::where('id', '!=', $id)->latest()->take(4)->get();
        $data['relatedRooms'] = Room::where('room_category_id', $data['room']->room_category_id)->where('id', '!=', $id)->latest()->take(4)->get();

        return view('front-end.pages.room-details', $data);
    }

    public function roomCommentStore(Request $request)
    {

        $validated =  $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $roomComment = RoomComment::create($validated);
        if (!$roomComment) {
            return redirect()->back()->with('error', 'Failed to add comment.');
        }
        return redirect()->back()->with('success', 'Comment successfully!');
    }

    public function roomSearch(Request $request)
    {
        $data['searchText'] = $request->input('search_text');
        $data['rooms'] = Room::where('name', 'like', '%' . $data['searchText'] . '%')
            ->orWhere('description', 'like', '%' . $data['searchText'] . '%')
            ->latest()
            ->paginate(12);

        return view('front-end.pages.room-search', $data);
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
