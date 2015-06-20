<?php
 //#!/usr/bin/php
   $descriptorspec = array(
                           0 => array("pipe","r"),   
                           1 => array("pipe","w"),   
                           2 => array("file","/tmp/error.log","a")
                          ) ;
   while (1) {
           $process = proc.open('/Volumes/300/Users/User/Sites/talkoffshore/daemon/ws2'
                      ,$descriptorspec, $pipes);
           require_once("stasis.php");
           $resp = "";
           while (!feof($pipes[1]) {
                $out= fgets($pipes[1]);
                if ($out == "!!!!!!\n") {
                    parse_response(json_decode($resp));
                    $resp = "";
                } else {
                    $resp.=$out;
                }
             }
            fclose($pipes[1]);
            fclose($pipes[0]);
            proc_close($process);
            echo "Sub Process Died - restarting...\n";
            sleep(10);
    }			
?>