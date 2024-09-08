<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Itemcarat;

class ItemController extends Controller
{
    //
    public function getItem()
    {
        return View('btob.pages.items');
    }

    public function getItems(Request $request)
    {
        $data = $request->all();
        $maxData = $data['maxData'];
        $offsetData = $data['offsetData'];
        $dataCount = Item::dataCount();
        $data = Item::where('user_id',Auth::user()
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

    public function createItems(Request $request)
    {
        $data = $request->all();
        $item = new Item;
        $item->itemname= $data['itemname'];
        $item->active = 1;
        $item->user_id = Auth::user()->id;
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');       
        if($item->save()){
            $data = [
                'status'=>true,
                'message'=>'Created'
            ];
            return View('btob.pages.items',$data);
        }else{
            $data = [
                'status'=>false,
                'message'=>'failed to created'
            ];
            return View('btob.pages.items',$data);
        }
        
    }

    public function getItemCarate()
    {
        $data = [];
        return View('btob.pages.carate',$data);
    }

    public function createNewCarate(Request $request)
    {
        $data = $request->all();
        $itemcarate = new Itemcarat;
        $itemcarate->itemcarat= $data['itemcarat'];
        $itemcarate->item_id= $data['item_id'];
        $itemcarate->active = 1;
        $itemcarate->user_id = Auth::user()->id;
        $itemcarate->created_at = date('Y-m-d H:i:s');
        $itemcarate->updated_at = date('Y-m-d H:i:s');       
        if($itemcarate->save()){
            $data = [
                'status'=>true,
                'message'=>'Created'
            ];
            
        }else{
            $data = [
                'status'=>false,
                'message'=>'failed to created'
            ];
            
        }
        return redirect()->to('btob/item/getItemCarate');
    }

    public function fetchCarateItems(Request $request)
    {         
        $data = $request->all();
        $maxData = $data['maxData'];
        $offsetData = $data['offsetData'];
        $dataCount = Itemcarat::dataCount();
        $data = Itemcarat::with('item')
            ->where('user_id',Auth::user()->id)
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
