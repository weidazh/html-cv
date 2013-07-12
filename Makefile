ALL: tmp/test.html cv.less.css

%.less.css: %.less
	lessc $< $@

tmp/test.html: A4.html.in
	sh A4.sh < $< > $@
