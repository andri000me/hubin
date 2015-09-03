<?php

function assets($name = "assets", $path_url = 0){
	if($path_url) return base_path().config("path.".$name);
	return asset(config("path.".$name));
}