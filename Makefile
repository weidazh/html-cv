ALL: tmp/test.html cv.less.css cv.html cv.sample.html

%.less.css: %.less
	lessc $< $@

tmp/test.html: A4.html.in
	sh A4.sh < $< > $@

cv.html: cv.inc.php cv.php markdown.inc.php
	php cv.php $< > $@

cv.sample.html: cv.inc.sample.php cv.php markdown.inc.php
	php cv.php $< > $@
