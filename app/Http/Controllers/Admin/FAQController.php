<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(FAQ::latest())
                ->addIndexColumn()
                ->addColumn('question', fn($row) => $row->question)
                ->addColumn('answer', function ($row) {
                    return Str::limit($row->answer, 80, '....');
                })
                ->rawColumns(['answer'])
                ->toJson();
        }
        return view('admin.faq.index');
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        return response()->reportTo(
            FAQ::create($validated),
            'Created successfully',
            route('admin.faq.index')
        );
    }

    public function edit(FAQ $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }


    public function update(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        return response()->reportTo(
            $faq->update($validated),
            'Updated successfully',
            route('admin.faq.index')
        );
    }


    public function destroy(FAQ $faq)
    {
        return response()->reportTo(
            $faq->delete(),
            'Deleted successfully',
            route('admin.faq.index')
        );
    }
}
