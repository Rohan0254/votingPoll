@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">


                <div class="card-header">{{ __('All Polls') }}</div>

                <div class="card-body">

                   <div class="container mt-5">
                        <table class="table table-bordered mb-5">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($poll) <= 0)   
                                    <tr>
                                        <td colspan="4">
                                            Data Not Found.
                                        </td>
                                    </tr>
                                @endif
                                @foreach($poll as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>
                                        @foreach($data->PollQuestion as $PollQuestion)
                                        {{ $PollQuestion->question }}
                                        @endforeach

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    <div class="d-flex justify-content-center">
                        {!! $poll->links() !!}
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
