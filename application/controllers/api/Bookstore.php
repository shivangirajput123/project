<?php
require APPPATH . 'libraries/REST_Controller.php';

class Bookstore extends REST_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        parent::__construct();
    }

    // Calculate Price
    public function calculatePrice_post()
    {
        $json = $this->input->raw_input_stream;

        $data = json_decode($json, true);

        if ($data === null || !isset($data['basket'])) {
            // JSON decoding failed or 'basket' key is missing
            $this->response([
                "valid" => false,
                "status" => "JSON Decoding Error",
                "result" => [
                    "message" => "Invalid JSON data or 'basket' key missing",
                ]
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        // Retrieve the 'basket' data from the decoded JSON
        $basket = $data['basket'];

        $bookPrices = [
            'book1' => 8,
            'book2' => 8,
            'book3' => 8,
            'book4' => 8,
            'book5' => 8
        ];

        $discounts = [
            0,    // 0% discount for 0 different books
            0,    // 0% discount for 1 different book
            0.05, // 5% discount for 2 different books
            0.10, // 10% discount for 3 different books
            0.20, // 20% discount for 4 different books
            0.25  // 25% discount for all 5 different books
        ];

        $totalPrice = $this->calculateTotalPrice($basket, $bookPrices, $discounts);

        $this->response([
            "valid" => true,
            "status" => 'OK',
            "result" => [
                "data" => $totalPrice,
            ]
        ], REST_Controller::HTTP_OK);
    }

    private function calculateTotalPrice($basket, $bookPrices, $discounts)
    {
        $bookCounts = array_count_values($basket);
        $totalPrice = 0;

        // Calculate the total number of different books in the basket
        $differentBooks = count($bookCounts);

        foreach ($bookCounts as $book => $count) {
            $totalPrice += $count * $bookPrices[$book] * (1 - $discounts[$differentBooks]);
        }

        return $totalPrice;
    }
}
