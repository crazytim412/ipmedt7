<?php $this->load->view("common/header_game"); ?>
		<script type="text/javascript">
			var energy = <?php echo $avatar_details['energy'];?>;
			
			var flashvars = {};
			var params = {
				"quality": "high",
				"wmode": "transparent"
			};
			var attributes = {
				"useExpressInstall" : false,
				"doExpressInstall" : false
			};
			
			swfobject.embedSWF("/swf/thuis_v1.swf", "background", "50%", "90%", "9.0.0","expressInstall.swf", flashvars, params, attributes);

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
				<p>
					Je hebt tot nu toe deze consumpties tot je genomen:<br>
					<?php 
						foreach($consumptions_name as $cn)
						{
							echo $cn;
							echo "<br>";
						}
					?>
				</p>
					<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
					<div class="clear"><br></div>
					<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
				</div>
				<!--<form method="post" action="">		   
   				 <input type="submit" name="submit" value="submit"/>
				</form>
				
			<input action="" type="post" name="option1" value="Optie 1" id="optie1" /> -->				
				

				</div>
			</div>
		</div>