<html>
<head>
 <title> Sorty demo</title> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
$("#btn1").click(function(){
    $("#sort").append("<input size='2' type='text' name='elements[]'>");
});
});
</script>
</head>
<body>

<form id="sort" name="sort" method="POST">

<select name="algorithm">
	<option value='shell'>Shell Sort</option>
	<option value='insertion'>Insertion Sort</option>
	<option value='selection'>Selection Sort</option>i
	<option value='bubble'>Bubble Sort</option>	
	<option ></option>
</select><br /> 
<?php
foreach($_POST['elements'] as $x)
	printf('<input size="2" type="text" name="elements[]" value="%d"/>',$x);
?>
</form>
<button  id="btn1"  >add</button>
<button  name="submit" onclick="$('#sort').submit()">Sort</button>
<br />
<?php
######
#CODE#
######
require_once("Sorty.php");
$newsort=new Sorty($_POST["elements"],$_POST["algorithm"],1);
$newsort->sortNow();
?>


</body>
</html>
