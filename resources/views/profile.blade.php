@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">

                   <div class="container">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                    <form 
                            id="formAccountSettings" 
                            method="POST" 
                            action="{{ route('profile.update',auth()->id()) }}" 
                            enctype="multipart/form-data"
                            class="needs-validation" 
                            role="form"
                            novalidate
                        >
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="">
                                    <label for="name" class="form-label">{{ __('Name')}}</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus="" required>
                                    <div class="invalid-tooltip"></div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary button-create me-2">{{ __('Update')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                   </div>
               </div>
               </div>

              </div>
           </div>
       </div>
</div> 


@endsection