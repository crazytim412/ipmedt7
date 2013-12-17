<?php $this->load->view("common/header_game"); ?>
<div class="opaque1">
	<script type="text/javascript">
		var energy = 50;
	
		var flashvars = {};
		var params = {
			"quality": "high",
			"scale" : "noborder",
			"wmode": "transparent"
		};
		var attributes = {
			"useExpressInstall" : false,
			"doExpressInstall" : false
		};
		
		swfobject.embedSWF("/swf/locationmap.swf", "background", "100%", "100%", "9.0.0","expressInstall.swf", flashvars, params, attributes);
	</script>
</div>
<div id="gameOverbackground">
	
	<?php $this->load->view("common/map-container");?>
	
	<h1>Game over!</h1>
	<h2>Je hebt je eigen eigen keuzes niet overleefd.</h2>
	<p>
		Helaas, je hebt zo veel dingen gedaan, dat je vredig bent ingeslapen.<br>
		Je hebt het <?php echo($dagen) ?> vol gehouden.<br>
		De score die je hebt behaalt is <?php $score ?>.
		
		<a href="<?php $linktotaal ?>">Deel jouw score op Facebook! <br>Daag jouw vrienden uit om je te verslaan.</a>
	</p>
</div>
	
<?php $this->load->view("common/footer");?>