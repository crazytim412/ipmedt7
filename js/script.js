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
});

$(window).load(function(){
	if($("#energymeter").length != 0)
	{
		$("#energymeter .amount").text(energy+"%");
		$("#energymeter .bar").animate({ height: energy*0.8+"px"},1000)
		console.log(energy);
	}
});