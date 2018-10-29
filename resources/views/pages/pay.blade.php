@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('membership.index')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('memtype') ? ' has-error' : '' }}">
                            <label for="memtype" class="col-md-4 control-label">Select Membership</label>

                            <div class="col-md-6">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="memtype" id="memtype" value="50"  @if(old('memtype') === 50 ) checked="checked" @endif>Yearly Membership $50
                                </label>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="memtype" id="memtype" value="250" @if(old('memtype') === 250 ) checked="checked" @endif>Lifetime Membership $250
                                </label>
                                @if ($errors->has('memtype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('memtype') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Proceed
                                    </button>
                                </div>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection