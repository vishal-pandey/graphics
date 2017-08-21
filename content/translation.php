<h3 align="center">Translation of point</h3>
<div class="col-sm-12">
<div class="col-sm-6">
	<h4 align="center">Canvas</h4>
	<canvas id="hi" width="550" height="500"></canvas><br>
</div>
<h4 align="center">Controls</h4>
<div class="col-sm-6">
	<form>
		<label>Point 1 Coordinate</label>
		<input type="text" name="x" id="x" size="3" placeholder="x" class="form-control" value="100">
		<input type="text" name="y" id="y"  size="3" placeholder="y" class="form-control" value="100">
		<br>	
		<label>Translateion Coordinate</label>
		<input type="text" name="tx" id="tx" size="3" placeholder="tx" class="form-control" value="110">
		<input type="text" name="ty" id="ty" size="3" placeholder="ty" class="form-control" value="110">
		
		<br>
	</form>
	<button onclick="makepoint()" class="btn btn-primary">Draw Point</button>
	<button onclick="translate1()" class="btn btn-primary">Translate</button>
</div>
</div>
<div class="helo well col-sm-6">
	<h4 align="center">Code</h4>
	<pre id="thecode">
	</pre>
</div>
<div class="col-sm-6 well">
	<h4 align="center">Online Resource</h4>
	<iframe src="https://www.tutorialspoint.com/computer_graphics/2d_transformation.htm"></iframe>
</div>
<script id = "code">
	var c = document.getElementById('hi');
	var ctx = c.getContext("2d");
	function point(x , y){
		ctx.fillRect(x,y,3,3);
	}

	function getvar() {
		x = document.getElementById('x').value;
		y = document.getElementById('y').value;

		x = parseInt(x);
		y = parseInt(y);

		tx = document.getElementById('tx').value;
		ty = document.getElementById('ty').value;

		tx = parseInt(tx);
		ty = parseInt(ty);
	}

	function makepoint(){
		getvar();
		point(x,y);		
		ctx.font = "10px Arial";
		ctx.fillText("P1("+x+","+y+")",x+10,y+5);
	}
	function translate1(){

		getvar();
		
		var x1 = x+tx;
		var y1 = y+ty;

		point(x1,y1);		
		ctx.font = "10px Arial";
		ctx.fillText("P2("+x1+","+y1+")",x1+10,y1+5);
	}
	
</script>
<style type="text/css">
	#thecode{
		/*border: 1px solid black;*/
		/*height: auto;*/
		height: 80vh;
		overflow: auto;
	}

	#hi{
		border: 1px dashed black;
		/*color:green;*/
	}
	div.helo{
		
	}
	h1, h2, h3, h4, h5, h6{
		margin-top: 0;
	}
	iframe{
		width: 100%;
		height: 80vh;
		border: 0;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$("#thecode").html(jQuery('<div />').text($("#code").text()).html());
	});
</script>