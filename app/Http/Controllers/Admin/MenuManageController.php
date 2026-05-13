<?php

namespace App\Http\Controllers\Admin;

use App\Enums\IsAgreeStatus;
use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\MenuManage;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuManageController extends Controller
{
    public function index(Request $request)
    {
        $menuManages = MenuManage::oldest('serial')->get();
        $editMenu = null;
        if ($request->has('id')) {
            $editMenu = MenuManage::findOrFail($request->id);
        }

        return view('admin.menu-manage.index', compact('menuManages', 'editMenu'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'serial' => 'nullable|integer',
            'menu_type' => 'nullable|integer',
        ]);

        $validated['slug'] = generateSlug(MenuManage::class, $validated['name']);

        return response()->reportTo(
            MenuManage::create($validated),
            'Created successfully',
            route('admin.menu-manage.index')
        );
    }

    public function show($id)
    {
        $menuMange = MenuManage::with('menuItems')->findOrFail($id);
        $menuManages = MenuManage::oldest('serial')->get();


        // সব used page_id collect করো
        $usedPageIds = $menuMange->menuItems
            ->pluck('page_id')
            ->filter()
            ->unique()
            ->toArray();

        // unused pages
        $pages = Page::whereNotIn('id', $usedPageIds)->get();
        return view('admin.menu-manage.show', compact('menuMange', 'menuManages', 'pages'));
    }


    public function update(Request $request, MenuManage $menuManage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'serial' => 'nullable|integer',
            'menu_type' => 'nullable|integer',
        ]);

        $validated['slug'] = generateSlug(MenuManage::class, $validated['name'], $menuManage);

        return response()->reportTo(
            $menuManage->update($validated),
            'Update successfully',
            route('admin.menu-manage.index')
        );
    }


    public function dynamicMenuStore(Request $request)
    {
        $rules = [
            'is_custom' => 'nullable|integer',
            'serial' => 'nullable|integer',
            'status' => 'nullable|integer',
            'menu_manage_id' => 'required|integer|exists:menu_manages,id',
        ];

        if ($request->is_custom == IsAgreeStatus::Yes) {
            $rules['name'] = 'required|string';
            $rules['slug'] = 'nullable|string';

        } else {
            $rules['page_id'] = 'required|integer|exists:pages,id';
        }

        $validated = $request->validate($rules);


        if ($request->is_custom == IsAgreeStatus::Yes) {
            $validated['slug'] = !empty($validated['slug'])
                ? generateSlug(MenuItem::class, $validated['slug'])
                : generateSlug(MenuItem::class, $validated['name']);
        }

        return response()->reportTo(
            MenuItem::create($validated),
            'Add successfully',
            route('admin.menu-manage.show', $validated['menu_manage_id'])
        );
    }

    public function dynamicMenuDestroy($menu_manage_id, $id)
    {
        $menu = MenuItem::findOrFail($id);
        return response()->reportTo(
            $menu->delete(),
            'Delete successfully',
            route('admin.menu-manage.show', $menu_manage_id)
        );
    }

}
