<?php

    function screen_shot($url){
        $screenshot     = "";
        $pagespeed = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=".$url."&fields=lighthouseResult%2Faudits";
        $ch        = curl_init();

        curl_setopt( $ch, CURLOPT_URL, $pagespeed );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, true );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_FORBID_REUSE, true );
        curl_setopt( $ch, CURLOPT_FRESH_CONNECT, true );

        $response = curl_exec( $ch );
        $httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

        curl_close( $ch );

        if ( $httpcode === 200 ) {
            $response = json_decode( $response ,true);
            $screenshot = $response['lighthouseResult']['audits']['final-screenshot']['details']['data'];
        }

        return $screenshot;
    }

    function html_copier($url){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $res = curl_exec($ch);
        curl_close($ch);

        $res = str_replace('<head>', '<head><base href="'.$url.'">', $res);

        return $res;

    }
