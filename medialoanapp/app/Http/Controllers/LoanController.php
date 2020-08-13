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

            if($items->itemsleft >= 1){
                $items->itemsleft = $items->itemsleft -1;
                $items->save();
            }else{

            }

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

    public function allLoans()
    {
        $this->authorize('uitleendienst');
        $loans = Loan::all();
        return view('content.allLoans', ['loans' => $loans]);
    }

    public function deleteLoan($id, $id2)
    {
        $this->authorize('uitleendienst');
        $loans = Loan::find($id);
        $items = Item::find($id2);

        $items->itemsleft = $items->itemsleft +1;
        $items->save();

        $loans->delete();

        return redirect()->action('LoanController@allLoans')->with(['message' => 'The selected loan has been successfully deleted', 'alert' => 'alert-danger']);;

    }

    public function navigateEditLoan($id)
    {
        $this->authorize('uitleendienst');
        $loans = Loan::find($id);
        return view('content.editloan', ['loans' => $loans]);
    }

    public function editLoan(Request $req, $id)
    {
        $this->authorize('uitleendienst');
        $req->validate([
            'extendLoan'=>'required',
        ]);

        $loans = Loan::find($id);

        $date = strtotime($req->dateStart);
        $date = strtotime("+7 day", $date);

        $date = strtotime($loans->dateStart);
        $dateEnd = $req->get('extendLoan');
        $date = strtotime('+ '.$dateEnd.' week', $date);
        $loans->dateEnd =  date('Y-m-d', $date);
        $loans->save();

        return redirect()->action('LoanController@allLoans')->with(['message' => 'The selected loan has been successfully edited', 'alert' => 'alert-warning']);;
    }

}
