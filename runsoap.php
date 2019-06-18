<?php

/* ---------------------------------
 Run SoapUI actions directly in PHP (supports 1.1 and 1.2)
 1. Set URL to the URL in SoapUI (endpoint)
 2. Set XML (to the XML tab in SoapUI)
/* ---------------------------------   */


function runsoap($url,$xml) {

  // Prepairing the XML
  $xml = '<?xml version="1.0" encoding="utf-8"?>' . $xml;

  // Prepairing the headers
  $runsoap_host = parse_url($url, PHP_URL_HOST);
  $runsoap_path = parse_url($url, PHP_URL_PATH);

  $headers = array(
      "POST $runsoap_path HTTP/1.1",
      "Host: $runsoap_host",
      "Content-Type: application/soap+xml; charset=utf-8",
      "Content-Length: ".strlen($xml)
  );

  // Curl
  $runsoap_ch = curl_init();
  curl_setopt($runsoap_ch, CURLOPT_URL, $url);
  curl_setopt($runsoap_ch, CURLOPT_POST, true);
  curl_setopt($runsoap_ch, CURLOPT_POSTFIELDS, $xml);
  curl_setopt($runsoap_ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($runsoap_ch, CURLOPT_RETURNTRANSFER, 1);
  $runsoap_response = curl_exec($runsoap_ch);
  curl_close($runsoap_ch);

  return json_decode(json_encode(simplexml_load_string(str_replace("</soap:Body>", "", str_replace("<soap:Body>", "", $runsoap_response)))), true);

}

?>
