
@extends('layouts.app')
@section('content')

<html lang="{{ app()->getLocale() }}">
<head>
    <title>Upload da imagem</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        
</head>
<body>

<div class="container">      
    <div class="panel panel-primary">
      <div class="panel-heading"><h2>Upload da imagem</h2>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        
                    @endauth
                
            @endif
           
    </div>
    </div>
      <div class="panel-body">
      
      <?php if ($message = Session::get('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        
        <?php endif; ?>
        
        <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Parece que teve algum problema com seu input.
                <ul>
                <?php foreach ($errors->all() as $error):?>
                        <li>{{ $error }}</li>
                        <?php endforeach; ?>
                </ul>
            </div>
            
            <?php endif; ?>
            
            <?php echo Form::open(array('route' => 'image.upload.post','files'=>true)) ?>
            
            <div class="row">
                <div class="col-md-6">
                <?php echo Form::file('foto', array('class' => 'form-control')) ?>
                </div>
                
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        <?php Form::close();?>
      </div>
    </div>
</body>
</html>
@endsection
