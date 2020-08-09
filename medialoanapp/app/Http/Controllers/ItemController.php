<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Input;



class ItemController extends Controller
{
    //
    public function showItems()
    {
        $this->authorize('items');
        $items = Item::all();
        return view('content.item', ['items' => $items]);
    }

    public function navigateCreate()
    {
        $this->authorize('uitleendienst');
        $items = Item::all();
        return view('content.createitem', ['items' => $items]);
    }

    public function createItem(Request $req)
    {
        $this->authorize('uitleendienst');

            Item::create([
                'name' => $req->name,
                'packageitems' => $req->packageitems,
                'instructions' => $req->instructions,
                'description' => $req->description,
                'additionalinfo' => $req->additionalinfo,
                'itemsleft' => $req->itemsleft,
                'picture' => $req->picture,
            ]);

        return redirect()->action('ItemController@showItems');
    }

    public function deleteItem($id)
    {
        $this->authorize('uitleendienst');
        $items = Item::find($id);
        $items->delete();
        return redirect('/items');
    }

    public function navigateEditItem($id)
    {
        $this->authorize('uitleendienst');
        $items = Item::find($id);
        return view('content.edititem', ['items' => $items]);
    }

    public function editItem(Request $req, $id)
    {
        $this->authorize('uitleendienst');
        $req->validate([
            'name'=>'required',
            'packageitems'=>'required',
            'instructions'=>'required',
            'description'=>'required',
            'additionalinfo'=>'required',
            'itemsleft'=>'required',
            'picture'=>'required',

        ]);

        $items = Item::find($id);
        $items->name =  $req->get('name');
        $items->packageitems = $req->get('packageitems');
        $items->instructions = $req->get('instructions');
        $items->description = $req->get('description');
        $items->additionalinfo = $req->get('additionalinfo');
        $items->itemsleft = $req->get('itemsleft');
        $items->picture = $req->get('picture');
        $items->save();

        return redirect('/items');
    }

    public function navigateItem($id)
    {
        $this->authorize('user');
        $items = Item::find($id);
        return view('content.navigateitem', ['items' => $items]);
    }

}
