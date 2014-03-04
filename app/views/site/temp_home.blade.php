@extends('site.layouts.default')

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
        body{
            background: url({{asset('assets/img/back.png')}});
            background-color: #444; 
            background: url({{asset('assets/img/pinlayer2.png')}}), url({{ asset('assets/img/pinlayer1.png') }}),url({{ asset('assets/img/back.png') }});  
        }

        .vertical-offset-100{
            padding-top:40px;
        }
@stop

{{-- Content --}}
@section('content')
<script src="{{asset('assets/js/tweenlite.min.js')}}"></script>
<div class="row vertical-offset-100">
    <div class="col-md-8 col-md-offset-2">
        
        <div class="panel panel-primary">
                 <div class="panel-heading">SoTraff</div>
                 <div class= "panel-body>">
                      <div class="jumbotron">
                        <h1> SoTraff </h1>
                        <h3> is Coming Soon.. </h3>
                    </div>
                </div>
        </div>

    </div>
</div>
@stop

@section('js')
<script>
$(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"
            }
        });
  });
});
</script>
@stop
