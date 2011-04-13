<?php
	$search_value = get_search_query();
	if($search_value == "")
	{
		$search_value = "Search";
	}
?>

<form action="/" method="get">
	<input type="text" name="s" id="search" value="<?php echo $search_value; ?>" />
</form>