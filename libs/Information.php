<?php

class Information  {

		function success($deger,$yol) {
			return '<div class="alert alert-success mt-5">'.$deger.'</div>'
			. header("Refresh:3; url=".URL.$yol);
		}
		
		function error($deger=false,$yol) {
			return '<div class="alert alert-danger mt-5">'.$deger.'</div>'
			. header("Refresh:3; url=".URL.$yol);
		}
}
?>