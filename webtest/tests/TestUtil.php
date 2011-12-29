<?php

class TestUtil{

	private function cleanHTML($html){

		$newHTML = preg_replace('/[\r\n]/', "", $html);
		$newHTML = preg_replace('/[\n]/', "", $newHTML);

		return preg_replace('/[\t]/', "", $newHTML);

	}

}

?>