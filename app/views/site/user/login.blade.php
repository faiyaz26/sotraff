@extends('site.layouts.default')


{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop
 
@section ('styles')
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
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <img src="{{asset('assets/img/logo.png')}}" class="img-responsive" alt="Responsive image">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please log in</h3>
            </div>
            <div class="panel-body">

                {{ Form::open(array('url' => 'user/login', 'role' => "form")) }}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                            </label>
                            |
                            <span>
                                <a href="forgot">Forgot password ?</a>
                            </span>
                        </div>
                        <input class="btn btn-success btn-block" type="submit" value="Login">
                        <input class="btn btn-primary btn-block" type=button onClick="location.href='{{URL::to('user/create')}}'" value='Sign Up'>
                    </fieldset>
                {{Form::close()}}
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