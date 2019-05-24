@extends('layouts.adminlayout')
@section('content')
<div class="container">
	<ul class="crud_navigation">
    	<li><a href="{{ route('latestevents.create') }}">Add Event</a></li>
        <li><a href="{{ route('latestevents.index') }}">List Events</a></li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Latest Event</div>
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
					<div class="user_role_form">
                    	<form method="post" action="{{ route('latestevents.store') }}" enctype="multipart/form-data">
                        	<div class="form-group">
                              @csrf
                              <label for="ne_title">News/Events Title:</label>
                              <input type="text" class="form-control" name="ne_title" value="{{ old('ne_title') }}" />
                               {!! $errors->first('ne_title', '<p class="help-block">:message</p>') !!}
                          </div>
                          <div class="form-group">
                              <label for="ne_content">News/Events Content:</label>
                              <input type="text" class="form-control" name="ne_content" value="{{ old('ne_content') }}"/>
                               {!! $errors->first('ne_content', '<p class="help-block">:message</p>') !!}
                          </div>
                          <div class="form-group">
                              <label for="ne_content">News/Events Content:</label>
                              <input type="file" name="ne_image" class="form-control">
                               {!! $errors->first('ne_image', '<p class="help-block">:message</p>') !!}
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