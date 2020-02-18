<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Shops;
use App\Category;

use Exception;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Products::with(['shop','category'])->get()->toArray();
        $data = Products::with(['shop','category'])->paginate(3)->toArray();

        
        // echo '<pre>';
        // print_r($data);
        // die;
        return view('produtcs', ['data' => $data]);
    }


     public function orderPost(Request $request)
    {
            $user = User::find(3);
            $input = $request->all();
            $token = $input['stripeToken'];
            
            try {
                $user->subscription($input['plane'])->create($token,[
                        'email' => $user->email
                    ]);
                return back()->with('success','Subscription is completed.');
            } catch (Exception $e) {
                return back()->with('success',$e->getMessage());
            }
            
    }


    public function createProdutcs()
    {
        $shop = Shops::get()->toArray();
        $category = Category::get()->toArray();

        return view('createProdutcs', ['shop' => $shop , 'category'=> $category]);
    }

    public function saveProdutcs(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die;

        // $data = $this->validate($request, [
        //     'name'=>'required',
        //     'price'=> 'required'
        // ]);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->shop_id = $request->shop_id;
        $product->category_id = $request->category_id;

        $image = $request->file('image');
        $product->image = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $product->image);

        $product->save();
        return redirect('/produtcs')->with('success', 'successfully saved!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProdutcs($id)
    {
        $data = Products::where('id', $id)->first();

        $shopdata = Shops::get()->toArray();
        $categorydata = Category::get()->toArray();
        //    echo '<pre>';
        // print_r($data);
        // die;
        return view('editProdutcs', ['data' => $data, 'shopdata' => $shopdata, 'categorydata'=> $categorydata]);
    }

    public function updateProdutcs(Request $request)
    {

        $product = Products::find($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->shop_id = $request->shop_id;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/produtcs')->with('success', 'successfully saved!');
    }

    public function deleteProdutcs($id){
        $data = Products::where('id',($id))->first();
        $data->delete();
        return redirect('/produtcs');
    }
}
