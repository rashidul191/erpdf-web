<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Room::with(['category:id,name', 'type:id,name'])->latest())
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return '<img class="w-12 h-12" src="' . $row->image . '" />';
                })
                ->addColumn('price', function ($row) {
                    return $row->price ? number_format($row->price) : '-';
                })
                ->addColumn('size', function ($row) {
                    return $row->size ? number_format($row->size) : '-';
                })
                ->addColumn('adult', function ($row) {
                    return $row->adult ? number_format($row->adult) : '-';
                })
                ->addColumn('child', function ($row) {
                    return $row->child ? number_format($row->child) : '-';
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
        return view('admin.room.index');
    }

    public function create()
    {
        $data['roomCategories'] = RoomCategory::oldest('name')->get();
        $data['roomTypes'] = RoomType::oldest('name')->get();
        return view('admin.room.create')->with($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_category_id'       => 'nullable|exists:room_categories,id',
            'room_type_id'       => 'nullable|exists:room_types,id',

            'image'             => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'gallery_image'     => 'nullable|array',
            'gallery_image.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'name'              => 'required|string|max:255',
            'time_duration' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'size' => 'nullable|numeric|min:0',
            'adult' => 'nullable|numeric|min:0',
            'child' => 'nullable|numeric|min:0',
            'view' => 'nullable|string|max:255',
            'description'       => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $room = Room::create($validated);

        return response()->reportTo(
            $room,
            'Room created successfully',
            route('admin.room.index')
        );
    }

    public function edit(Room $room)
    {
        $data['room'] = $room;
        $data['roomCategories'] = RoomCategory::oldest('name')->get();
        $data['roomTypes'] = RoomType::oldest('name')->get();

        return view('admin.room.edit')->with($data);
    }


    public function update(Request $request, Room $room)
    {
        // dd($request->all());
        $validated = $request->validate([
            'room_category_id'    => 'nullable|exists:room_categories,id',
            'room_type_id'    => 'nullable|exists:room_types,id',
            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            // OLD gallery images (hidden inputs) 
            'gallery_image'       => 'nullable|array',
            'gallery_image.*'     => 'nullable|string', // old image path, string

            // NEW gallery images (file uploads)
            'gallery_image_new'   => 'nullable|array',
            'gallery_image_new.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'name'                => 'required|string|max:255',
            'time_duration' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'size' => 'nullable|numeric|min:0',
            'adult' => 'nullable|numeric|min:0',
            'child' => 'nullable|numeric|min:0',
            'view' => 'nullable|string|max:255',
            'description'         => 'nullable|string',

        ]);


        $validated['slug'] = Str::slug($validated['name']);

        dd($validated);
        $room->update($validated);

        return response()->reportTo(
            $room,
            'Room updated successfully',
            route('admin.room.index')
        );
    }


    public function destroy(Room $room)
    {
        return response()->reportTo(
            $room->delete(),
            'Deleted successfully',
            route('admin.room.index')
        );
    }
}
