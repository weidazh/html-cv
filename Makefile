ALL: cv.less.css cv.sample.html

%.less.css: %.less
	lessc $< $@

cv.sample.html: cv.inc.sample.php cv.php markdown.inc.php
	php cv.php $< > $@
