<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Item;
use App\Loan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;


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

        $loans = Loan::find($userEmailDB);

        $input['email'] = $req->get('email');
        $rules = array('email' => 'unique:loans,email');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => 'Error creating loan, please check if you do not have any active loans at the moment.', 'alert' => 'alert-danger']);
        }
        else {
            Loan::create([
                'userID' => $userIDDB,
                'email' => $userEmailDB,
                'itemID' => $itemIDDB,
                'name' => $itemNameDB,
                'dateStart' => $req->dateStart,
                'dateEnd' =>  date('Y-m-d', $date),
                'comments' => $req->comments,
            ]);

            return redirect()->action('ItemController@showItems')->with(['message' => 'Your loan has been created, for more information check the "my loans" tab', 'alert' => 'alert-success']);;
        }

    }

    public function showLoans()
    {
        $this->authorize('user');

        $loans = Loan::where('email', Auth::user()->email)->get();
        if (Loan::where('email', '=', Auth::user()->email)->exists()) {
            return view('content.loan', ['loans' => $loans]);
        }
        else{
            return redirect()->action('ItemController@showItems')->with(['message' => 'You do not have any active loans at the moment.', 'alert' => 'alert-warning']);;
        }
    }

    public function showUserLoans()
    {
        $this->authorize('uitleendienst');
        $loans = Loan::all();
        return view('content.allLoans', ['loans' => $loans]);
    }

}
