@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-2"></div>

    <div class = "col-sm-8">

        <h3>The Annual Gala 2018</h3>

        <!-- <img src="img/event/eid.png" alt="" style="width:600px"> -->
        <div class="alert alert-danger" role="alert">
  <strong>Ticket Purchase is currently under construction. Please do not make purchases.</strong>
</div>
  

        <br>

        <button class="btn btn-success" data-toggle="collapse" data-target="#payment" style="margin:10px;">BUY TICKETS</button>

        <div id="payment" class="collapse">

            <form action="{{route('membership.eventIndex')}}" method="POST">

                {{ csrf_field() }}

                <div class="col-md-6">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label for="name" class="control-label">Your Full Name</label>

                        <input name="name"  value="{{ old('name') }}" required autofocus class="form-control" type="text">

                        @if ($errors->has('fname'))

                            <span class="help-block">

                                <strong>{{ $errors->first('name') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <label for="email" class="control-label">Your Email</label>

                        <input name="email"  value="{{ old('email') }}" required autofocus class="form-control" type="email">

                        @if ($errors->has('fname'))

                            <span class="help-block">

                                <strong>{{ $errors->first('email') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                        <label for="phone" class=" control-label">Your Phone</label>

                        <input name="phone"  value="{{ old('phone') }}" required autofocus class="form-control" type="text">

                        @if ($errors->has('fname'))

                            <span class="help-block">

                                <strong>{{ $errors->first('phone') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>

                <div class="col-md-6">

                    <label for="ticket" class="control-form" name="ticket" id="ticket">Number of Regular Tickets</label>

                    <select name="ticket" class="form-control" onchange="return postSelection(this)">

                    

                        <option value="0" @if(old('ticket') === 0) selected @endif> 0 </option>
                        <option value="1" @if(old('ticket') === 1) selected @endif> 1 </option>

                        <option value="2" @if(old('ticket') === 2) selected @endif> 2 </option>

                        <option value="3"@if(old('ticket') ===  3) selected @endif> 3 </option>

                        <option value="4"@if(old('ticket') ===  4) selected @endif> 4 </option>

                        <option value="5"@if(old('ticket') ===  5) selected @endif> 5 </option>

                        <option value="6"@if(old('ticket') ===  6) selected @endif> 6 </option>

                        <option value="7"@if(old('ticket') ===  7) selected @endif> 7 </option>

                        <option value="8"@if(old('ticket') ===  8) selected @endif> 8 </option>

                    </select>

                </div>

                <div class="col-md-6">

                    <label for="vip" class="control-form" name="vip" id="vip">Number of VIP Tickets</label>

                    <select disabled name="vip" class="form-control" onchange="return postSelection(this)">

                        <option  value="0" @if(old('vip') === 0) selected @endif selected> SOLD OUT </option>

                        <option value="1" @if(old('vip') === 1) selected @endif> 1 </option>

                        <option value="2"@if(old('vip') ===  2) selected @endif> 2 </option>

                        <option value="3"@if(old('vip') ===  3) selected @endif> 3 </option>

                        <option value="4"@if(old('vip') ===  4) selected @endif> 4 </option>

                    </select>
                </div>

                <div class="col-md-6 col-md-offset-6">

                    <label for="kids" class="control-form" name="kids" id="kids">Number of Youth (18+ only) Tickets</label>

                    <select name="kids" class="form-control" onchange="return postSelection(this)">

                    

                        <option selected value="0" @if(old('kids') === 0) selected @endif> 0 </option>

                        <option value="1" @if(old('kids') === 1) selected @endif> 1 </option>

                        <option value="2"@if(old('kids') ===  2) selected @endif> 2 </option>

                        <option value="3"@if(old('kids') ===  3) selected @endif> 3 </option>

                        <option value="4"@if(old('kids') ===  4) selected @endif> 4 </option>

                    </select>
                </div>

                <button class="btn btn-primary" type="submit" style="margin:10px;">Proceed</button>

            </form>                         

        </div>

    </div>

</div>

@endsection

