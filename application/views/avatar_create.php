<?php $this->load->view("common/header_game"); ?>

<script>
var gender = "man";
var hairDiv = "#avaHairMale";

$(function () { //document ready
	
	$(document).ready(function(){
		$("#creationFrame").hide(0).delay(0).fadeIn(1000);
		$("#creationInfo").hide(0).delay(2000).fadeIn(1000);
		$(".but1").hide(0).delay(3000).fadeIn(1000);
	});

	//array aanmaken met kapsel keuze
	var kapsel = ['1', '2', '3', '4'],
	counter1 = 0;
		
	//array aanmaken met lichaams keuze
	var lichaam = ['1', '2', '3', '4'],
	counter2 = 0;
		
	//array aanmaken met broek keuze
	var broek = ['1', '2', '3', '4'],
	counter3 = 0;
	
	$('#pickMale').click(function () {	
		gender = "man";
		hairDiv = "#avaHairMale";
		
		$("div#avaHair").attr("id","avaHairMale");
		$("div#avaFace").attr("id","avaFaceMale");
		$( '#avaHairMale' ).css( "background", "url(/img/characters/"+gender+"/kapsels/"+kapsel[counter1]+".png) center bottom no-repeat" );
		$('input[type=text]#headId').val(lichaam[counter1]);
		
		$( '#avaBody' ).css( "background", "url(/img/characters/"+gender+"/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
		$('input[type=text]#bodyId').val(lichaam[counter2]);
		
		$( '#avaLegs' ).css( "background", "url(/img/characters/"+gender+"/broek/"+broek[counter3]+".png) center no-repeat" );
		$('input[type=text]#legsId').val(lichaam[counter3]);
		$('input[type=text]#gender').val("m");
	});
	
	$('#pickFemale').click(function () {
		gender = "vrouw";
		hairDiv = "#avaHair";
		
		$("div#avaHairMale").attr("id","avaHair");
		$("div#avaFaceMale").attr("id","avaFace");
		$( '#avaHair' ).css( "background", "url(/img/characters/"+gender+"/kapsels/"+kapsel[counter1]+".png) center no-repeat" );
		$('input[type=text]#headId').val(lichaam[counter1]);
		
		$( '#avaBody' ).css( "background", "url(/img/characters/"+gender+"/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
		$('input[type=text]#bodyId').val(lichaam[counter2]);
		
		$( '#avaLegs' ).css( "background", "url(/img/characters/"+gender+"/broek/"+broek[counter3]+".png) center no-repeat" );
		$('input[type=text]#legsId').val(lichaam[counter3]);
		$('input[type=text]#gender').val("v");
	});

	// the next line, of course, assumes you have an element with id="next"
	$('#nextHead').click(function () {
		counter1 = (counter1 + 1) % kapsel.length; // counter optellen
		//html veranderen
		$( hairDiv ).css( "background", "url(/img/characters/"+gender+"/kapsels/"+kapsel[counter1]+".png) center bottom no-repeat" );
		$('input[type=text]#headId').val(lichaam[counter1]);
	});

	$('#prevHead').click(function () {
		counter1 = (counter1 - 1) % kapsel.length; // counter aftrekken
		//negatief getal preventie
		if(counter1 < 0){
			counter1 = 2;
		}
		//html veranderen
		$( hairDiv ).css( "background", "url(/img/characters/"+gender+"/kapsels/"+kapsel[counter1]+".png) center bottom no-repeat" );
		$('input[type=text]#headId').val(lichaam[counter1]);
	});


	$('#nextBody').click(function () {
		counter2 = (counter2 + 1) % lichaam.length; // counter optellen
		//html veranderen
		$( '#avaBody' ).css( "background", "url(/img/characters/"+gender+"/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
		$('input[type=text]#bodyId').val(lichaam[counter2]);
		console.log(lichaam[counter2]); // counter optellen
	});

	$('#prevBody').click(function () {
		counter2 = (counter2 - 1) % lichaam.length; // counter aftrekken
		//negatief getal preventie
		if(counter2 < 0){
			counter2 = 2;
		}
		//html veranderen
		$( '#avaBody' ).css( "background", "url(/img/characters/"+gender+"/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
		$('input[type=text]#bodyId').val(lichaam[counter2]);
	});


	$('#nextLegs').click(function () {
		counter3 = (counter3 + 1) % broek.length; // increment your counter
		//html veranderen
		$( '#avaLegs' ).css( "background", "url(/img/characters/"+gender+"/broek/"+broek[counter3]+".png) center no-repeat" );
		$('input[type=text]#legsId').val(lichaam[counter3]);
	});

	$('#prevLegs').click(function () {
		//negatief getal preventie
		counter3 = (counter3 - 1) % broek.length; // increment your counter
		if(counter3 < 0){
			counter3 = 2;
		}
		//html veranderen
		$( '#avaLegs' ).css( "background", "url(/img/characters/"+gender+"/broek/"+broek[counter3]+".png) center no-repeat" );
		$('input[type=text]#legsId').val(lichaam[counter3]);
	});
	
});

function changeSkinColor(color){
	if(gender == "man")
	{
		$( '#avaFaceMale' ).css( "background-color", "#"+color );
	}
	else
	{
		$( '#avaFace' ).css( "background-color", "#"+color );
	}
	$( '#avaNeck' ).css( "background-color", "#"+color );
	$('input[type=text]#skinColor').val(color);
}

</script>

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
									<input id="pickMale" type="radio" name="group1" value="man" checked > man
									<input id="pickFemale" type="radio" name="group1" value="vrouw" > vrouw
							</div>
							<input id="nickField" type="text" placeholder="Nickname.."  name="nickname" />
							<input id="headId" type="text" name="headId" value="1" hidden />
							<input id="bodyId" type="text" name="bodyId" value="1" hidden />
							<input id="legsId" type="text" name="legsId" value="1" hidden />
							<input id="skinColor" type="text" name="skinColor" value="e29857" hidden />
							<input id="gender" type="text" name="gender" value="m" hidden />
						</div>
						<div id="headBlock" class="block">
							<div class="leftArrow" id="prevHead"></div>
							<div id="head">
								<div id="avaHead">
									<div id="avaFaceMale"></div>
									<div id="avaNeck"></div>
								</div>
								<div id="avaHairMale" style="background: url(/img/characters/man/kapsels/1.png) center bottom no-repeat;"></div>
							</div>
							<div class="rightArrow" id="nextHead"></div>
						</div>
						<div id="bodyBlock" class="block">
							<div class="leftArrow" id="prevBody"></div>
							<div id="body">
								<div id="avaBody" style="background: url(/img/characters/man/lichaam/1.png) center no-repeat; margin: 0px;"></div>
							</div>
							<div class="rightArrow" id="nextBody"></div>
						</div>
						<div id="legBlock" class="block">
							<div class="leftArrow" id="prevLegs"></div>
							<div id="legs">
								<div id="avaLegs" style="background: url(/img/characters/man/broek/1.png) center no-repeat; margin: 0px;"></div>
							</div>
							<div class="rightArrow" id="nextLegs"></div>
						</div>
						<div id="optionsBlock" class="block">
							<table>
								<tr>
									<td>Huidskleur:</td>
									<td>
										<div id="skin1" class="skin" onclick="changeSkinColor('e29857');"></div>
										<div id="skin2" class="skin" onclick="changeSkinColor('df873a');"></div>
										<div id="skin3" class="skin" onclick="changeSkinColor('dc7923');"></div>
										<div id="skin4" class="skin" onclick="changeSkinColor('a64e00');"></div>
										<div id="skin5" class="skin" onclick="changeSkinColor('2c1501');"></div>
									</td>
								</tr>
							</table>
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
					<div class="clear"></div>
				</div>
				<!--<canvas id="energymeter"></canvas>-->
			</div>
			<div id="map">
			</div>
		</div>
		<!--<div class="content">
			<a href="/index.php/location">Ga naar de kroeg</a>
		</div>

<div id="avaFemale" style="margin-left: 300px;">
	<div id="avaHead">
		<div id="avaFace" style="background: #e29857 url(/img/characters/vrouw/emoties/blij.png) center 29px no-repeat;"></div>
		<div id="avaNeck"></div>
	</div>
	<div id="avaHair" style="background: url(/img/characters/vrouw/kapsels/1.png) center no-repeat;"></div>
	<div id="avaBody" style="background: url(/img/characters/vrouw/lichaam/2.png) center no-repeat;"></div>
	<div id="avaLegs" style="background: url(/img/characters/vrouw/broek/3.png) center no-repeat;"></div>
</div>
		
<div id="avaMale">
	<div id="avaHead">
		<div id="avaFaceMale" style="background: #e29857 url(/img/characters/man/emoties/blij.png) center 19px no-repeat;"></div>
		<div id="avaNeck"></div>
	</div>
	<div id="avaHairMale" style="background: url(/img/characters/man/kapsels/1.png) center bottom no-repeat;"></div>
	<div id="avaBody" style="background: url(/img/characters/man/lichaam/2.png) center no-repeat;"></div>
	<div id="avaLegs" style="background: url(/img/characters/man/broek/3.png) center no-repeat;"></div>
</div>-->
