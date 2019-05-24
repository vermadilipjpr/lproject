@extends('layouts.adminlayout')
@section('content')
<div class="container">
	<ul class="crud_navigation">
    	<li><a href="{{ route('statemaster.create') }}">Add State</a></li>
        <li><a href="{{ route('statemaster.index') }}">List States</a></li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New State</div>
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
                                {{ $single_error }}
                            </div>
                        @endforeach
                    @endif
					<div class="user_role_form">
                    	<form method="post" action="{{ route('statemaster.store') }}" enctype="multipart/form-data">
                        	<div class="form-group">
                              @csrf
                              <label for="state_name">State Name:</label>
                              <input type="text" class="form-control" name="state_name" value="{{ old('state_name') }}" />
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