<?php

namespace App\Http\Controllers\Btob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Purchase;

class PurchesBtoBController extends Controller
{
    //
    public function btobPurches()
    {
        return View('btob/pages/purches');
    }

    public function getPurchesList(Request $request)
    {
        $data = $request->all();
        $maxData = $data['maxData'];
        $offsetData = $data['offsetData'];
        $dataCount = Purchase::dataCount();
        $data = Purchase::with(['productdetail','purchesitem','purchescarat'])->where('user_id',Auth::user()
            ->id)->where('active',1)
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

    public function createNewPurches(Request $request)
    {
        $validated = $request->validate(
            [
                'amount' => 'required',
                'product_id'=>'required',
                'item'=>'required',
                'carat'=>'required',
                'weight'=>'required',
                'less'=>'required',
                'lobour'=>'required',
                'feiue'=>'required'
            ],
            [
                'amount.required' => 'Add amount!',
                'product_id.required' => 'Please select product from dropdown!',
                'item.required' => 'Please select Item from dropdown!',
                'carat.required' => 'Please select Carate from dropdown!',
                'weight.required' => 'Please add item weight!',
                'less.required' => 'Please add less weight!'
            ]
        );
        if ($validated) {
            $data = $request->all();
            $grandTotal = ($data['amount'] * $data['netweight']) + $data['lobour'];


            $purchase = new Purchase();
            $purchase->prod_id = $data['product_id'];
            $purchase->user_id = Auth::user()->id;
            $purchase->amount = $data['amount'];
            $purchase->item = $data['item'];
            $purchase->weight = $data['weight'];
            $purchase->less = $data['less'];
            $purchase->netweight = $data['netweight'];
            $purchase->tunch = $data['tunch'];
            $purchase->lobour = $data['lobour'];
            $purchase->feiue = $data['feiue'];

            $purchase->active = 1;
            $purchase->created_at = date('Y-m-d H:i:s');
            $purchase->updated_at = date('Y-m-d H:i:s');
            $purchase->carat = $data['carat'];
            $purchase->grandTotal = $grandTotal;
            if($purchase->save()){
                return redirect()->to('btob/purches');
            }
        } else {
            return $validated;            
        }
    }

    public function createPurches()
    {
        return View('btob/pages/purchesfrom');
        
    }
}
