@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body col-md-12">
                  <div class="row">
                        <div class="col-4">
                          <a class="btn border p-3 m-2 col-12" href="{{ route('createpoll.index') }}">
                            <i class="fa fa-home"></i>  
                            {{ __('Create Poll') }}
                          </a>
                        </div>
                        <div class="col-4"><a class="btn border p-3 m-2 col-12" href="{{ route('view.pole') }}">{{ __('View Poll') }}</a></div>
                        <div class="col-4"><a class="btn border p-3 m-2 col-12" href="{{ route('allPoll') }}">{{ __('Participate in polls') }}</a></div>
                  </div>
                  <hr>
                  <div class="row">
                        <div class="col-4"><a class="btn border p-3 m-2 col-12" href="{{ route('profile') }}">{{ __('My Profile') }}</a></div>
                        <div class="col-4"><a class="btn border p-3 m-2 col-12" href="{{ route('history') }}">{{ __('Voting History') }}</a></div>
                        <div class="col-4"><a class="btn border p-3 m-2 col-12" href="{{ route('logActivity') }}">{{ __('Activity History') }}</a></div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
