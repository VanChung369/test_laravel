<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Components\recusive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Category;
class ProductController extends Controller
{
    private $product;
    private $category;
  
    public function __construct(Product $product,Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
 
    public function index()
    {
        $products = $this->product->oldest()->paginate(5);
        return view('product.index', compact('products'));
    }
  
    public function store(Request $request)
    {
        $activi='';
       ($request->Activi==1)?$activi=1:$activi=0;
        try {

            DB::beginTransaction(); 
            $dataProductCreate = [
                'name' => $request->name,
                'category' => $request->category_id,
                'price' => $request->price,
                'amount' =>$request->quantity,
                'status' =>$activi,
            ];
            $filePath = $request->file("feature_image_path")->store('public/product');
            if (!empty($request->feature_image_path)) {
                $dataProductCreate['image'] = Storage::url($filePath);
            }
            $this->product->create($dataProductCreate);
          
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack(); // loi se rollBack
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
        return redirect()->route('product.index');
    }
    // get htmlOption
    public function getCategory()
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return $htmlOption;
    }
    // // create htmlOption
    public function create()
    {
        $htmlOption = $this->getCategory();
        return view('product.add', compact('htmlOption'));
    }
    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        
        $activi='';
      ($request->Activi==1)?$activi=1:$activi=0;
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'category' => $request->category_id,
                'price' => $request->price,
                'amount' =>$request->quantity,
                'status' =>$activi,
            ];
            if ($request->hasFile('feature_image_path'))
            {
                $filePath = $request->file("feature_image_path")->store('public/product');
                if (!empty($request->feature_image_path)) {
                    $dataProductUpdate['image'] = Storage::url($filePath);
                }
            }
            $this->product->find($id)->update($dataProductUpdate);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }
    public function delete($id)
    {
        $this->product->find($id)->delete();
        return redirect()->route('product.index');
    }
}
