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
                <div class="card-header">Add New City</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('alert-success'))
                        <div class="alert alert-success">
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif
                    @if($errors->any())
                    	@foreach($errors->all() as $single_error)
                            <div class="is-danger">
                                {{-- $single_error --}}
                            </div>
                        @endforeach
                    @endif
					<div class="user_role_form">
                    	<form method="post" action="{{ route('citymaster.store') }}" enctype="multipart/form-data">
                        	<div class="form-group">
                              @csrf
                              <label for="state_id">Select State:</label>
                              <select class="form-control" name="state_id">
                              	<option value="">Select State</option>
                                @foreach($states as $state)
                                	<option value="{{ $state->id}}">{{ $state->statename}}</option>
                                @endforeach
                              </select>
                               {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
                          </div>
                          <div class="form-group">
                              <label for="city_name">City Name:</label>
                              <input type="text" class="form-control" name="city_name" value="{{ old('city_name') }}" />
                               {!! $errors->first('city_name', '<p class="help-block">:message</p>') !!}
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