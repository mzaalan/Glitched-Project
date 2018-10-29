<?php

namespace App\Http\Controllers;

use App\User;

use App\Mail\MembershipPurchased;

use App\Mail\EventPurchased;

use App\Membership;

use Mail;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

use Carbon\carbon;



class MembershipsController extends Controller

{

    


    const EMAIL1 = 'example@example.com';
    const EMAIL2 = 'example@example.com';
    const EMAIL3 = 'example@example.com';
    const EMAIL4 = 'example@example.com';
    const EVENTTEST = 'example@example.com';
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        if(Auth::check()){

            $amount = $request->input('memtype');

            if($amount === '50')

            {

                return view('membership.index50');    

            } 

           else if($amount === '250')

            {

                return view('membership.index250'); 

            }

        }

    }

        

    public function eventIndex(Request $request){

        $amount = 8200; //in cents , actual $35.00 CHANGE WHEN NECESSARY
        $vipAmount = 10300;
        $kidsAmount = 4000;

        $quantity = $request->input('ticket');

        $email = $request->input('email');

        $phone = $request->input('phone');

        $name = $request->input('name');
        $vip = $request->input('vip');

        $kids = $request->input('kids');

        return view('membership.event' , compact('kidsAmount', 'kids', 'amount', 'quantity', 'name', 'phone', 'vip', 'vipAmount', 'email'));
    }



    public function eventConfirm(Request $request){
        $kidsAmount  = $request->get('kidsAmount');
        $kids = $request->get('kids');
        $amount = $request->get('amount');
        $quantity = $request->get('quantity');
        $name = $request->get('name');
        $phone = $request->get('phone');
        $vip = $request->get('vip');
        $vipAmount = $request->get('vipAmount');
        $email = $request->get('email');

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $token  = $_POST['stripeToken'];

        $email  = $_POST['stripeEmail'];

      

        $customer = \Stripe\Customer::create(array(

            'email' => $email,

            'source'  => $token

        ));



        $charge = \Stripe\Charge::create(array(

            'customer' => $customer->id,

            "description" => "Event Ticket",

            "amount" => ($amount*$quantity+$kidsAmount*$kids+$vip*$vipAmount)*1.03,

            "currency" => "usd",

            "receipt_email" => $request->email,     

            "customer" => $customer->id,  

        ));

        $sendEmail = new EventPurchased($amount/100, $quantity, $kidsAmount/100, $kids, $name, $email, $phone, $vip, $vipAmount/100);

        Mail::to($email)
        ->bcc(self::EMAIL1)
        ->bcc(self::EMAIL2)
        ->bcc(self::EMAIL3)
        ->bcc(self::EMAIL4)
        ->send($sendEmail);

        
        $sendEmailTemp = new EventPurchased($amount/100, $quantity, $kidsAmount/100, $kids, $name, $email, $phone, $vip, $vipAmount);

        Mail::to(self::EVENTTEST)->send($sendEmailTemp);

        // return redirect()->guest(route('thanks'));
        return view('pages.thanks');
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store50(Request $request)

    {

        

        // Set your secret key: remember to change this to your live secret key in production

        // See your keys here: https://dashboard.stripe.com/account/apikeys

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        

        // Token is created using Checkout or Elements!

        // Get the payment token ID submitted by the form:

        $token = $_POST['stripeToken'];



        $customer = \Stripe\Customer::create(array(

            "email" => $request->email,

            "source" => $token

        ));

        

        $membership = new Membership();

        // Charge the user's card:

        $charge = \Stripe\Charge::create(array(

        "currency" => "usd",

        "amount" => 5150,        

        "customer" => $customer->id,      

        "receipt_email" => $request->email,           

        "description" => "Yearly GA-APPNA Membership",

        ));

       

        if(Auth::check()){

           

            $user = User::find(Auth()->user()->id);

            if($user){

                $user->stripe_id = $charge->id;

                $user->ends_at=now('EST')->addDays(365);

                $user->memtype = 'annual';                

                $user->card_last_four=$charge->source->last4;

                $user->save();

            }

            $sendEmail = new MembershipPurchased($user, 51.50);

            Mail::to($request->user()->email)->send($sendEmail);

            Mail::to(self::EMAIL1)->send($sendEmail);

            Mail::to(self::EMAIL2)->send($sendEmail);

            

            $membership = Membership::create([

                'name'=>Auth::user()->fname.' '.Auth::user()->lname,

                'stripe_id'=>$charge->id,

                'stripe_plan'=>'annual membership',

                'ends_at'=>now('EST')->addDays(365),

                'user_id'=>Auth::user()->id

            ]);       

            if($membership){

                return redirect()->route('home')

                ->with('success' , 'Membership bought successfully');

            }

        }

    }

    

    public function store250(Request $request)

    {

        // Set your secret key: remember to change this to your live secret key in production

        // See your keys here: https://dashboard.stripe.com/account/apikeys

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));



        $token  = $_POST['stripeToken'];

        $email  = $_POST['stripeEmail'];

      

        $customer = \Stripe\Customer::create(array(

            'email' => $email,

            'source'  => $token

        ));



        $charge = \Stripe\Charge::create(array(

            'customer' => $customer->id,

            "description" => "Lifetime GA-APPNA Membership",

            "amount" => 25750,

            "currency" => "usd",

            "receipt_email" => $request->email,     

            "customer" => $customer->id,  

        ));

        if(Auth::check()){

            $user = User::find(Auth()->user()->id);

            if($user){

                $user->stripe_id = $charge->id;

                $user->memtype = 'lifetime';

                $user->ends_at=now()->addDays(7300);

                $user->card_last_four= $charge->source->last4;                

                $user->save();

            }

            $sendEmail = new MembershipPurchased($user, 257.50);

            Mail::to($request->user()->email)->send($sendEmail);

            Mail::to(self::EMAIL1)->send($sendEmail);

            Mail::to(self::EMAIL2)->send($sendEmail);

            



            $membership = Membership::create([

                'name'=>Auth::user()->fname.' '.Auth::user()->lname,

                'stripe_id'=>$charge->id,

                'stripe_plan'=>'lifetime membership',

                'ends_at'=>now()->addDays(7300),

                'user_id'=>Auth::user()->id

            ]);       

            if($membership){

                return redirect()->route('home')

                ->with('success' , 'Membsership bought successfully');

            }

        }

        

    }



  



    /**

     * Display the specified resource.

     *

     * @param  \App\Membership  $membership

     * @return \Illuminate\Http\Response

     */

    public function show(Membership $membership)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Membership  $membership

     * @return \Illuminate\Http\Response

     */

    public function edit(Membership $membership)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Membership  $membership

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Membership $membership)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Membership  $membership

     * @return \Illuminate\Http\Response

     */

    public function destroy(Membership $membership)

    {

        //

    }

}

