$(document).ready(function(){

	// Wessel: Het instellingen menu tonen wanneer er op de button gedrukt wordt de status BLOCK geven.
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
	
	// Wessel: Als er buiten het menu wordt geklikt wanneer het menu open staan, menu sluiten.
	$(document).click( function(event) {
		// If somewhere outside of the multiselect was clicked then hide the multiselect

		if(!($(event.target).parents().andSelf().is('#optionsBut')) && !($(event.target).parents().andSelf().is('#optionsBut'))){
			$("#optionsButMenu").css('display','none');
		}
	});
	
	// Wessel: Consumpties via jQuery laten verlopen. Er wordt een php script aangeroepen en een consumptie ID meegegeven.
	$(".consumptions .consumption").click(function(){
		$.ajax({
			url: "/index.php/location/consume/"+$(this).attr("data-id")+"/",
			dataType: 'json',
			success: function(data){
				if ( console && console.log ) {
					if(data == "-1")
					{
						$('.error_message').text("U heeft onvoldoende consumpties, keer terug naar de stad of neem iets anders.");
					}
					else
					{
						// Plaats de gereturnde json waarden in de juist containers
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

// Wessel
$(window).load(function(){
	if($("#energymeter").length != 0)
	{
		// berekenen van de hoogte van de meter in verhouding tot de waarde
		$("#energymeter .amount").text(energy+"%");
		$("#energymeter .bar").animate({ height: energy*2.8+"px"},1000)
		console.log(energy);
	}
});
;