<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
	private $productModel;
	
	public function __construct(Product $productModel)
	{
		$this->productModel = $productModel;
	}
	
    public function index()
	{
		$products = $this->productModel->paginate(10);
		
		return view('products.index', compact('products'));
	}
	
	public function create(Category $category)
	{
		$categories = $category->lists('name', 'id');
		
//		return view('products.create');
		return view('products.create', compact('categories'));
	}
	
	public function store(ProductRequest $request)
	{
		$input = $request->all();
		
        $arrayTags = $this->tagToArray($input['tags']);

//		$product = $this->productModel->fill($input);

        $product = $this->productModel->create($request->all());

        $product->tags()->sync($arrayTags);
		
		$product->save();

		return redirect()->route('products');
//		return redirect('products');
	}
	
	public function edit($id, Category $category)
	{
		$categories = $category->lists('name', 'id');

		$product = $this->productModel->find($id);
		
		return view('products.edit', compact('product'), compact('categories'));
	}
	
	public function update(Requests\ProductRequest $request, $id)
	{
		$this->productModel->find($id)->update($request->all());

		$input = $request->all();

        $arrayTags = $this->tagToArray($input['tags']);

		//        $arrayTags = $this->tagToArray($input['tags']);

        $product = Product::find($id);

        $product->tags()->sync($arrayTags);
		
		return redirect()->route('products');
	}
	
	public function destroy($id)
	{
		$this->productModel->find($id)->delete();
		
		return redirect()->route('products');
	}
	
	public function images($id)
	{
		$product = $this->productModel->find($id);

		return view('products.images', compact('product'));
	}
	
	public function createImage($id)
	{
		$product = $this->productModel->find($id);
		
		return view('products.create_image', compact('product'));
	}
	
	public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
	{
		$file = $request->file('image');
		$extension = $file->getClientOriginalExtension();
		
		$image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);
		
		Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
		
		return redirect()->route('products.images', ['id'=>$id]);
	}
	
	public function destroyImage(ProductImage $productImage, $id)
	{
		$image = $productImage->find($id);
		
		if (file_exists(public_path() . '/uploads/'.$image->id.'.'.$image->extension))
    		  Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
		
		$product = $image->product;
		$image->delete();
		
		return redirect()->route('products.images', ['id'=>$product->id]);
	}

    private function tagToArray($tags)
    {
        $tags = explode(",", $tags);
        $tags = array_map('trim', $tags);
        $tagCollection = [];
		
		foreach ($tags as $tag)
		{
            $t = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagCollection, $t->id);
        }
		
        return $tagCollection;
    }

}
