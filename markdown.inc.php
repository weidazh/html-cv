<?
function markdown ($md) {
    $procdesc = array(
        0 => array("pipe", "r"),
        1 => array("pipe", "w"),
        2 => STDERR,
    );
    $handle = proc_open("markdown", $procdesc, $pipes);
    if (is_resource($handle)) {
	fwrite($pipes[0], $md);
	fclose($pipes[0]);

	$html = stream_get_contents($pipes[1]);
	fclose($pipes[1]);

	$return_value = proc_close($handle);
	return $html;
    }

    return "markdown failure";
}
?>
