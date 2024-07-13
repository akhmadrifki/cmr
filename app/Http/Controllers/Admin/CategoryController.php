<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Akhmad\LaravelAdminCore\Actions\Category\CategoryCreateAction;
use Akhmad\LaravelAdminCore\Actions\Category\CategoryUpdateAction;
use Akhmad\LaravelAdminCore\Data\Category\CategoryCreateData;
use Akhmad\LaravelAdminCore\Data\Category\CategoryUpdateData;
use Akhmad\LaravelCategory\Models\Category;
use Akhmad\LaravelCategory\Models\CategoryType;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(CategoryType $type)
    {
        $this->authorize('adminViewAny', Category::class);
        $items = (new Category)->toTree($type->id, true);

        return view('admin.category.item.index', compact('items', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(CategoryType $type)
    {
        $this->authorize('adminCreate', Category::class);
        $item_options = Category::selectOptions($type->id, null, true);

        return view('admin.category.item.create', compact('type', 'item_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreateData $data, CategoryType $type, CategoryCreateAction $categoryCreateAction)
    {
        $this->authorize('adminCreate', Category::class);
        $categoryCreateAction->handle($data, $type);

        return redirect()->route('admin.category.type.item.index', $type->id)
            ->with('message', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(CategoryType $type, Category $item)
    {
        $this->authorize('adminUpdate', $item);
        $item_options = Category::selectOptions($type->id, $item->parent_id ?? $item->id);

        return view('admin.category.item.edit', compact('type', 'item', 'item_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdateData $data, CategoryType $type, Category $item, CategoryUpdateAction $categoryUpdateAction)
    {
        $this->authorize('adminUpdate', $item);
        $categoryUpdateAction->handle($data, $item);

        return redirect()->route('admin.category.type.item.index', $type->id)
            ->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Akhmad\LaravelCategory\Models\Category  $typeItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CategoryType $type, Category $item)
    {
        $this->authorize('adminDelete', $item);
        $item->delete();

        return redirect()->route('admin.category.type.item.index', $type->id)
            ->with('message', __('Category deleted successfully'));
    }
}
