<?php

namespace App\Http\Controllers;

use App\Enums\CommonStatus;
use App\Models\Admin\Team;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Career;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\OurStory;
use App\Models\Page;
;
use App\Models\Service;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    public function page($slug)
    {
        // custom page
        if ($slug === 'news' || $slug === 'blog') {
            return $this->blogPage();
        } elseif ($slug === 'team' || $slug === 'teams' || $slug === 'team-member') {
            return $this->teamPage();
        } elseif ($slug === 'about-us' || $slug === 'about') {
            return $this->aboutPage();
        } elseif ($slug === 'contact-us' || $slug === 'contact') {
            return $this->contactPage();
        } elseif ($slug === 'career') {
            return $this->careerPage();
        } elseif ($slug === 'gallery') {
            return $this->galleryPage();
        } elseif ($slug === 'faq') {
            return $this->faqPage();
        }
        // dynamic page
        return $this->pageDetail($slug);
    }

    public function pageDetail($slug)
    {
        $content = Page::where('slug', $slug)->first();
        return view('front-end.pages.page-detail', compact('content'));
    }

    public function aboutPage()
    {
        $data['ourStories'] = OurStory::oldest()->get();
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
        $data['blogComments'] = BlogComment::where('blog_id', $id)->latest()->take(4)->get();
        $data['recentBlogs'] = Blog::where('id', '!=', $id)->latest()->take(4)->get();

        $data['relatedBlogs'] = Blog::where('blog_category_id', $data['blog']->blog_category_id)->where('id', '!=', $id)->latest()->take(4)->get();

        $data['categories'] = BlogCategory::latest()->take(12)->get();

        return view('front-end.pages.blog-details', $data);
    }

    public function blogCommentStore(Request $request)
    {
        $validated = $request->validate([
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


    public function teamCategory($id, $category_name)
    {
        $data['categoryName'] = $category_name;

        $data['teams'] = Team::whereHas('categories', function ($q) use ($id) {
            $q->where('team_categories.id', $id);
        })
            ->where('status', CommonStatus::Active)
            ->orderBy('serial', )
            ->paginate(12);

        return view('front-end.pages.team-category', $data);
    }

    public function teamPage()
    {
        $data['teams'] = Team::oldest('serial')->paginate(12);
        return view('front-end.pages.team', $data);
    }
    public function teamDetails($id, $slug)
    {
        $data['team'] = Team::findOrFail($id);
        return view('front-end.pages.team-details', $data);
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
    public function careerPage()
    {
        return view('front-end.pages.career');
    }
    public function careerForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'education' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'birth_date' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        Career::create($validated);
        return redirect()->back()->with('success', 'Successfully Apply Done.');
    }

    public function faqPage()
    {
        $faqs = FAQ::latest()->get();
        return view('front-end.pages.faq', compact('faqs'));
    }

    public function documentCategory($id, $slug)
    {
        $data['category'] = DocumentCategory::findOrFail($id);
        $data['documents'] = Document::where('document_category_id', $id)->get();
        return view('front-end.pages.document-details', $data);
    }


}
