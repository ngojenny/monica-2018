$(function(){

	console.log("It's working");
	$('#go-back').on('click', function(e){
		e.preventDefault();
		window.history.back();
	});
});