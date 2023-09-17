@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

            <div class="card">


                <div class="card-header">{{ __('Create Poll') }}</div>

                <div class="card-body">

                <form method="post">    

                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                   
                    <div>
                        <label>Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description"></textarea>
                    </div>
                    <div>
                        <label>List Of Options (comma seperated)</label>
                        <input class="form-control @error('options') is-invalid @enderror" type="text" name="options">
                    </div>
                    <div class="text-center mt-2">
                        <button class="btn btn-primary mt-2">Create</button>
                    </div>

                 </form>   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
