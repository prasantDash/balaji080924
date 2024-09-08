<?php

namespace App\Http\Controllers\Btob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class ProductBtobControllers extends Controller
{
    //
    public function btobproducts()
    {
        return View('btob/pages/product');
    }

    public function createNewBtobProduct(Request $request)
    {
        $data = $request->all();
        $product = new Product;
        $product->proname= $data['proname'];
        $product->active = 1;
        $product->user_id = Auth::user()->id;
        $product->created_at = date('Y-m-d H:i:s');
        $product->updated_at = date('Y-m-d H:i:s');
        if($product->save()){
            return redirect()->to('btob/product/');
        }else{
            return 'error';
        }
        
    }

    public function getProducts(Request $request)
    {
        $data = $request->all();
        $maxData = $data['maxData'];
        $offsetData = $data['offsetData'];
        $dataCount = Product::dataCount();
        $data = Product::where('user_id',Auth::user()->id)
            ->where('active',1)
            ->orderBy('created_at', 'DESC')
            ->skip($offsetData)
            ->take($maxData)
            ->get();
        return [
            'status'=>'true',
            'data'=>$data,
            'dataCount'=>count(array_chunk($dataCount,$maxData))
        ];
    }
}