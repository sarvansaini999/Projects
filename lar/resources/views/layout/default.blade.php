<!doctype html>
<html>
<head>

<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/uniform/css/uniform.default.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/wow/animate.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/gallery/blueimp-gallery.min.css') }}" />

	
<title><?php  echo $title; ?></title>
</head>
<body>

  <header> <?php  echo  $header; ?> </header>
  <div class="contents"> <?php  echo $content; ?></div>
  <footer><?php  echo $footer; ?></footer>

</body>
</html>