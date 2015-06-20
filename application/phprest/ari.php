<?php  //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_channel($pest,$endpoint) {
    try {
        // URL encode the endpoint
        $endpoint_encoded = urlencode($endpoint);
        
        // Create the channel
        $pest->post('ari/channels?endpoint='.$endpoint_encoded.'&app=hello');
        
        // Temporary hack to get the channel ID once the call is created
        // bug at the moment and hopes to be fixed
        // https://issues.asterisk.org/jira/browse/ASTERISK-22485
        $endpoint_pieces = explode("/",$endpoint);
        $endpoint = $endpoint_pieces[0]."/".$endpoint_pieces[1];
        
        // List the current channels
        $result = json_decode($pest->get('/ari/channels'));
        foreach ($result as $channel)
        {
            //check for a match against the call we just made
            $exploded = explode("-",$channel->name);
            if ($exploded[0] == $endpoint)
            {
                $my_id = $channel->id;
            }
        }
    } catch (Exception $e) {
        print_r($e);
    }
    return $my_id;
}

/* End of file ari.php */
/* Location: ./application/phprest/ari.php */
?>
