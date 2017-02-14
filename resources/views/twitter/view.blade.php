<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Twitter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    #centered{
       position: relative;
       top: 45vh !important;
       margin: auto;
       border-color: black;
    }
  </style>
</head>

<body>
  
	<div id="centered" class="panel panel-default">
    <p class="text-center" style="font-size: 40px">{{ $tweet[0]->tweet }}</p>
	</div>

</body>

</html>