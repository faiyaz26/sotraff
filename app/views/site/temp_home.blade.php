<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8" />
    <title>
      @section('title')
      SoTraff | A Social Network on Traffic Update
      @show
    </title>
    <meta name="keywords" content="your, awesome, keywords, here" />
    <meta name="author" content="Ahmad Faiyaz, Amran Ahmed" />
    <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS
    ================================================== -->
    {{-- Basset::show('public.css') --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}" />
    <style>
    body{
      background: url({{asset('assets/img/back.png')}});
      background-color: #444; 
      background: url({{asset('assets/img/pinlayer2.png')}}), url({{ asset('assets/img/pinlayer1.png') }}),url({{ asset('assets/img/back.png') }});  
    }

    .vertical-offset-100{
      padding-top:40px;
    }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons
    ================================================== -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('ico/apple-touch-icon-144-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('ico/apple-touch-icon-114-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('ico/apple-touch-icon-72-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" href="{{{ asset('ico/apple-touch-icon-57-precomposed.png') }}}">
    <link rel="shortcut icon" href="{{{ asset('ico/favicon.png') }}}">
  </head>


  <body>
    <!-- To make sticky footer need to wrap in a div -->
    <div id="wrap">
      <!-- Navbar -->
      <div class="navbar navbar-default navbar-inverse navbar-fixed-top">
       <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{{ URL::to('') }}}">SoTraff</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse" >

          <ul class="nav navbar-nav pull-right">
            <div style="padding-top: 10px;">
              {{Form::open(array('url' => 'user/login', 'method' => 'POST', 'class' => 'form-inline', 'role' => 'form'))}}
                <div class="form-group">
                  <input type="text" class="form-control" name = "email" placeholder="UserName Or Email" style="height: 30px;"/>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name = "password" placeholder="Password" style="height: 30px;"/>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>

                </div> 
                <span> <a class="btn btn-primary btn-sm" href="forgot" style = "text-decoration: none"> | Forgot password ?</a> </span>
                <button type="submit" class="btn btn-default btn-sm">Sign in</button>
              {{Form::close()}}
            </div>
          </ul>
          <!-- ./ nav-collapse -->
        </div>
      </div>
    </div>
    <!-- ./ navbar -->

    <!-- Container -->
    <div class="container" style = "padding-top: 5%;">
      <!-- Notifications -->
      @include('notifications')
      <!-- ./ notifications -->

      <script src="{{asset('assets/js/tweenlite.min.js')}}"></script>
      <div class="row vertical-offset-100">
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="jumbotron">
                <h2> Get the Latest Traffic Update </h2>
                <h3> Join and Share </h3>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-primary">
             <div class="panel-heading">Sign Up</div>
             <div class= "panel-body">
                {{Form::open(array('url' => 'user', 'method' => 'post'))}}
                  <div class="form-group">
                      {{Form::text('fullname', null, array('class' => 'form-control', 'placeholder' => 'Full Name'))}}
                  </div>
                  <div class="form-group">
                      {{Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'User Name'))}}
                  </div>
                  <div class="form-group">
                      {{Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email'))}}
                  </div>
                  <div class="form-group">
                      {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
                  </div>
                  <div class="form-group">
                      {{Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Password Confirmation'))}}
                  </div>
                  <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                {{Form::close()}}
            </div>
          </div>
          
          
        </div>

      </div>
    </div>
    <!-- ./ content -->
  </div>
  <!-- ./ container -->

  <!-- the following div is needed to make a sticky footer -->
  <div id="push"></div>
</div>
<!-- ./wrap -->


<div id="footer" class="container">
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="navbar-inner navbar-content-center" style = "color: white;">
      <p class="credit text-center" style = "padding-top: 1%;"> SoTraff (c) Copyright 2014</a>.</p>
    </div>
  </nav>
</div>

    <!-- Javascripts
    ================================================== -->
    <script src = "{{asset('js/jquery_1.10.1.js')}}"> </script>
    <script src = "{{asset('js/bootstrap/bootstrap.js')}}"> </script>
    <script src = "{{asset('js/prettify.js')}}"> </script>
    <script src = "{{asset('js/tweenlite.min.js')}}"> </script>
    
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

  </body>

  </html>