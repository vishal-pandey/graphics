<h3 align="center">Digital Differential Analyzer</h3>
<div class="col-sm-6">
	<h4>Canvas</h4>
	<canvas id="hi" width="500" height="500"></canvas><br>
	<form>
	Point 1 (<input type="text" name="x1" id="x1" size="3" placeholder="x1">,
	<input type="text" name="y1" id="y1"  size="3" placeholder="y1">)

	<br>
	Point 2 (<input type="text" name="x2" id="x2" size="3" placeholder="x2">,
	<input type="text" name="y2" id="y2" size="3" placeholder="y2">)
	<br>
	</form>
	<button onclick="mkline()">click</button>
	<div id="op"></div>
</div>
<h4 class="pull-right">Code</h4>
<div class="helo col-sm-6">
	<pre id="thecode">
	</pre>
</div>

<script id = "code">
	var c = document.getElementById('hi');
	var ctx = c.getContext("2d");
	function point(x , y){
		ctx.fillRect(x,y,1,1);
	}
	function mkline(x1, y1, x2, y2) {
		var x1 = document.getElementById('x1').value;
		var y1 = document.getElementById('y1').value;
		var x2 = document.getElementById('x2').value;
		var y2 = document.getElementById('y2').value;

		var x1 = parseInt(x1);
		var y1 = parseInt(y1);
		var x2 = parseInt(x2);
		var y2 = parseInt(y2);

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
</script>
	<style type="text/css">
		#thecode{
			/*border: 1px solid black;*/
			height: 500px;
			overflow: auto;
		}
		#hi{
			border: 1px dashed black;
			/*color:green;*/
		}
		h1, h2, h3, h4, h5, h6{
			margin-top: 0;
		}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$("#thecode").html(jQuery('<div />').text($("#code").text()).html());
	});
</script>