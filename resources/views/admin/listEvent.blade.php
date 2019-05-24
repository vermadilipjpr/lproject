@extends('layouts.adminlayout')

@section('content')
<div class="container">
	<ul class="crud_navigation">
    	<li><a href="{{ route('createnewsevents') }}">Add Record</a></li>
        <li><a href="{{ route('listallnewsevents') }}">List Records</a></li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News & Events</div>
                <div class="card-body">
					<div class="user_role_form">
                    @if(session()->has('alert-success'))
                        <div class="alert alert-success">
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif
                    @if(session()->has('alert-error'))
                        <div class="alert alert-error">
                            {{ session()->get('alert-error') }}
                        </div>
                    @endif
                    	<table border="0" cellpadding="10" cellspacing="10">
                        @foreach ($all_records as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->ne_title }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->ne_content }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('editnewsevents', $task->id) }}">Edit</a> | <a href="#" class="deleteme" data-id="{{ $task->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(e) {
		jQuery('.deleteme').click(function(e){
			jQuery.ajax({
				url: "{{ route('deletenewsevents') }}",
				method: 'post',
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					rid: jQuery(this).data("id")
				},
				success: function(result){
					console.log(result);
					/* Re-Load the page to refresh the list. */
					location.href = location.href;
				}
			});
		});
    });
</script>

@endsection