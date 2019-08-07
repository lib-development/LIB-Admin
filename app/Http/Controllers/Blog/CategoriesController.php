<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category as CategoryRequest;
use App\Models\BlogContent;
use App\Models\Category;
use App\Http\Requests\UpdateCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getAllCategories()
    {
        $categories = Category::all();
        return view('pages.categories')->with('categories', $categories);
    }

    public function addCategory(CategoryRequest $request)
    {
        $data = $request->all();
        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->slug = str_slug($data['name']);
        $category->author_id = auth()->user()->id;
        if ($category->save()) {
            session()->flash('category', 'Category Saved!');
            return back();
        }
        session()->flash('category', 'Category could not be saved!');
        return back();
    }

    public function updateCategory(UpdateCategory $request, $id)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        unset($data['_token']);
        $category = Category::where('id', $id)
                    ->where('author_id', auth()->user()->id);
        if ($category->update($data)) {
            session()->flash('category', 'Category Updated!');
            return back();
        }
        session()->flash('category', 'Category could not be updated!');
        return back();
    }

    public function removeCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            if ($category->id === 1) {
                session()->flash('category', 'Category cannot be removed!');
                return back();
            }
            $category->delete();
            session()->flash('category', 'Category removed!');
            return back();
        }
        session()->flash('category', 'Category could not be removed!');
        return back();
    }

    public function viewCategory(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        if ($category) {
            // $articles = BlogContent::where('category_id', '=', $id)->orderBy('updated_at', 'DESC')->limit(10);
            $baseQuantity = 10;
            $pageQueryString = isset($data['page']) ? $data['page'] : 0;
            $skipQueryString = $pageQueryString * $baseQuantity;
            $articles = BlogContent::where('category_id', '=', $id)
                ->orderby('publish_date','desc')
                ->skip($skipQueryString)
                ->limit($baseQuantity)
                ->get();
            // dd($articles);
            $nextPage = $pageQueryString == 0 ? 1 : $pageQueryString + 1;
            $backPage = $pageQueryString <= 0 ? 0 : $pageQueryString - 1;
            $nextSearch = '?page=' . $nextPage;
            $backSearch = '?page=' . $backPage;
            return view('pages.view_category')->with(compact('category', 'articles', 'nextSearch', 'backSearch'));
        }
        session()->flash('category', 'Category not found!');
        return back();
    }
}
