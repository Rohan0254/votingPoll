@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">


                <div class="card-header">{{ __('My Voting History') }}</div>

                <div class="card-body">

                   <div class="container mt-5">
                        <table class="table table-bordered mb-5">
                            
                                <tr>
                                    <th>#</th>
                                    <th>Poll Title</th>
                                    <th>Options</th>
                                    <th>My Answer</th>
                                    <th>Vote At</th>
                                </tr>
                                @if(count($poll) <= 0)   
                                    <tr>
                                        <td colspan="4">
                                            Data Not Found.
                                        </td>
                                    </tr>
                                @endif
                                @foreach($poll as $data)
                                <tr>
                                    <td>{{ $data['id'] }}</td>
                                    <td>{{ $data['title'] }}</td>
                                    <td>{{ $data['options'] }}</td>
                                    <td class="text-success">{{ $data['ans'] }}</td>
                                    <td>{{ $data['vote_at'] }}</td>

                                </tr>
                                @endforeach
                        </table>                    
                    <div class="d-flex justify-content-center">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style type="text/css">
    nav svg{
    width: 12px!important;
}
</style>
