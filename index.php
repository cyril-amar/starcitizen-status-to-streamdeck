<?php
/**
 * @author Cyril AMAR
 */

$xmlUrl = 'https://status.robertsspaceindustries.com/index.xml';
$localFile = 'cache';

$cache = unserialize(file_get_contents($localFile));

if ($cache['ts'] < (time() + 900)) {
    // Latest check is more than 15 minutes ago, refresh
    $cache['ts'] = time();
    try {
        $data = file_get_contents($xmlUrl);
        $xml = new SimpleXMLElement($data);
        $title = $xml->channel->item[0]->title;
        if (str_starts_with($title, '[Resolved]')) {
            $cache['status'] = 'OK';
        } else {
            $cache['status'] = 'KO';
        }
    } catch (Exception) {
        $cache['status'] = 'ERR';
    }
    file_put_contents($localFile, serialize($cache));
}

header('Content-type: image/png');

switch ($cache['status']) {
    case 'OK':
        readfile('sc_ok.png');
        break;
    case 'KO':
        readfile('sc_ko.png');
        break;
    default:
        readfile('sc_err.png');
}
