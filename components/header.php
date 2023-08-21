<?php 

class Header
{
	private $content = "
	<header>
		<span> The Binding of Isaac </span>
		<h1> Daily Run Tracker </h1>
	</header>
	";

	public function getContent ()
	{
		return $this->content;
	}
}

?>