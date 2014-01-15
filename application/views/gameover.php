<?php $this->load->view("common/header_game"); ?>
		<script type="text/javascript">
			var energy = <?php echo $avatar_details['energy'];?>;
			
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
		<div id="map-container">
			<div id="background">
				
			</div>
			<div id="header">
				<h1 class="logo"><img src="/img/logo.png" /></h1>
				<ul id="header_stats">
					<li>
						<label>Humeur</label> 
						<span><?php echo $avatar_details['mood'];?></span>
					</li>
					<li>
						<label>Energie</label>
						<span><?php echo $avatar_details['energy'];?></span>
					</li>
					<li>
						<label>Gezondheid</label>
						<span><?php echo $avatar_details['health'];?></span>
					</li>
					<li>
						<label>Dag</label> 
						<span><?php echo $avatar_details['day'];?></span>
					</li>
					<li>
						<label>Totaal score</label>
						<span><?php echo $avatar_details['score'];?></span>
					</li>
				</ul>

				<div id="optionsBut"></div>
				<div id="optionsButMenu">
					<ul class="dropdown-menu">
						<li><a href="/settings/">Instellingen</a></li>
						<li><a href="/index.php/logout/">Uitloggen</a></li>
					</ul>
				</div>
				<div class="clear"></div>
				<!--<canvas id="energymeter"></canvas>-->
				<div id="energymeter">
					<div class="bar"></div>
					<span class="amount">100%</span>
					<span class="label">Energie</span>
					
				</div>
				<div class="content_container">
					<h1 align="center" color="#DC143C">Game over!</h1>
					<img src="/img/gameover.png" alt="Doodskop" width="50%" height="50%" id="deadhead">
					<h2>Je hebt je eigen eigen keuzes niet overleefd.</h2>
					<p>
						Helaas, je hebt zo veel dingen gedaan, dat je vredig bent ingeslapen.<br>
						Je hebt het <?php echo $avatar_details['day']; ?> dagen vol gehouden.<br>
						De score die je hebt behaalt is <?php echo $avatar_details['score']; ?>.
						<br>
						<a href="<?php echo $link['linktotaal']; ?>" target="_blank">Deel jouw score op Facebook! <br>Daag jouw vrienden uit om je te verslaan.</a>
						<div id="clear"></div>
						<a href="/index.php/gameover/end"><button type="button" class="but2">Ga terug naar het login scherm.</button></a>
					</p>
	
				</div>
			</div>
		</div>
	
<?php $this->load->view("common/footer");?>