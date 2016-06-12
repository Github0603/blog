<?php 
	function p($data){
		dump($data,true,"<pre>",false);
	}


	function html_decode($html){
		return html_entity_decode($html);
	}

 ?>