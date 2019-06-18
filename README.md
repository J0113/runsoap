# Runsoap

### What is RunSoap?
Small PHP script that allows XML from SoapUI to run directly in PHP. 1.1 and 1.2 are supported.

### How does it work?
RunSoap makes use of CURL.

### How do I use it?

Import or Copy and Paste the function into your file
`import runsoap.php;`

Run the function. $mysoap will in this case be an array with the response. $XML should be the xml that is displayed in SoapUI and the $URL should be the endpoint.
`$mysoap = runsoap($url,$xml); `

Display the result.
`var_dump($mysoap);`
