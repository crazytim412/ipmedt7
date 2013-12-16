<?php $this->load->view("common/header_game"); ?>
		<script type="text/javascript">
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
						<label>Dag</label> 
						<span><?php echo $avatar_details['day'];?></span>
					</li>
					<li>
						<label>Totaal score</label>
						<span>192</span>
					</li>
				</ul>

				<div id="optionsBut"></div>
				<div class="clear"></div>
				<canvas id="energymeter"></canvas>
				<!--<div id="energymeter"></div>-->
			</div>
			<div id="map">
				<ul id="labels">
					<li class="festival"><p>Festival</p></li>
					<li class="disco"><p>Disco</p></li>
					<li class="bar"><p>Kroeg</p></li>
					<li class="friends"><p>Vrienden</p></li>
					<li class="home"><p>Thuis</p></li>
				</ul>
			</div>
		</div>
		<!--<div class="content">
			<a href="/index.php/location">Ga naar de kroeg</a>
		</div>-->