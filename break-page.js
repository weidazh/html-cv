function get_bottom(obj) {
	return $(obj).offset().top + $(obj).height();
}

function create_new_page(_parent) {
	var new_page = $('<div class="A4Portrait"><div class="INNER"></div></div>')
	new_page.appendTo(_parent);
	return new_page.find(".INNER")[0];
}

// split the section and move the bottom half to the new page
function split_section(section, page, new_page) {
	var new_page_section = $('<div class="section"><h2></h2><hr/><ul></ul></div>');
	var new_page_ul = $(new_page_section).find("ul");
	$(new_page_section).find("h2")
			.text($(section).find("h2").text())
			.addClass("cont");
	var splitted = false;
	$(section).find("li").each(function() {
		console.log("li: " + this);
		if (splitted || get_bottom(this) > get_bottom(page)) {
			$(this).detach();
			$(this).appendTo(new_page_ul);
			splitted = true;
		}
	});
	if (splitted && $(section).find("li").length == 0) {
		$(section).remove();
		$(new_page_section).find("h2").removeClass("cont");
	}
	if (splitted) {
		$(new_page).append(new_page_section);
	}
	return splitted;
}

function adjust_page() {
	var i = 0;
	if (document.location.hash == "#show-hidden") {
	    $(".hidden").removeClass("hidden").addClass("hidden-shown");
	}
	while(true) {
		console.log(i);
		var page = $(".A4Portrait").not(".hidden").find(".INNER")[i];
		if (!page)
			break;
		var new_page = undefined;
		$(page).find(".section").each(function() {
			var section = this;
			var splitted = false;
			console.log("Section: " + section);
			if (get_bottom(section) > get_bottom(page)) {
				if (! new_page) {
					new_page = create_new_page($(page).parent().parent());
					splitted = split_section(section, page, new_page);
				}
			}
			if (new_page && ! splitted) {
				$(new_page).append($(section).detach());
			}
		});
		i += 1;
	}
}

// $(document).ready(function(){ setTimeout(adjust_page, 1000); });

