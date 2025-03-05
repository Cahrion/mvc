<?php

class  View {
	
	public function show ($dosyaad,$data=null,$yonlen=null) {
		require 'views/'.$dosyaad.'.php';
	}
}
?>