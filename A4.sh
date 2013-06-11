#!/bin/sh


MARGIN=10
PAGE_WIDTH=210
PAGE_HEIGHT=297
TOP_OFFSET=$(expr $PAGE_HEIGHT - $MARGIN)
PAGECONTENT_WIDTH=$(expr $PAGE_WIDTH - $MARGIN '*' 2)
PAGECONTENT_HEIGHT=$(expr $PAGE_HEIGHT - $MARGIN '*' 2)

mkdir -p ./tmp/
cat A4.html.in |
	sed -e 's/@MARGIN@/'"$MARGIN"'/g' |
	sed -e 's/@PAGE_WIDTH@/'"$PAGE_WIDTH"'/g' |
	sed -e 's/@PAGE_HEIGHT@/'"$PAGE_HEIGHT"'/g' |
	sed -e 's/@PAGECONTENT_WIDTH@/'"$PAGECONTENT_WIDTH"'/g' |
	sed -e 's/@PAGECONTENT_HEIGHT@/'"$PAGECONTENT_HEIGHT"'/g' |
	sed -e 's/@TOP_OFFSET@/'"$TOP_OFFSET"'/g' |
	cat > tmp/test.html
