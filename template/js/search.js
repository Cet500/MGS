$('body').on("click", ".btn-set-search", function() {
	var text = $(this).prev().val();

	location = "http://sergoindustries/_global/search_system.php?text=" + text;
});