<?php $this->load->view("common/header_game"); ?>
		<script type="text/javascript">
			var energy = 1;
			
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
			
			swfobject.embedSWF("/swf/thuis_v1.swf", "background", "70%", "100%", "9.0.0","expressInstall.swf", flashvars, params, attributes);

		</script>
		<audio autoplay loop id="musicPlayer">
			<source src="/music/vrienden.mp3" type="audio/mpeg">
			<source src="/music/vrienden.ogg" type="audio/ogg">
		</audio>
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
				
				<form method="post" action="">
    			<input type="radio" name="radio" value="optie1"/>Test
     			<input type="radio" name="radio" value="optie2"/>Test 2			   
   				 <input type="submit" name="submit" value="submit"/>
				</form>

				
				
		<!<input action="" type="post" name="option1" value="Optie 1" id="optie1" /> 


				
				

				</div>
