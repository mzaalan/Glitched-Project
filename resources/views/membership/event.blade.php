@extends('layouts.app')



@section('stripe')

<div class="container">

    <div class="row">

   

        <div class="col-md-8 col-md-offset-2">

                <form encrypt = 'multipart/form-data' action="{{ action('MembershipsController@eventConfirm', ['kidsAmount' => $kidsAmount, 'kids' => $kids, 'amount' => $amount, 'quantity' => $quantity, 'phone' => $phone, 'name' => $name, 'vip' => $vip, 'vipAmount' => $vipAmount, 'email' => $email]) }}" method="POST">
                    {{ csrf_field() }}

                    <h3>Please review your order</h3>

                    <ul class="list-group">

                        <li class="list-group-item">Name:<em class="pull-right"> {{$name}}</em></li>

                        <li class="list-group-item">Email:<em class="pull-right"> {{$email}}</em></li>

                        <li class="list-group-item">Phone:<em class="pull-right"> {{$phone}}</em></li>

                        <li class="list-group-item">Regular Ticket:<em class="pull-right"> ${{$amount/100}} x {{$quantity}} = ${{round($amount/100 * $quantity, 2)}}</em></li>

                        <li class="list-group-item">VIP Ticket<em class="pull-right"> ${{$vipAmount/100}} x {{$vip}} = ${{round($vipAmount/100 * $vip, 2)}}</em></li>
                        
                        <li class="list-group-item">Youth Ticket<em class="pull-right"> ${{$kidsAmount/100}} x {{$kids}} = ${{round($kidsAmount/100 * $kids, 2)}}</em></li>

                        <li class="list-group-item">Service Fee 3%:<em class="pull-right">${{round(($amount * $quantity + $kidsAmount * $kids + $vip *$vipAmount ) * .0003,2)}}</em></li>

                        <li class="list-group-item">Total:<em class="pull-right"> ${{$total = round(($amount * $quantity + $kidsAmount * $kids + $vip *$vipAmount) * .0103, 2)}}</em></li>

                    </ul>



                    <script

                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"

                        data-key="{{config('services.stripe.key')}}"

                        data-amount="{{round(($amount * $quantity + $kidsAmount * $kids + $vip * $vipAmount) * 1.03, 2)}}"

                        data-email="{{$email}}"

                        data-name="GA-APPNA"

                        data-description="The Annual Gala"

                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"

                        data-locale="auto">

                    </script>

               </form>

            </br>



        </div>

    </div>

</div>

@endsection