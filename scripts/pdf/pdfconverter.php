<?php
// Set parameters
$apikey = '6b00c851-d015-4b39-b143-0ca99e9d1c30';
$value = '../../pages/pdf/OfferteFactuur'; // can aso be a url, starting with http..

// Convert the HTML string to a PDF using those parameters.  Note if you have a very long HTML string use POST rather than get.  See example #5
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($value));

// Output headers so that the file is downloaded rather than displayed
// Remember that header() must be called before any actual output is sent
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($result));

// Make the file a downloadable attachment - comment this out to show it directly inside the
// web browser.  Note that you can give the file any name you want, e.g. alias-name.pdf below:
header('Content-Disposition: attachment; filename=' . 'alias-name.pdf' );

// Stream PDF to user
echo $result;
 ?>
