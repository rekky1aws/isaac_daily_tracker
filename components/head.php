<?php 

class Head
{
	private $content = "
	<meta charset=\"utf-8\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"".PATH_PREFIX."/style/main.css\">
	";

	public function getContent ()
	{
		return $this->content;
	}
}

?>

