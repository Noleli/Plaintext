$ = jQuery; 
$(document).ready(init);

// jQuery(document).ready(function($) {
//     init($);
// });

function init($)
{
	//$("#search").focus(searchFocus);
	//$("#search").blur(searchBlur);
	fieldInit($("#search"), "Search");
	fieldInit($("#author"), "Name");
	fieldInit($("#email"), "Email – will not be published");
	fieldInit($("#url"), "URL");
	
	doSidebar();
	
	//$("#sidebar").fadeTo(800, 1);
}

function doSidebar()
{
	if($("#sidebar").height() < $(document).height())
	{
		$("#sidebar").height($(document).height() - 120); // minus 120 because of the 60px of top and bottom padding
	}
	
	if(!$.readCookie("animate")) // might be nice to add a document.referrer.match(document.domain), but deal with www.
	{
		$("#sidebar").delay(600).fadeTo(1400, 1); //css("opacity", 0)
		$.setCookie( 'animate', 'true', {
			duration : 0.0416666667, // 1 hour In days
			path : '/',
			domain : '',
			secure : false
		});
	}
	else{
		$("#sidebar").css("opacity", 1);
		$.setCookie( 'animate', 'true', {
			duration : 0.0416666667, // 1 hour In days
			path : '/',
			domain : '',
			secure : false
		});
		
	}
}

function fieldInit(box, defaultText)
{
	//box = $("#search");
	var val = box.val();
	if(val != defaultText)
	{
		box.css("color", "#2d2d2d");
	}
	else
	{
		box.css("color", "#DAD9D8");
	}
	box.focus(function() {fieldFocus(box, defaultText);});
	box.blur(function() {fieldBlur(box, defaultText);});
}

function fieldFocus(box, defaultText)
{
	//box = $("#search");
	var val = box.val();
	if(val == defaultText)
	{
		box.val("");
		box.css("color", "#2d2d2d");
	}
}

function fieldBlur(box, defaultText)
{
	//box = $("#search");
	var val = box.val();
	if(val == "")
	{
		box.val(defaultText);
		box.css("color", "#DAD9D8");
	}
}