# Runsoap

### What is RunSoap?
Small PHP script that allows XML from SoapUI to run directly in PHP. 1.1 and 1.2 are supported.

### How does it work?
RunSoap makes use of CURL.

### How do I use it?

Easy:
import runsoap.php; // Or however the file is called/ copy and paste the function into your PHP code.
$mysoap = runsoap($url,$xml); 

var_dump($mysoap); // Show the result
