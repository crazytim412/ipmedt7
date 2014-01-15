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
			
			swfobject.embedSWF("/swf/<?php echo $type;?>_v1.swf", "background", "50%", "100%", "9.0.0","expressInstall.swf", flashvars, params, attributes);

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
			</div>
			<div class="content_container">
				<?php if(@$error_msg): ?>
				U heeft onvoldoende energie om de <?php echo $type ?> binnen te treden.<br><br>
				
				<a href="/index.php">Klik hier om terug te keren</a>
				<?php else: ?>
					<?php if($type == 'bar'){ ?>
						Welkom bij de bar.<br>U heeft minimaal 20% energie nodig om binnen te gaan.<br><br>
					
						<a href="/index.php/location/enter/<?php echo $type; ?>"><button type="button" class="but2">Ga de kroeg in</button></a> &nbsp &nbsp &nbsp <a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
					<?php } else if($type == 'disco') { ?>
						Oh yeah, disco FEVER. Je gaat gezellig avondje doorbrengen in de disco<br>U heeft minimaal 40% energie nodig om binnen te gaan.<br><br>
					
						<a href="/index.php/location/enter/<?php echo $type; ?>"><button type="button" class="but2">Duik in de disco fever.</button></a> &nbsp &nbsp &nbsp <a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
					<?php } else if($type == 'vrienden') { ?>
						Een aantal vrienden hebben je uitgenodigd voor een party bij hun thuis.<br>Je gaat naar je vrienden toe.<br>U heeft minimaal 25% energie nodig om binnen te gaan.<br><br>
					
						<a href="/index.php/location/enter/<?php echo $type; ?>"><button type="button" class="but2">Ga naar binnen bij je vrienden</button></a> &nbsp &nbsp &nbsp <a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>

					<?php } else if($type == 'festival') { ?>
						Je bent aangekomen op het Festival.<br>U heeft minimaal 75% energie nodig om binnen te gaan.<br><br>
					
						<a href="/index.php/location/enter/<?php echo $type; ?>"><button type="button" class="but2">Ga het festival grond op.</button></a> &nbsp &nbsp &nbsp <a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
					<?php } ?>
				<?php endif; ?>
			</div>