<form action="a.php?giris" method="post">
<input name="adres" id="email" type="text">
<input class="submit" name="Srgl" type="submit"value="" /></div>
 </form>
<?php 
if(isset($_GET['giris'])){
$adres=$_POST['adres'];
$host = 'www.google.com';
$path = '/webmasters/sitemaps/ping?sitemap=http://'.$adres.'';

$fp = fsockopen($host, 80);
$send = "HEAD $path HTTP/1.1\r\n";
$send .= "HOST: $host\r\n";
$send .= "CONNECTION: Close\r\n\r\n";
fwrite($fp, $send);
$http_response = fgets($fp, 128);
fclose($fp);
list($response, $code) = explode(' ', $http_response);

if ($code != 200) {
    echo 'sunucu baþarýsýz. Verdiði yanýt: ' . $response;
} else {
    echo 'baþarýlý';
}  }
else{}

?>