<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
        ]);

        try {
            Category::create([
                'name' => $req->name,
                'color' => $req->color,
            ]);

            return redirect()
                ->route('categories.index')
                ->with('success', 'Category added successfully.');

        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                return redirect()
                    ->back()
                    ->withErrors(['name' => 'The category name must be unique.']);
            }

            return redirect()
                ->back()
                ->withErrors(['error' => 'An error occurred while adding the category.']);
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
        ]);

        $category = Category::findOrFail($id);

        try {
            $category->update([
                'name' => $req->name,
                'color' => $req->color,
            ]);

            return redirect()->route('categories.index')
                ->with('success', 'Category updated successfully.');

        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                return redirect()
                    ->back()
                    ->withErrors(['name' => 'The category name must be unique.']);
            }

            return redirect()
                ->back()
                ->withErrors(['error' => 'An error occurred while updating the category.']);
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}

