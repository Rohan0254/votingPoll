@extends('layouts.app')

@section('content')
@php 
 $user = 0;
 if(auth()->check()){
 $user = 1;
}

@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="container allpoll">



                   <div class="row justify-content-center">


                         @if(count($poll) <= 0)   
	                   		<div class="poll col-12 border p-4 m-4 text-center">
	                   			<h1>Opps!</h1>
	                   			<br>
	                   			<p>We Don't have any poll yet.</p>
	                   		</div>
	                   	 @else
		                     <h3>{{ __('Vote Now') }}</h3>
	
 
                         @endif
	                     @foreach($poll as $data)

	                   		<div class="poll col-3 border p-4 m-3 " pollId={{$data->id}}>
	                   			<h4>{{ $data->title }}</h4>

	                   			<ul class="options">
                                 @foreach($data->PollQuestion as $PollQuestion)
                                    <li class="m-2 questions vote" q="{{ $PollQuestion->id }}">
                                    	<div class="progress" style="display: none;"><span></span></div>
                                    	<div>{{ $PollQuestion->question }}</div>
                                    	 
                                    </li>
                                 @endforeach

	                   			</ul>
	                   			<p>{{ $data->description }}</p>
	                   		</div>

                         @endforeach

                   
                    <div class="d-flex justify-content-center">
                        {!! $poll->links() !!}
                    </div>

            </div>
        </div>
    </div>

    <script>
	   $(document).ready(function () {
	        $(".questions.vote").click(function () {
	        	if('<?=$user?>'==0){
	        		window.location.href = "login";
	        	}
	        	else{
		            var pollId = $(this).parents(".poll").attr("pollId");
		            var QId = $(this).attr("q");
		            console.log("q="+QId+", pid="+pollId);
		            $.ajax({
		                type: "POST",
		                url: "{{ route('save.option') }}",
		                data: {
		                    _token: "{{ csrf_token() }}",
		                    pollId: pollId,
		                    QId: QId
		                },
		                success: function (data) {
		                   // console.log(data.data);

		                   $("[pollId='"+pollId+"'] .progress").show();
		                   $("[pollId='"+pollId+"']").css("pointer-events","none");
		                   
							for (const [key, value] of Object.entries(data.data)) {
							  
							  $("[pollId='"+pollId+"'] [q='"+key+"'] .progress span").css("width",value+"%").html(value+"%");
							}                   	
		                   
		                },
		                error: function (data) {
		                    console.log(data);
		                }
		            });
		        }

	                       
	        });
	    });
	</script>

</div>

@endsection

<style type="text/css">
    .allpoll .poll{
    	border-radius: 10px;
    	background-color: #e3f3e3;
	}
    .allpoll .poll .options li{
    	list-style: none;
    	padding: 10px;
    	margin: 0px;
    	background-color: white;
    	border-radius: 10px;
    	cursor: pointer;
	}
	.progress{
		position: relative;
	}
	.progress span {
    position: absolute;
    height: 100%;
    background-color: #54ff54;
    left: 0;
    top: 0;
    color: black;
    padding-left: 10px;
    font-weight: 800;
	}

</style>
