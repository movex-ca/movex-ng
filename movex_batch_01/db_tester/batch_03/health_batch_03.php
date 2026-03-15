<?php
header('Content-Type: application/json');

echo json_encode([
    'success' => true,
    'message' => 'Batch 03 API is reachable',
    'batch' => '03',
    'time' => date('Y-m-d H:i:s')
], JSON_PRETTY_PRINT);