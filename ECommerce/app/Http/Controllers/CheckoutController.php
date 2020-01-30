<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;

class CheckoutController extends Controller
{
    //
    public function index(){
    	return view('checkout');
    }

    public function pay() {
    	//dd(request()->all());

    	Stripe::setApiKey('pk_test_26TgbVNtqpBGMlGfMiWQhwwP00VsCvFNzY');
    	$token = request()->stripeToken;
    	$charge = Charge::create([
    		'amount'	=> Cart::total()*100/14000,
    		'currency'	=> 'usd',
    		'description'	=> 'udemy online books selling',
    		'source'	=> $token
    	]);

    	dd('your card was charged successfully');
    }
}
