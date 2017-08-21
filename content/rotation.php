<h3 align="center">Rotation Of A Point</h3>
<div class="col-sm-12">
<div class="col-sm-6">
	<h4 align="center">Canvas</h4>
	<canvas id="hi" width="550" height="500"></canvas><br>
</div>
<h4 align="center">Controls</h4>
<div class="col-sm-6">
	<form>
		<div class="form-group col-sm-6">
			<label>Distance From Origin</label>
			<input type="text" name="dio" id="dio" placeholder="Distance From Origin" class="form-control" value="100">
		</div>
		<div class="form-group col-sm-6">
			<label>Initial Angle From X - Axis</label>
			<input type="text" name="ia" id="ia" placeholder="Initial Angle ( &theta; )" class="form-control" value="30">
		</div>
		<div class="form-group col-sm-12">
			<label>Angle To Rotate</label>
			<input type="text" name="fa" id="fa" placeholder="Final Angle ( &phi; )" class="form-control" value="15">
		</div>
		<br>
	</form>
	<div class="col-sm-12">
	<button onclick="plotpoint()" class="btn btn-primary">Draw Point</button>
	<button onclick="rotate()" class="btn btn-primary">Rotate</button>
	</div>
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
	ctx.transform(1, 0, 0, -1, 275, c.height-250);
	function point(x , y){
		ctx.fillRect(x,y,5,5);
	}
	ctx.moveTo(0,-550);
	ctx.lineTo(0,550);
	ctx.stroke();
	
	ctx.moveTo(-550,0);
	ctx.lineTo(550,0);
	ctx.stroke();	


	function getvar() {
		dio = document.getElementById('dio').value;
		ia = document.getElementById('ia').value;
		fa = document.getElementById('fa').value;
		
		dio = parseInt(dio);

		ia = ia/180*Math.PI;
		fa = fa/180*Math.PI;

		x2 = dio * Math.cos(ia);
		y2 = dio * Math.sin(ia);
	}

	function plotpoint(){

		getvar();
		

		point(x2,y2);

		ctx.moveTo(0,0);
		ctx.lineTo(x2,y2);
		ctx.stroke();
	}

	function rotate(){

		getvar();
		ia = parseFloat(ia);
		fa = parseFloat(fa);
		
		x3 = dio * Math.cos(ia+fa);
		y3 = dio * Math.sin(ia+fa);

		point(x3,y3);

		ctx.moveTo(0,0);
		ctx.lineTo(x3,y3);
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