<?php

function responseJson($status, $message, $data = null)
{
    $response =
        [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    return response()->json($response);
}


/**
 * firebase cloud messaging
 */
function notifyByFirebase($title,$body,$tokens,$data = [])        // parameter 5 =>>>> $type
{
    $registrationIDs = $tokens;
    $fcmMsg = array(
        'title' => $title,
        'body' => $body,
        'sound' => "default",
        'color' => "#203E78"
    );
    $fcmFields = array(
        'registration_ids' => $registrationIDs,
        'priority' => 'high',
        'notification' => $fcmMsg,
        'data' => $data
    );
    $headers = array(
        'Authorization: key='.env('FIREBASE_API_ACCESS_KEY'),
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
