<?php
 function parse_response($response) 
 {
    echo "Type: ".$response->type."\n";
	print_r($response);
	switch($response->type) {
	     case "StasisStart":
		      $channel = $response->channel;
			  echo $channel->name." is starting a stasis call (uniqueid: ".$channel-id.")\n";
			  break;
	     case "StasisEnd":
		      $channel = $response->channel;
			  echo $channel->name." is ending a stasis call (uniqueid: ".$channel-id.")\n";
			  break;
                            }			  
 }
?>