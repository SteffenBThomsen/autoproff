<?php

namespace AutoProff\App;

class JsonResponse
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var int
     */
    private $status;


    /**
     * @var array
     */
    private $data = [];

    /**
     * @var array
     */
    private $statuses = [
        200 => '200 OK',
        400 => '400 Bad Request',
        404 => '404 Not Found',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
    ];


    /**
     * JsonResponse constructor.
     * @param array $data
     * @param string $message
     * @param int $status
     */
    function __construct(array $data, string $message = "OK", int $status = 200)
    {
        $this->data = $data;
        $this->message = $message;
        $this->status = $status;
    }


    /**
     * @return string
     */
    public function respond(): string
    {
        header_remove();
        http_response_code($this->status);
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
        header('Status: ' . $this->statuses[$this->status]);

        return json_encode([
            'status' => $this->status < 300,
            'message' => $this->message,
            'data' => $this->data
        ], true);
    }
}