<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Article;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sent()
    {

        $rents = Rent::where('user_id_from', auth()->id())
                ->whereHas('article', function($query) {
                    $query->where('deleted', '>=', 0);
                })
                ->latest()->get();

        return view('rent.sent', compact('rents'));
    }

    public function incoming()
    {
        $rents = Rent::where('user_id_to', auth()->id())
                ->where(function($query) {
                    $query->where('accepted', 0)
                          ->where('rejected', 0);
                })->latest()->get();


        return view('rent.incoming', compact('rents'));
    }

    public function request()
    {
        request()->validate([
            'from' => 'required|date|date_format:Y-m-d|before:to',
            'to' => 'required|date|date_format:Y-m-d|after:from'
        ]);

        $article_id = request()->route('id');
        $article = Article::find($article_id);

        $rent = new Rent();
        $rent->article_id = $article_id;
        $rent->user_id_to = $article->user_id;
        $rent->user_id_from = Auth::id();
        $rent->from = request()->input('from');
        $rent->to = request()->input('to');
        $rent->sent = true;
        $rent->save();

        return redirect()->route('sent')->with('status', 'Förfrågan skickad');

    }

    public function accept(int $id)
    {
        $accept = Rent::find($id);
        $accept->accepted = true;
        $accept->update();

        return redirect()->route('incoming');
    }

    public function reject(int $id)
    {
        $accept = Rent::find($id);
        $accept->rejected = true;
        $accept->update();

        return redirect()->route('incoming');
    }

    public function accepted()
    {
        $rents = Rent::where('user_id_to', auth()->id())
                    ->where('accepted', 1)
                    ->latest()->get();
        return view('rent.accepted', compact('rents'));
    }

    public function rejected()
    {
        $rents = Rent::where('user_id_to', auth()->id())
                    ->where('rejected', 1)
                    ->latest()->get();

        return view('rent.rejected', compact('rents'));
    }

}

