$(document).ready(function(){

	
	$("#optionsBut").click(function(){
		if($("#optionsButMenu").css("display") == "block")
		{
			// Menu Sluiten
			$("#optionsButMenu").css("display", "none");
		}
		else
		{
			// Menu Openen
			$("#optionsButMenu").css("display", "block");
		}
	});
	
	$(document).click( function(event) {
		// If somewhere outside of the multiselect was clicked then hide the multiselect

		if(!($(event.target).parents().andSelf().is('#optionsBut')) && !($(event.target).parents().andSelf().is('#optionsBut'))){
			$("#optionsButMenu").css('display','none');
		}
	});
	
	$(".consumptions .consumption").click(function(){
		$.ajax({
			url: "/index.php/location/consume/"+$(this).attr("data-id")+"/"
		}).done(function( data ) {
			if ( console && console.log ) {
				if(data == "-1")
				{
					$('.error_message').text("U heeft geen consumpties meer over, keer terug naar de stad.");
				}
				else
				{
					$('.consumptions_left').text(data);
					console.log(data);
				}
			}
		});
	});
	
	if($("#map #labels").length > 0)
	{
		//$.fn.snow({ minSize: 5, maxSize: 50, newOn: 300, flakeColor: '#FFFFFF' });
	}
});

$(window).load(function(){
	if($("#energymeter").length != 0)
	{
		$("#energymeter .amount").text(energy+"%");
		$("#energymeter .bar").animate({ height: energy*1.4+"px"},1000)
		console.log(energy);
	}
});


/**
 * jquery.snow - jQuery Snow Effect Plugin
 *
 * Available under MIT licence
 *
 * @version 1 (21. Jan 2012)
 * @author Ivan Lazarevic
 * @requires jQuery
 * @see http://workshop.rs
 *
 * @params minSize - min size of snowflake, 10 by default
 * @params maxSize - max size of snowflake, 20 by default
 * @params newOn - frequency in ms of appearing of new snowflake, 500 by default
 * @params flakeColor - color of snowflake, #FFFFFF by default
 * @example $.fn.snow({ maxSize: 200, newOn: 1000 });
 */

(function($){$.fn.snow=function(options){var $flake=$('<div id="flake" />').css({'position':'absolute','top':'-50px'}).html('&#10052;'),documentHeight=$(document).height(),documentWidth=$(document).width(),defaults={minSize:10,maxSize:20,newOn:500,flakeColor:"#FFFFFF"},options=$.extend({},defaults,options);var interval=setInterval(function(){var startPositionLeft=Math.random()*documentWidth-100,startOpacity=0.5+Math.random(),sizeFlake=options.minSize+Math.random()*options.maxSize,endPositionTop=documentHeight-40,endPositionLeft=startPositionLeft-100+Math.random()*200,durationFall=documentHeight*10+Math.random()*5000;$flake.clone().appendTo('body').css({left:startPositionLeft,opacity:startOpacity,'font-size':sizeFlake,color:options.flakeColor}).animate({top:endPositionTop,left:endPositionLeft,opacity:0.2},durationFall,'linear',function(){$(this).remove()});},options.newOn);};})(jQuery);