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
			output =  output+x1+" , "+y1+"<br>";
		}

		document.getElementById('op').innerHTML = output;
	}