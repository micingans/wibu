<?php 

function http_request($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    return $output;
}

echo "###################################################\n";
echo "#                 Doujin Info                     #\n";
echo "#                Coded By Micin                   #\n";
echo "###################################################\n";
echo "Masukan Kode : ";
$code = trim(fgets(STDIN));

$crot = http_request("https://nhopener-api.now.sh/$code");
$crot = json_decode($crot, TRUE);

$title  = $crot['title']['display'];
$cover  = $crot['images']['cover']['link'];
$artis  = $crot['metadata']['artist']['name'];
$tags   = $crot['metadata']['artist']['url'];

echo "[+] Title  : ".$title."\n";
echo "[+] Cover  : ".$cover."\n";
echo "[+] Artis  : ".$artis."\n";
echo "[+] Tag    : ".$tags."\n";
echo "[+] Url    : https://nhentai.net/g/$code\n";

?>
