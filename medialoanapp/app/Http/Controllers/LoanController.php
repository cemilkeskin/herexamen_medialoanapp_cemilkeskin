<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Item;
use App\Loan;
use App\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    //
    public function createLoan(Request $req, $id, $id2)
    {
        $this->authorize('user');

        $items = Item::find($id);
        $users = User::find($id2);


        $itemIDDB = $items->id;
        $itemNameDB = $items->name;
        $userIDDB = $users->id;
        $userEmailDB = $users->email;

        $date = strtotime($req->dateStart);
        $date = strtotime("+7 day", $date);

//        $findLoan = Loan::find($userEmailDB);

            Loan::create([
                'userID' => $userIDDB,
                'email' => $userEmailDB,
                'itemID' => $itemIDDB,
                'name' => $itemNameDB,
                'dateStart' => $req->dateStart,
                'dateEnd' =>  date('Y-m-d', $date),
                'comments' => $req->comments,
            ]);

            return redirect()->action('ItemController@showItems');

    }
}
