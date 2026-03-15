<?php
header('Content-Type: application/json');
require_once '../../config/db.php';

function generateOrderCode(): string {
    return 'MOV-NG-ORD-' . date('Y') . '-' . str_pad((string) rand(1, 9999), 4, '0', STR_PAD_LEFT);
}

try {
    $input = $_POST;

    $customer_user_id = isset($input['customer_user_id']) ? (int)$input['customer_user_id'] : 1;
    $pool_id = isset($input['pool_id']) ? (int)$input['pool_id'] : 1;

    $sender_name = trim($input['sender_name'] ?? 'Test Sender');
    $sender_phone = trim($input['sender_phone_e164'] ?? '+2348012345678');
    $receiver_name = trim($input['receiver_name'] ?? 'Test Receiver');
    $receiver_phone = trim($input['receiver_phone_e164'] ?? '+2348098765432');
    $goods_description = trim($input['goods_description'] ?? 'Test goods');
    $goods_value_kobo = isset($input['goods_value_kobo']) ? (int)$input['goods_value_kobo'] : 100000;
    $delivery_type = trim($input['delivery_type'] ?? 'same_day');
    $insurance_opt_in = isset($input['insurance_opt_in']) ? (int)$input['insurance_opt_in'] : 0;

    $pickup_address = trim($input['pickup_address'] ?? '12 Allen Avenue, Ikeja, Lagos');
    $dropoff_address = trim($input['dropoff_address'] ?? '25 Admiralty Way, Lekki, Lagos');

    $base_price_kobo = isset($input['base_price_kobo']) ? (int)$input['base_price_kobo'] : 200000;
    $distance_km = isset($input['distance_km']) ? (float)$input['distance_km'] : 10.5;
    $distance_fee_kobo = isset($input['distance_fee_kobo']) ? (int)$input['distance_fee_kobo'] : 50000;
    $pool_fee_kobo = isset($input['pool_fee_kobo']) ? (int)$input['pool_fee_kobo'] : 25000;
    $labour_fee_kobo = isset($input['labour_fee_kobo']) ? (int)$input['labour_fee_kobo'] : 0;
    $waiting_fee_kobo = isset($input['waiting_fee_kobo']) ? (int)$input['waiting_fee_kobo'] : 0;
    $insurance_fee_kobo = isset($input['insurance_fee_kobo']) ? (int)$input['insurance_fee_kobo'] : 0;
    $discount_kobo = isset($input['discount_kobo']) ? (int)$input['discount_kobo'] : 0;
    $promo_kobo = isset($input['promo_kobo']) ? (int)$input['promo_kobo'] : 0;

    $total_amount_kobo = $base_price_kobo
        + $distance_fee_kobo
        + $pool_fee_kobo
        + $labour_fee_kobo
        + $waiting_fee_kobo
        + $insurance_fee_kobo
        - $discount_kobo
        - $promo_kobo;

    $order_code = generateOrderCode();

    $pdo->beginTransaction();

    $sqlOrder = "INSERT INTO orders
        (order_code, customer_user_id, company_id, pool_id, sender_name, sender_phone_e164, receiver_name, receiver_phone_e164, goods_description, goods_value_kobo, delivery_type, insurance_opt_in, payment_status, order_status, notes)
        VALUES
        (:order_code, :customer_user_id, NULL, :pool_id, :sender_name, :sender_phone_e164, :receiver_name, :receiver_phone_e164, :goods_description, :goods_value_kobo, :delivery_type, :insurance_opt_in, 'unpaid', 'pending', 'API test create')";

    $stmtOrder = $pdo->prepare($sqlOrder);
    $stmtOrder->execute([
        ':order_code' => $order_code,
        ':customer_user_id' => $customer_user_id,
        ':pool_id' => $pool_id,
        ':sender_name' => $sender_name,
        ':sender_phone_e164' => $sender_phone,
        ':receiver_name' => $receiver_name,
        ':receiver_phone_e164' => $receiver_phone,
        ':goods_description' => $goods_description,
        ':goods_value_kobo' => $goods_value_kobo,
        ':delivery_type' => $delivery_type,
        ':insurance_opt_in' => $insurance_opt_in
    ]);

    $order_id = (int)$pdo->lastInsertId();

    $sqlLocation = "INSERT INTO order_locations
        (order_id, location_type, contact_name, contact_phone_e164, full_address, landmark, state_id, city_id, google_place_id, latitude, longitude)
        VALUES
        (:order_id, :location_type, :contact_name, :contact_phone_e164, :full_address, NULL, NULL, NULL, NULL, NULL, NULL)";
    $stmtLocation = $pdo->prepare($sqlLocation);

    $stmtLocation->execute([
        ':order_id' => $order_id,
        ':location_type' => 'pickup',
        ':contact_name' => $sender_name,
        ':contact_phone_e164' => $sender_phone,
        ':full_address' => $pickup_address
    ]);

    $stmtLocation->execute([
        ':order_id' => $order_id,
        ':location_type' => 'dropoff',
        ':contact_name' => $receiver_name,
        ':contact_phone_e164' => $receiver_phone,
        ':full_address' => $dropoff_address
    ]);

    $sqlPricing = "INSERT INTO order_pricing
        (order_id, base_price_kobo, distance_km, distance_fee_kobo, pool_fee_kobo, labour_fee_kobo, waiting_fee_kobo, insurance_fee_kobo, discount_kobo, promo_kobo, total_amount_kobo, currency_code, pricing_status, pricing_notes)
        VALUES
        (:order_id, :base_price_kobo, :distance_km, :distance_fee_kobo, :pool_fee_kobo, :labour_fee_kobo, :waiting_fee_kobo, :insurance_fee_kobo, :discount_kobo, :promo_kobo, :total_amount_kobo, 'NGN', 'estimated', 'API test pricing')";
    $stmtPricing = $pdo->prepare($sqlPricing);

    $stmtPricing->execute([
        ':order_id' => $order_id,
        ':base_price_kobo' => $base_price_kobo,
        ':distance_km' => $distance_km,
        ':distance_fee_kobo' => $distance_fee_kobo,
        ':pool_fee_kobo' => $pool_fee_kobo,
        ':labour_fee_kobo' => $labour_fee_kobo,
        ':waiting_fee_kobo' => $waiting_fee_kobo,
        ':insurance_fee_kobo' => $insurance_fee_kobo,
        ':discount_kobo' => $discount_kobo,
        ':promo_kobo' => $promo_kobo,
        ':total_amount_kobo' => $total_amount_kobo
    ]);

    $pdo->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Order created successfully',
        'data' => [
            'order_id' => $order_id,
            'order_code' => $order_code,
            'total_amount_kobo' => $total_amount_kobo
        ]
    ], JSON_PRETTY_PRINT);

} catch (Throwable $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}