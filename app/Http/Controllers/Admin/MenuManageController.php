<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterMenu;
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
        $menuMange = MenuManage::with('menus')->findOrFail($id);
        $menuManages = MenuManage::oldest('serial')->get();
        $pages = Page::whereNotIn('id', function ($query) use ($menuMange) {
            $query->select('page_id')
                ->from('footer_menus')
                ->where('menu_manage_id', $menuMange->id);
        })->get();
        // dd($menuMange);

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


    public function footerMenuStore(Request $request)
    {
        $validated = $request->validate([
            'menu_manage_id' => 'required|integer|exists:menu_manages,id',
            'page_id' => 'required|integer|exists:pages,id',
            'serial' => 'nullable|integer',
        ]);

        return response()->reportTo(
            FooterMenu::create($validated),
            'Add successfully',
            route('admin.menu-manage.show', $validated['menu_manage_id'])
        );
    }

    public function footerMenuDestroy($menu_manage_id, $id)
    {
        $footerMenu = FooterMenu::findOrFail($id);
        return response()->reportTo(
            $footerMenu->delete(),
            'Delete successfully',
            route('admin.menu-manage.show', $menu_manage_id)
        );
    }

}
