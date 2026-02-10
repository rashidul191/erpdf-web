<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        // dd(Blog::with(['category:id,name'])->latest()->get());

        if ($request->ajax()) {
            return datatables(Blog::with(['category:id,name'])->latest())
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return '<img class="w-12 h-12" src="' . $row->image . '" />';
                })
                ->addColumn('gallery_image', function ($row) {
                    $html = '<div class="flex">';

                    if (!empty($row->gallery_image)) {
                        foreach ($row->gallery_image as $image) {
                            $html .= '<img class="w-12 h-12 object-cover rounded border" src="' . asset($image) . '" />';
                        }
                    }

                    $html .= '</div>';

                    return $html;
                })
                ->rawColumns(['image', 'gallery_image']) // Mark 'image' and 'action' columns as raw HTML
                ->toJson();
        }
        return view('admin.blog.index');
    }

    public function create()
    {
        $data['blogCategories'] = BlogCategory::all();
        return view('admin.blog.create')->with($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'             => 'required|image|mimes:jpg,jpeg,png,webp|max:1024',
            'gallery_image'     => 'nullable|array',
            'gallery_image.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'name'              => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description'       => 'nullable|string',

            'blog_category_id'       => 'nullable|exists:blog_categories,id',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $blog = Blog::create($validated);

        return response()->reportTo(
            $blog,
            'Blog created successfully',
            route('admin.blog.index')
        );
    }

    public function edit(Blog $blog)
    {
        $data['blog'] = $blog;
        $data['blogCategories'] = BlogCategory::all();

        return view('admin.blog.edit')->with($data);
    }


    public function update(Request $request, Blog $blog)
    {
        // dd($request->all());
        $validated = $request->validate([
            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            // OLD gallery images (hidden inputs) 
            'gallery_image'       => 'nullable|array',
            'gallery_image.*'     => 'nullable|string', // old image path, string

            // NEW gallery images (file uploads)
            'gallery_image_new'   => 'nullable|array',
            'gallery_image_new.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'name'                => 'required|string|max:255',
            'short_description'   => 'nullable|string|max:255',
            'description'         => 'nullable|string',
            'blog_category_id'    => 'nullable|exists:blog_categories,id',
        ]);


        $validated['slug'] = Str::slug($validated['name']);

        dd($validated);
        $blog->update($validated);

        return response()->reportTo(
            $blog,
            'Blog updated successfully',
            route('admin.blog.index')
        );
    }


    public function destroy(Blog $blog)
    {
        return response()->reportTo(
            $blog->delete(),
            'Deleted successfully',
            route('admin.blog.index')
        );
    }
}
