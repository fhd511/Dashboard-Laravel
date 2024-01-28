<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemgroup;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class ItemsController extends Controller
{
    public function Update(Request $request)
    {

     
        $item=Itemgroup::find($request->id);
        
        $item->Itemgroupsname=$request->namegroup;

        $item->save();
      
        return redirect('itemgroup');
    }
    public function Update2(Request $request)
    {

     
        $item=Items::find($request->id);
        
        $item->itemname=$request->name;
        $item->price=$request->price;
        $item->qty=$request->qty;
        $item->color=$request->color;
        $item->itemgroupno=$request->itemgroupno;

        $item->save();
      
        return redirect('items');
    }
    public function del($x)
    {
      $item=Itemgroup::find($x);
      
      $item->delete();

      return redirect('itemgroup');
    }
    public function del2($x)
    {
      $item=Items::find($x);
      
      $item->delete();

      return redirect('items');
    }
    public function Edit2($x)
    {
      $item=Items::where('id',$x)
      ->first();
      return view('edititems',['item'=>$item]);
    }
    public function Edit($x)
    {
      $item=Itemgroup::where('id',$x)
      ->first();
      return view('editgroupitem',['item'=>$item]);
    }
    public function GetItemGroup()
    {
        $data=Itemgroup::All();
        $issave=true;
        return view('itemgroup',['data'=>$data,'issave'=>$issave]);
    }


    public function SaveGroupsItems(Request $request)
    {
        $data=Itemgroup::create([
            'itemgroupsname'=>$request->itemgroupsname

        ]);
        $data->save();
        
        return redirect('addgritem');
    }
    public function GetItems()
    {
        $data=Items::All();
        $issave=true;
        return view('items',['data'=>$data,'issave'=>$issave]);
    }

    public function SaveItems(Request $request)
    {
        $data=Items::create([
            'itemname'=>$request->itemname,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'color'=>$request->color,
            'image'=>$request->image,
            'itemgroupno'=>$request->itemgroupno,

        ]);
        $data->save();
        
        return redirect('dashboard.additems',);
    }
    public function DisplayItems()
    {
      $data=DB::table('itemgroups')
      ->join('items','itemgroups.id','=','items.itemgroupno')
      ->get();
      return view('dashboard.controlpanel',['data'=>$data]);
    }
    public function displayadditemsgroup()
    {
      $data=Itemgroup::All();
      
      return view('dashboard.addgroupsitem',['data'=>$data]);
    }
    public function displayadditems()
    {
      $data=Items::All();
      
      return view('dashboard.additems',['data'=>$data]);
    }
    public function logout()
    {
      $this->middleware('auth');

      return redirect('login');
    }
    public function ShowItemGroup()
     {
      $data=Itemgroup::All();
      $count=$data->count();
      
      return view('welcome',['data'=>$data,'count'=>$count]);

     }
     public function Showproduct($id)
     {
      $data=Items::where('itemgroupno',$id)
      ->get();

     
      Session::put('id',$id);
      return view('showproduct',['data'=>$data]);
     }
     public function AddtoCart($id)
     {
     
      DB::table('cart')->insert(['iditem' => $id]); 
      $idgroup=Session::get('id');
      $count=DB::table('cart')->get()->count();
      Session::put('countitem',$count);
      return redirect('showproduct/'. $idgroup );

     }
     public function Checkout()
    {
      return view('checkout');
    }


}
