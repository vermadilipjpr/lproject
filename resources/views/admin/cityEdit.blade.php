@extends('layouts.adminlayout')

@section('content')
<div class="container">
	<ul class="crud_navigation">
    	<li><a href="{{ route('citymaster.create') }}">Add City</a></li>
        <li><a href="{{ route('citymaster.index') }}">List Cities</a></li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit State</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('alert-success'))
                        <div class="alert alert-success" id="city_alert">
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif
					<div class="user_role_form">
                    	<form method="post" action="{{ route('statemaster.update', $state->id) }}">
                        	<div class="form-group">
                              @csrf
                              <label for="state_name">State Name:</label>
                              <input type="text" class="form-control" name="state_name" value="{{ $state->statename }}" />
                               {!! $errors->first('state_name', '<p class="help-block">:message</p>') !!}
                          </div>
                          <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection