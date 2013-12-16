$(document).ready(function(){
	var canvas = document.getElementById('energymeter');
	var context = canvas.getContext('2d');
	
	context.beginPath();
	context.arc(288, 75, 70, 0, Math.PI, false);
	context.closePath();
	context.lineWidth = 5;
	context.fillStyle = 'red';
	context.fill();
	context.strokeStyle = '#550000';
	context.stroke();	
});
