<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Transactions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(): JsonResponse
    {
        $cards = Card::all();

        return response()->json($cards);
    }
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'card_number' => 'required|string|max:255',
            'expiry_year' => 'required|string|max:255',
            'expiry_month' => 'required|string|max:255',
            'cvv' => 'required|integer',
            'amount' => 'required|integer',
            'isSaved' => 'required|boolean',
        ]);

        $card = new Card();
        $transactions = new Transactions();

        $isSaved = $validatedData['isSaved'];

        if($isSaved){
            $card->card_number = $validatedData['card_number'];
            $card->expiry_year = $validatedData['expiry_year'];
            $card->expiry_month = $validatedData['expiry_month'];
            $card->cvv = $validatedData['cvv'];

            $card->save();
        }

        $transactions->card_number = $validatedData['card_number'];
        $transactions->amount = $validatedData['amount'];
        
        $transactions->save();


        return response()->json($transactions, 201, ['message' => 'Card created']);
    }
}
