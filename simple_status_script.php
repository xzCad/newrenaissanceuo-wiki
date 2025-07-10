<?php
/**
 * Simple Server Status Script
 * Returns just online players and peak for display
 */

// Your server details
$shard_addr = "play.newrenaissaceuo.com";  // Replace with your actual server IP
$shard_port = "2593";

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

function getServerStats($shard_addr, $shard_port) {
    // Open connection to ServUO server
    $fp = @fsockopen($shard_addr, $shard_port, $errno, $errstr, 3);
    
    if (!$fp) {
        return ['online' => false, 'players' => 0, 'peak' => 0];
    }
    
    // Send ServUO status query
    fwrite($fp, "\x7f\x00\x00\x01\xf1\x00\x04\xff");
    stream_set_timeout($fp, 2);
    
    $response = fread($fp, 1000);
    fclose($fp);
    
    if (empty($response)) {
        return ['online' => false, 'players' => 0, 'peak' => 0];
    }
    
    // Parse response
    $data = explode(',', $response);
    if (count($data) < 4) {
        return ['online' => false, 'players' => 0, 'peak' => 0];
    }
    
    // Extract current players
    $players = (int)ltrim(strstr($data[3], '='), '=');
    
    // Get/update peak players for today
    $peak = updateDailyPeak($players);
    
    return ['online' => true, 'players' => $players, 'peak' => $peak];
}

function updateDailyPeak($current_players) {
    $peak_file = 'daily_peak.txt';
    $today = date('Y-m-d');
    
    $peak_data = [];
    if (file_exists($peak_file)) {
        $content = file_get_contents($peak_file);
        $peak_data = json_decode($content, true) ?: [];
    }
    
    // Initialize or update today's peak
    if (!isset($peak_data[$today]) || $current_players > $peak_data[$today]) {
        $peak_data[$today] = $current_players;
        file_put_contents($peak_file, json_encode($peak_data));
    }
    
    return $peak_data[$today];
}

// Get server stats and output
$stats = getServerStats($shard_addr, $shard_port);

if ($stats['online']) {
    echo json_encode([
        'online_players' => $stats['players'],
        'peak_players' => $stats['peak'],
        'status' => 'online'
    ]);
} else {
    echo json_encode([
        'online_players' => 0,
        'peak_players' => 0,
        'status' => 'offline'
    ]);
}
?>