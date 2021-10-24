
$(document).ready(() => {
	hideOverLay();
	$("a").click(function(){
		showOverLay();
	});
  $("#categories").carousel({
    touch: true,
    ride: 'false',
    interval: false,
    wrap: true
  });
});


function hideOverLay() {
	  $("div.spanner").removeClass("show");
	  $("div.overlay").removeClass("show");
}

function showOverLay() {
		$("div.spanner").addClass("show");
		$("div.overlay").addClass("show");
}