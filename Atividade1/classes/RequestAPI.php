<?php

class RequestAPI
{
    static function request(string $url)
    {
        $ch = curl_init("$url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            http_response_code(400);
            echo json_encode(['message' => 'Curl error: ' . curl_error($ch)]);
            exit;
        }

        curl_close($ch);

        $decoded = json_decode($response, true);

        if (!$decoded) {
            http_response_code(404);
            echo json_encode(['message' => 'Data not found']);
            exit;
        }

        return $decoded;
    }

}
