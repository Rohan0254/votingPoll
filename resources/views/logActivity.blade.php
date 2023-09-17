@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">


                <div class="card-header">{{ __('Log Activity Lists') }}</div>

                <div class="card-body">

                   <div class="container mt-5">

						<table class="table table-bordered mb-5">
							<tr>
								<th>#</th>
								<th>Subject</th>
								<th>URL</th>
								<th>Method</th>
								<th>Ip</th>
								<th width="300px">User Agent</th>
								<th>User Id</th>
							</tr>
							@if($logs->count())
								@foreach($logs as $key => $log)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $log->subject }}</td>
									<td class="text-success">{{ $log->url }}</td>
									<td><label class="label label-info">{{ $log->method }}</label></td>
									<td class="text-warning">{{ $log->ip }}</td>
									<td class="text-danger">{{ $log->agent }}</td>
									<td>{{ $log->user_id }}</td>
								</tr>
								@endforeach
							@endif
						</table>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection