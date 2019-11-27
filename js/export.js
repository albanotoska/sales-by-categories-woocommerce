$( document ).ready(function() {
	$("#export").click(function(){
	$("#order_by_categories").table2csv();
});
	$("#export_cantanti").click(function(){
	$(".cantanti_table").table2csv();
});
	$("#export_dj").click(function(){
	$(".dj_table").table2csv();
});
	$("#export_club").click(function(){
	$(".club_table").table2csv();
});
});
