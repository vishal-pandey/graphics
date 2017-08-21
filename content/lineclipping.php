<h3 align="center">Line Clipping</h3>
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
			<input type="text" name="x1" id="x1" placeholder="x1" class="form-control" value="0">
			<input type="text" name="y1" id="y1" placeholder="y1" class="form-control" value="0">	
		</div>
		<div class="form-group col-sm-6">
			<label>Point 2 Coordinate</label>
			<input type="text" name="x2" id="x2" placeholder="x2" class="form-control" value="400">
			<input type="text" name="y2" id="y2" placeholder="y2" class="form-control" value="450">	
		</div>

		<div class="form-group col-sm-6">
			<label>Window Min Coordinate</label>
			<input type="text" name="Xwmin" id="Xwmin" placeholder="Xwmin" class="form-control" value="100">
			<input type="text" name="Ywmin" id="Ywmin" placeholder="Ywmin" class="form-control" value="100">	
		</div>
		<div class="form-group col-sm-6">
			<label>Window Max Coordinate</label>
			<input type="text" name="Xwmax" id="Xwmax" placeholder="Xwmax" class="form-control" value="300">
			<input type="text" name="Ywmax" id="Ywmax" placeholder="y4" class="form-control" value="300">	
		</div>
		
		<br>
	</form>
	<button onclick="mkwindow()" class="btn btn-primary">Make Window</button>
	<button onclick="mkline()" class="btn btn-primary">Draw Line</button>
	<button onclick="clipline()" class="btn btn-primary">Clip Line</button>
</div>
</div>
<div class="helo well col-sm-6">
	<h4 align="center">Code</h4>
	<pre id="thecode">
	</pre>
</div>
<div class="col-sm-6 well">
	<h4 align="center">Online Resource</h4>
	<iframe src="https://www.tutorialspoint.com/computer_graphics/viewing_and_clipping.htm"></iframe>
</div>
<script id = "code">

	var c = document.getElementById('hi');
	var ctx = c.getContext("2d");
	ctx.transform(1, 0, 0, -1, 0, c.height);
	function point(x , y){
		ctx.fillRect(x,y,1,1);
	}
	function clrpoint(x , y){
		ctx.clearRect(x,y,1,1);
	}

	function assign(x,y,Xwmin,Ywmin,Xwmax,Ywmax){
		if(x<Xwmin && y<Ywmin){
			return 1001;
		}else if(x>Xwmin && y<Ywmin && x>Xwmax){
			return 1000;
		}else if(x>Xwmax && y<Ywmin){
			return 1010;
		}else if(x<Xwmin && y>Ywmin && y<Ywmax){
			return 0001;
		}else if(x>Xwmin && x<Xwmax && y>Ywmin && y<Ywmax){
			return 0000;
		}else if(x>Xwmax && y>Ywmin && y<Ywmax){
			return 0010;
		}else if(x<Xwmin && y>Ywmax){
			return 0101;
		}else if(x>Xwmin && x<Xwmax && y>Ywmax){
			return 0100;
		}else{
			return 0110;
		}
	}

	function getvar() {
		x1 = document.getElementById('x1').value;
		y1 = document.getElementById('y1').value;
		x2 = document.getElementById('x2').value;
		y2 = document.getElementById('y2').value;
		
		Xwmin = document.getElementById('Xwmin').value;
		Xwmax = document.getElementById('Xwmax').value;
		Ywmin = document.getElementById('Ywmin').value;
		Ywmax = document.getElementById('Ywmax').value;

		x1 = parseInt(x1);
		y1 = parseInt(y1);
		x2 = parseInt(x2);
		y2 = parseInt(y2);

	}

	function mkline() {

		getvar();

		dx = x2 - x1;
		dy = y2 - y1;
		var steps;

		if (Math.abs(dx)>Math.abs(dy)) {
			steps = Math.abs(dx);
		}else{
			steps = Math.abs(dy);
		}

		var Xinc = dx/steps;
		var Yinc = dy/steps;
		var output;
		for(var i=0; i<steps; i++){
			x1 = x1+Xinc;
			y1 = y1+Yinc;
			point(Math.round(x1),Math.round(y1));
		}
	}

	function mkwindow() {

		getvar();

		wwidth = Xwmax-Xwmin;
		wheight = Ywmax-Ywmin;

		ctx.rect(Xwmin,Ywmin,wwidth,wheight);
		ctx.stroke();
	}

	function clipline(){

		getvar();


		dx = x2 - x1;
		dy = y2 - y1;
		var steps;

		if (Math.abs(dx)>Math.abs(dy)) {
			steps = Math.abs(dx);
		}else{
			steps = Math.abs(dy);
		}

		var Xinc = dx/steps;
		var Yinc = dy/steps;
		var output;
		for(var i=0; i<steps; i++){
			x1 = x1+Xinc;
			y1 = y1+Yinc;
			if(x1>Xwmin && x1<Xwmax && y1>Ywmin && y1<Ywmax){} 
			else{
				clrpoint(Math.round(x1),Math.round(y1));
			}
		}

		// p1 = assign(x1,y1,Xwmin,Ywmin,Xwmax,Ywmax);
		// p2 = assign(x2,y2,Xwmin,Ywmin,Xwmax,Ywmax);

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