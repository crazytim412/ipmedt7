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
			url: "/index.php/location/consume/"+$(this).attr("data-id")+"/",
			dataType: 'json',
			success: function(data){
				if ( console && console.log ) {
					if(data.consumptions_left == "-1")
					{
						$('.error_message').text("U heeft geen consumpties meer over, keer terug naar de stad.");
					}
					else
					{
						$('.consumptions_left').text(data.consumptions_left);
						$("#header_stats li").first().children("span").text(data.mood);
						//$("#header_stats li").fifth().children("span").text(data.Score);
						console.log(data);
					}
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
		$("#energymeter .bar").animate({ height: energy*2.8+"px"},1000)
		console.log(energy);
	}
});
;