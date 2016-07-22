@extends('layout')
@section('content')
        
<div class="row">
	<div class="col-sm-9 center-block no-float">
    	<div class="col-sm-12">
    		 @if(Session::has('message'))  <!--muestra mesaje de suceso que viene del homecontrol-->
            <div class="alert alert-{{ Session::get('class') }} fade in">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                <p>  {{ Session::get('message') }} </p>
            </div>
            @endif

            @if($errors->has())               
                <div class="alert alert-danger fade in">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                	@foreach($errors->all() as $error)
                    	<p>{{ $error  }}</p>
                    @endforeach

                 </div>
            @endif

    	</div>
      <div class="col-xs-12">
      {{ HTML::link('/galleries/new' , ' Nueva Imagen',['class'=>'btn btn-success'] ) }}
      </div>
      <br>
      <div class="col-sm-12" style="margin-top: 1em;">
           @if (count($galleries)>0)
              @foreach ($galleries as $Ga)
                <img width="150px" height="150px" src="{{URL::to('/')}}/uploads/images/galleries/{{$Ga->picture}} " class="mythumb" style="margin-left: 1em;">
              @endforeach
           @endif
      </div>
   </div>
</div>
@stop