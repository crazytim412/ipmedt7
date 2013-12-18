<?php $this->load->view("common/header_game"); ?>

<script>
$(function () { //document ready

	//array aanmaken met kapsel keuze
	var kapsel = ['kapsel1', 'kapsel2', 'kapsel3', 'kapsel4'],
		counter1 = 0;
	// the next line, of course, assumes you have an element with id="next"
	$('#nextHead').click(function () {
		counter1 = (counter1 + 1) % kapsel.length; // counter optellen
		//html veranderen
		$( '#avaHair' ).css( "background", "url(/img/characters/vrouw/kapsels/"+kapsel[counter1]+".png) center no-repeat" );
	});

	$('#prevHead').click(function () {
		counter1 = (counter1 - 1) % kapsel.length; // counter aftrekken
		//negatief getal preventie
		if(counter1 < 0){
			counter1 = 2;
		}
		//html veranderen
		$( '#avaHair' ).css( "background", "url(/img/characters/vrouw/kapsels/"+kapsel[counter1]+".png) center no-repeat" );
	});

	//array aanmaken met lichaams keuze
	var lichaam = ['cyan', 'paars', 'rood', 'roze'],
		counter2 = 0;
	$('#nextBody').click(function () {
		counter2 = (counter2 + 1) % lichaam.length; // counter optellen
		//html veranderen
		$( '#avaBody' ).css( "background", "url(/img/characters/vrouw/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
		console.log(lichaam[counter2]); // counter optellen
	});

	$('#prevBody').click(function () {
		counter2 = (counter2 - 1) % lichaam.length; // counter aftrekken
		//negatief getal preventie
		if(counter2 < 0){
			counter2 = 2;
		}
		//html veranderen
		$( '#avaBody' ).css( "background", "url(/img/characters/vrouw/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
	});

	//array aanmaken met broek keuze
	var broek = ['bruin', 'cyan', 'rood', 'roze'],
		counter3 = 0;
	$('#nextLegs').click(function () {
		counter3 = (counter3 + 1) % broek.length; // increment your counter
		//html veranderen
		$( '#avaLegs' ).css( "background", "url(/img/characters/vrouw/broek/"+broek[counter3]+".png) center no-repeat" );
	});

	$('#prevLegs').click(function () {
		//negatief getal preventie
		counter3 = (counter3 - 1) % broek.length; // increment your counter
		if(counter3 < 0){
			counter3 = 2;
		}
		//html veranderen
		$( '#avaLegs' ).css( "background", "url(/img/characters/vrouw/broek/"+broek[counter3]+".png) center no-repeat" );
	});
});
</script>

<!--
<div id="avaFemale">
<div id="avaHead">
	<div id="avaFace" style="background: #e29857 url(/img/characters/vrouw/emoties/blij.png) center 29px no-repeat;"></div>
	<div id="avaNeck"></div>
</div>
<div id="avaHair" style="background: url(/img/characters/vrouw/kapsels/kapsel4.png) center no-repeat;"></div>
<div id="avaBody" style="background: url(/img/characters/vrouw/lichaam/cyan.png) center no-repeat;"></div>
<div id="avaLegs" style="background: url(/img/characters/vrouw/broek/bruin.png) center no-repeat;"></div>
</div>-->


<?php $this->load->view("common/header_game"); ?>
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
		<div id="map-container">
			<div id="background">
				
			</div>
			<div id="header">
				<h1 class="logo"><img src="/img/logo.png" /></h1>
				<ul id="header_stats">
					<li>
						<label></label> 
						<span></span>
					</li>
					<li>
						<label></label>
						<span></span>
					</li>
					<li>
						<label></label> 
						<span></span>
					</li>
					<li>
						<label></label>
						<span></span>
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
				<div id="creationFrame">
					<div id="cF1">
						<div id="avatarFields">
							<div id="radio">
								<form action="" method="POST">
									<input type="radio" name="group1" value="man"> man
									<input type="radio" name="group1" value="vrouw"> vrouw
							</div>
							<input id="nickField" type="text" placeholder="Nickname.."  name="nickname" />
						</div>
						<div id="headBlock" class="block">
							<div class="leftArrow" id="prevHead"></div>
							<div id="head">
								<div id="avaHead">
									<div id="avaFace" style="background: #e29857 url(/img/characters/vrouw/emoties/blij.png) center 29px no-repeat;"></div>
									<div id="avaNeck"></div>
								</div>
								<div id="avaHair" style="background: url(/img/characters/vrouw/kapsels/kapsel4.png) center no-repeat;"></div>
							</div>
							<div class="rightArrow" id="nextHead"></div>
						</div>
						<div id="bodyBlock" class="block">
							<div class="leftArrow" id="prevBody"></div>
							<div id="body">
								<div id="avaBody" style="background: url(/img/characters/vrouw/lichaam/cyan.png) center no-repeat; margin: 0px;"></div>
							</div>
							<div class="rightArrow" id="nextBody"></div>
						</div>
						<div id="legBlock" class="block">
							<div class="leftArrow" id="prevLegs"></div>
							<div id="legs">
								<div id="avaLegs" style="background: url(/img/characters/vrouw/broek/bruin.png) center no-repeat; margin: 0px;"></div>
							</div>
							<div class="rightArrow" id="nextLegs"></div>
						</div>
					</div>
					
					<div id="cF2">
						<div id="creationInfo">
							<h2>Creëer nu je eigen avatar personage.</h2>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</br></br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod.
						</div>
						<div class="button2"></div>
							<input class="but1" type="submit" value="Aanmaken" />
						</form>
					</div>
				</div>
				<!--<canvas id="energymeter"></canvas>-->
			</div>
			<div id="map">
			</div>
		</div>
		<!--<div class="content">
			<a href="/index.php/location">Ga naar de kroeg</a>
		</div>-->