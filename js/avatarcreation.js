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
		$('input[type=text]#headId').val(kapsel[counter1]);
		
		$( '#avaBody' ).css( "background", "url(/img/characters/"+gender+"/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
		$('input[type=text]#bodyId').val(lichaam[counter2]);
		
		$( '#avaLegs' ).css( "background", "url(/img/characters/"+gender+"/broek/"+broek[counter3]+".png) center no-repeat" );
		$('input[type=text]#legsId').val(broek[counter3]);
		$('input[type=text]#gender').val("m");
	});
	
	$('#pickFemale').click(function () {
		gender = "vrouw";
		hairDiv = "#avaHair";
		
		$("div#avaHairMale").attr("id","avaHair");
		$("div#avaFaceMale").attr("id","avaFace");
		$( '#avaHair' ).css( "background", "url(/img/characters/"+gender+"/kapsels/"+kapsel[counter1]+".png) center no-repeat" );
		$('input[type=text]#headId').val(kapsel[counter1]);
		
		$( '#avaBody' ).css( "background", "url(/img/characters/"+gender+"/lichaam/"+lichaam[counter2]+".png) center no-repeat" );
		$('input[type=text]#bodyId').val(lichaam[counter2]);
		
		$( '#avaLegs' ).css( "background", "url(/img/characters/"+gender+"/broek/"+broek[counter3]+".png) center no-repeat" );
		$('input[type=text]#legsId').val(broek[counter3]);
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