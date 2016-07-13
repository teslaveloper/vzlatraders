@extends('layout')
@section('content')
        
<div class="row">
	<div class="col-sm-12">
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
      <label for="">La session id {{Session::get('state_id')}}</label>
      <div class="col-xs-12  ">
          <div class="form-group center" style=" width: 200px;">
            <form action="{{URL::to('/')}}/state" method="POST" id="state_form">
            <label style="float:left">Estado</label>
                <select name="state_id" id="state_select" onchange="this.form.submit()" class="form-control">
                   @foreach ($states as $S)
                    <option  @if( Session::get('state_id') == $S->id  ) selected @endif value="{{$S->id}}">{{$S->name}}</option>
                  @endforeach
                 
              </select>
            </form>
          </div>
       
      </div>

     <div>
         @if (count($publications)>0)
            @foreach ($publications as $P)
               <div class="panel panel-primary   public_box" > 
                  <div class="panel-heading "> 
                      <h4 class="panel-title text-center">{{ $P->product_name}}</h4>
                  </div> 
                  <div class="contenido public_box_content" id="">
                    <div class="text-center">
                        <img width="100%" height="200" src="{{URL::to('/')}}/uploads/images/publications/{{$P->user->id}}/{{$P->picture}}">
                    </div>
                    <div class="public_box_content_description">
                      <p class="text-justify ">
                      {{ str_limit($P->description, $limit = 100, $end = '...') }}
                      </p>
                    </div>
                  </div>
                  <br>
                  <div class=" public_box_actions">
                     <p>
                      <a class="btn btn-primary" href="{{URL::to('/')}}/publications/show/{{$P->id}}" data-toggle="tooltip" data-placement="top" title="Ver"><span class="glyphicon glyphicon-eye-open"></span></a>
                      @if (Auth::user()->id == $P->user->id)
                      <a class="btn btn-success" href="{{URL::to('/')}}/publications/edit/{{$P->id}}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
                      @endif
                      <a href="#" class="btn btn-info " style="float: right; margin-right: 1em;" data-toggle="tooltip" data-placement="top" title="Comentarios"><span class="glyphicon glyphicon-envelope" style="font-size: 15px; color: #FAFAD2;"></span> <span class="badge"><span style="color: black;">{{ count($P->comments) }}</span></span></a>
                     </p>
                  </div>
               </div> 
            @endforeach
         @else
            <h3>No hay Publicaciones Registradas</h3>
         @endif
           
      </div>
   
   </div>
</div>
@stop