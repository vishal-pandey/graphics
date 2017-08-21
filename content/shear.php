<h3 align="center">Shear - X</h3>
<div class="col-sm-12">
<div class="col-sm-6">
	<h4 align="center">Canvas</h4>
	<canvas id="hi" width="550" height="500"></canvas><br>
</div>
<h4 align="center">Controls</h4>
<div class="col-sm-6">
	<form>
		<div class="form-group col-sm-6">
			<label>Point 1 Coordinate</label>
			<input type="text" name="x1" id="x1" placeholder="x1" class="form-control" value="100">
			<input type="text" name="y1" id="y1" placeholder="y1" class="form-control" value="0">	
		</div>
		<div class="form-group col-sm-6">
			<label>Point 2 Coordinate</label>
			<input type="text" name="x2" id="x2" placeholder="x2" class="form-control" value="100">
			<input type="text" name="y2" id="y2" placeholder="y2" class="form-control" value="100">	
		</div>
		<div class="form-group col-sm-6">
			<label>Point 3 Coordinate</label>
			<input type="text" name="x3" id="x3" placeholder="x3" class="form-control" value="200">
			<input type="text" name="y3" id="y3" placeholder="y3" class="form-control" value="100">	
		</div>
		<div class="form-group col-sm-6">
			<label>Point 4 Coordinate</label>
			<input type="text" name="x4" id="x4" placeholder="x4" class="form-control" value="200">
			<input type="text" name="y4" id="y4" placeholder="y4" class="form-control" value="0">	
		</div>
		<div class="form-group col-sm-12">
			<label>Shearing Factor</label>
			<input type="text" name="shx" id="shx" placeholder="shx" class="form-control" value="0.8">
		</div>
	</form>
	<button onclick="drawfig()" class="btn btn-primary">Draw Figure</button>
	<button onclick="shear()" class="btn btn-primary">Shear</button>
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
	ctx.transform(1, 0, 0, -1, 50, c.height-50);
	function point(x , y){
		ctx.fillRect(x,y,3,3);
	}
	ctx.moveTo(0,-550);
	ctx.lineTo(0,550);
	ctx.stroke();
	
	ctx.moveTo(-550,0);
	ctx.lineTo(550,0);
	ctx.stroke();

	function getvar() {
		x1 = document.getElementById('x1').value;
		y1 = document.getElementById('y1').value;
		x2 = document.getElementById('x2').value;
		y2 = document.getElementById('y2').value;
		x3 = document.getElementById('x3').value;
		y3 = document.getElementById('y3').value;
		x4 = document.getElementById('x4').value;
		y4 = document.getElementById('y4').value;
		shx = document.getElementById('shx').value;

		x1 = parseInt(x1);
		y1 = parseInt(y1);
		x2 = parseInt(x2);
		y2 = parseInt(y2);
		x3 = parseInt(x3);
		y3 = parseInt(y3);
		x4 = parseInt(x4);
		y4 = parseInt(y4);
		// shx = parseInt(shx);
	}

	function drawfig(){
		
		getvar();

		ctx.moveTo(x1,y1);
		ctx.lineTo(x2,y2);
		ctx.stroke();

		ctx.moveTo(x2,y2);
		ctx.lineTo(x3,y3);
		ctx.stroke();

		ctx.moveTo(x3,y3);
		ctx.lineTo(x4,y4);
		ctx.stroke();

		ctx.moveTo(x4,y4);
		ctx.lineTo(x1,y1);
		ctx.stroke();
	}

	function shear() {
		getvar();

		x1 = x1 + shx*y1
		x2 = x2 + shx*y2
		x3 = x3 + shx*y3
		x4 = x4 + shx*y4

		ctx.moveTo(x1,y1);
		ctx.lineTo(x2,y2);
		ctx.stroke();

		ctx.moveTo(x2,y2);
		ctx.lineTo(x3,y3);
		ctx.stroke();

		ctx.moveTo(x3,y3);
		ctx.lineTo(x4,y4);
		ctx.stroke();

		ctx.moveTo(x4,y4);
		ctx.lineTo(x1,y1);
		ctx.stroke();

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