<?

$req_uri = dirname($_SERVER['REQUEST_URI']);
$this_dir = basename(dirname(__FILE__));
$last = strlen($req_uri)-strlen($this_dir);
$ht_root =  substr($req_uri, 0, $last);
$ht_root_admin = $ht_root.'admin/';

$http_root = "http://".$_SERVER['SERVER_NAME'].$ht_root;

$file = "../javascript/lightbox.js";
$content = file_get_contents($file);
$regex = "/^fileLoadingImage: \"(.+?)\"/m";
$regex2 = "/^fileBottomNavCloseImage: \"(.+?)\"/m";
$content = preg_replace($regex, "fileLoadingImage: \"{$http_root}\"/images/loading.gif", $content);
$content = preg_replace($regex2, "fileBottomNavCloseImage: \"{$http_root}\"/images/closelabel.gif", $content);
if(@file_put_contents($file, $content))
	echo "'{$file}' angepasst.<br />\n";
else
	echo "Konnte '{$file}' nicht anpassen.<br />\n";


$file = "../admin/js/editor.js";
$content = file_get_contents($file);
$regex = "/^var blogurl = \"(.+?)\";/m";
$content = preg_replace($regex, "var blogurl = \"{$http_root}/admin\";", $content);
if(@file_put_contents($file, $content))
	echo "'{$file}' angepasst.<br />\n";
else
	echo "Konnte '{$file}' nicht anpassen.<br />\n";
?>
<br />
<p><a href="ready.php">Zurück zum Installer</a></p>
