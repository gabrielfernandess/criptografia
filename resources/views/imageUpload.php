<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    <title>Upload da imagem</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
</head>
<body>
<div class="container">

    <div class="panel panel-primary">
      <div class="panel-heading"><h2>Upload da imagem</h2></div>
      <div class="panel-body">
      <?php if ($message = Session::get('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
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
                <?php echo Form::file('image', array('class' => 'form-control')) ?>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        <?php Form::close();?>
      </div>
    </div>
</div>
</body>
</html>