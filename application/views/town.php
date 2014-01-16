<?php $this->load->view("common/header_game"); ?>
		<script>
			document.getElementById("musicOnOffKnop").onclick = musicOnOff();
		</script>
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
<!--		<script>
			function StartOrStop(audioFile) {
				var audie = document.getElementById("myAudio");
				if (!audie.src || audie.src !== audioFile) audie.src = audioFile;
				console.log(audie.paused);
				if (audie.paused == false) {
					console.log('pause');
					audie.pause();
				} else {
					console.log('play');
					audie.play();
				}
			}
		</script>
		
		<audio autoplay id="myAudio"></audio> -->
		<script>
			function musicOnOff()
			{
				var audioPlayer = document.getElementById('musicPlayer');
				if (audioPlayer.paused == false)
					audioPlayer.pause();
				else
					audioPlayer.play();
			}
		</script>
		<audio autoplay loop id="musicPlayer">
			<source src="/music/kaart.mp3" type="audio/mpeg">
			<source src="/music/kaart.ogg" type="audio/ogg">
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
				<?php 
				if($avatar_details['energy'] < 20){?>
					<a href="/index.php/bedroom">
						<div class="but3">
							Je energie is bijna op, klik hier om naar huis te gaan en te slapen!
						</div>
					</a>
				<?php 
				}?>
				<div id="optionsBut"></div>
				<div id="optionsButMenu">
					<ul class="dropdown-menu">
						<li><a href="/settings/">Instellingen</a></li>
						<li><a href="/index.php/logout/">Uitloggen</a></li>
						<li><a href="#" onclick="StartOrStop('/music/kaart.mp3')">Muziek aan/uit</a></li>
					</ul>
				</div>
				<div class="clear"></div>
				<!--<canvas id="energymeter"></canvas>-->
				<div id="energymeter">
					<div class="bar"></div>
					<span class="amount"></span>
					<span class="label">Energie</span>
				</div>
			</div>
			<div id="map">
				<ul id="labels">
					<li class="festival"><a href="/index.php/location/festival"><p>Festival <br/>(75% energie)</p></a></li>
					<li class="disco"><a href="/index.php/location/disco"><p>Disco <br/>(40% energie)</p></a></li>
					<li class="bar"><a href="/index.php/location/bar"><p>Bar <br/>(20% energie)</p></a></li>
					<li class="friends"><a href="/index.php/location/vrienden"><p>Vrienden <br/>(25% energie)</p></a></li>
					<li class="home"><a href="/index.php/bedroom"><p>Thuis</p></a></li>
				</ul>
			</div>
		</div>
		<!--<div class="content">
			<a href="/index.php/location">Ga naar de kroeg</a>
		</div>-->
		
		<?php $this->load->view("common/footer");?>