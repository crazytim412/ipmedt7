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
		<audio autoplay loop id="musicPlayer">
			<source src="/music/thuis.mp3" type="audio/mpeg">
			<source src="/music/thuis.ogg" type="audio/ogg">
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
					<?php	if($health_check == 1) { ?>
						<?php if($avatar_details['health'] < -30) { ?>
							<p>
								Je zit er helemaal naast. Als je zo doorgaat, overleef je het niet lang.<br>
								Probeer eens wat minder slechte drankjes en drugs.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] > -30 && $avatar_details['health'] < -20) { ?>
							<p>
								Je hebt redelijk veel slechte dingen gedaan. Dit levert je allemaal<br>
								negatieve effecten op. Probeer eens wat afwisseling tussen goed en slecht.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] >= -20 && $avatar_details['health'] < -10) { ?>
							<p>
								De hoeveelheid dranks en/of drugs is niet al te hoog, maar is niet gezond geweest.<br>
								Ga eens een dagje gezonde consumpties doen.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] >= -10 && $avatar_details['health'] < 0) { ?>
							<p>
								Net niet goed. Neem eens wat minder pillen of wat minder sterke dranken.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] >= 0 && $avatar_details['health'] < 10) { ?>
							<p>
								Neutraal. Niet goed of slecht. Probeer de balans te vinden tussen gezond en sociaal.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] >= 10 && $avatar_details['health'] < 20) { ?>
							<p>
								Je hebt de gezonde kant van het uitgaan gevonden. Nu nog iets gezonder, afwisselender en socialer.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] >= 20 && $avatar_details['health'] < 30) { ?>
							<p>
								Je bent redelijk goed bezig. Misschien iets minder drugs of sterke drank zal je goed doen.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] >= 30 && $avatar_details['health'] < 40) { ?>
							<p>
								Je bent goed op weg. Je mag iets gezonder doen en natuurlijk sociaal blijven.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] >= 40 && $avatar_details['health'] < 50) { ?>
							<p>
								Bijna helemaal perfect. Probeer eens wat gezelliger te doen.
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } else if($avatar_details['health'] > 50) { ?>
							<p>
								Je hebt het helemaal door. Je kiest de juiste dingen uit, maar gedraagd je ook sociaal.<br>
								Ga zo door !
							</p>
							<a href="/index.php/bedroom/day"><button type="button" class="but2">Klik hier voor een nieuwe dag.</button></a>
							<div class="clear"><br></div>
							<a href="/"><button type="button" class="but2">Ga terug naar de kaart.</button></a>
						<?php } ?>
					<?php } else { ?>
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
					<?php } ?>
				</div>
				</div>
			</div>
		</div>