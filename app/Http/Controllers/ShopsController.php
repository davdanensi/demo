<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Shops;
use App\Products;


class ShopsController extends Controller
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
        //$shops = Shops::with('products')->get()->toArray();

        $value = 500;

        //$shops = Shops::with(['products' => function ($q) use ($value) {
            // Query the name field in products table
           // $q->where('price', '>', $value)
               // ->Where('status', '1'); // '=' is optional
        //}])->get()->toArray();


        $shops = Shops::with('products', 'products.category')
                   ->get()->toArray();

        echo "<pre>";
        print_r($shops);
        die;

        //    dd($shops); 
        return view('shops', ['shops' => $shops]);
    }

    public function createshops()
    {
        return view('createShops');
    }


    public function saveShops(Request $request)
    {


        // $validator = Validator::make($request->all(), [
        //    'name' => 'required|max:255',
        //     'address' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('/create_shops')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ]);



        $shops = new Shops();

        $shops->name = $request->name;
        $shops->address = $request->address;

        $shops->save();
        return redirect('/shops');
    }

    public function editShops($id)
    {
        $data = Shops::where('id', ($id))->first()->toArray();
        return view('editShops', ['data' => $data]);
    }

    public function updateShops(Request $request)
    {

        $shops = Shops::find($request->id);

        $shops->name = $request->name;
        $shops->address = $request->address;

        $shops->save();
        return redirect('/shops')->with('success', 'successfully saved!');
    }

    public function deleteShops($id)
    {
        $data = Shops::where('id', ($id))->first();
        $data->delete();
        return redirect('/shops');
    }

    public function testRelationship()
    {
        $Products = Products::with('shop')->get()->toArray();
        $Shops = Shops::with('products')->get()->toArray();
        // echo "<pre>";
        // print_r($Shops);
        // print_r($Products);
        // die;
        return view('testRelationship');
    }
}
