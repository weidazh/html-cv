ALL: tmp/test.html cv.css

%.css: %.css.in
	sh A4.sh < $< > $@

tmp/test.html: A4.html.in
	sh A4.sh < $< > $@
