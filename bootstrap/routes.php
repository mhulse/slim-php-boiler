<?php

$app->get('/', function($request, $response, $args) {
	
	return $this->view->render($response, 'profile.phtml');
	
});
