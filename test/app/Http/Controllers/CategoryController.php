<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        return view('Category.add');
    }
    public function index()
    {
        $category = $this->category->oldest()->paginate(5);
        return view('Category.index', compact('category'));
    }
    // fun store
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->Activi== 1)
        {
            $this->category->create([
                'name' => $request->name, 
                'status' => 1,
            ]);
        }
        else
        {
            $this->category->create([
                'name' => $request->name, 
                'status' => 0,
            ]);
        }
      
        return redirect()->route('category.index'); 

    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('Category.edit', compact('category'));
    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('category.index');
    }
    public function update($id, Request $request)
    {
            $this->category->find($id)->update([
            'name' => $request->name,
            'status' => $request->Activi,
          ]);

        
      
        return redirect()->route('category.index');
    }
}
