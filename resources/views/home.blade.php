@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hello {{auth()->user()->fname}},</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    @if (auth()->user()->verified())
                        @if(!auth()->user()->hasAddress)
                        <p>Please complete your personal detail to purchase membership by clicking My Account.</p>
                        @elseif(auth()->user()->ends_at >= now() && auth()->user()->memtype==='annual')
                        <p>Your membership ends on {{ date('Y M d', strtotime(auth()->user()->ends_at)) }}.</p>
                        @elseif(auth()->user()->memtype==='lifetime')
                        <p>You have life time membership.</p>                        
                        @else
                        <p>Please purchase your membership plan.</p>
                        @endif   
                        <?php 
                        $userid = DB::table('addresses')->select('user_id')->where('user_id', auth()->user()->id)->exists() ?>
                        @if(!$userid)
                            <a type="button" class="btn btn-success" a href="create/{{ auth()->user()->id }}">My Account</a>
                        @else
                            <a type="button" class="btn btn-success" a href="edit/{{ auth()->user()->id }}">Edit Personal Detail</a>
                            @if(auth()->user()->ends_at==NULL || (auth()->user()->ends_at <= now() && auth()->user()->memtype==='annual'))
                            <a type="button" class="btn btn-success" a href="{{route('selectmembership')}}">Purchase Membership</a>
                            @endif
                        @endif

                        {{--  <a type="button" class="btn btn-success" a href="">Membership Info</a>  --}}
                    @endif

                    
                    @if (!auth()->user()->verified())
                        <p>Please confirm your email.</p>
                        <p>Didn't receive confirmation? <a href="{{ route('resend' , auth()->user()->token) }}">click here</a> to resend.    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
