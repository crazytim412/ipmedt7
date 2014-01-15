<?php $this->load->view("common/header_game"); ?>
<script type="text/javascript" src="/js/avatarcreation.js"></script>
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
							De keuzes die je maakt hebben invloed op je humeur, energie en gezondheid, blijf daarom nadenken bij wat je nuttigt.
							Op het hoofdscherm kan je kiezen om de verschillende locaties binnen te gaan, let op dat je genoeg energie hebt!</br></br>
							Voor meer info over drugs, check de bijbehorende App:</br></br>
							<a href="http://konscio.nl/app/konscio1.apk">
								<div class="androidApp">Download <b>Android App</b></div>
							</a>
							</br></br>
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
