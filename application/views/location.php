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
				<div class="text-container">
					<b><div class="error_message"></div></b><br><br>
					
					Welkom in de kroeg<br>
					U heeft nog <span class="consumptions_left"><?php echo $this->session->userdata("consumptions_left"); ?></span> consumpties over.
					<br><br>
					<div class="consumptions">
						<?php foreach($consumptions->result() as $row): ?>
						<a href="#" data-id="<?php echo $row->id; ?>" class="consumption">Neem een <?php echo $row->name; ?> (<?php echo $row->consumption_weight; ?>) </a><br>
						<?php endforeach; ?><br><br>
					</div>
					
					<a href="/index.php/location/exitlocation">Verlaat de kroeg</a>
				</div>
					
				<div id="avaFemale">
					<div id="avaHead">
						<div id="avaFace" style="background: #e29857 url(/img/characters/vrouw/emoties/blij.png) center 29px no-repeat;"></div>
						<div id="avaNeck"></div>
					</div>
					<div id="avaHair" style="background: url(/img/characters/vrouw/kapsels/1.png) center no-repeat;"></div>
					<div id="avaBody" style="background: url(/img/characters/vrouw/lichaam/2.png) center no-repeat;"></div>
					<div id="avaLegs" style="background: url(/img/characters/vrouw/broek/3.png) center no-repeat;"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
