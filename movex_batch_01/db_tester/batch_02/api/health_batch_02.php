<?php
header('Content-Type: application/json');

echo json_encode([
    'success' => true,
    'message' => 'Batch 02 API is reachable',
    'batch' => '02',
    'time' => date('Y-m-d H:i:s')
], JSON_PRETTY_PRINT);