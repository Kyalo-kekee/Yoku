<?php

namespace Yoku\Ddd\Application\Core;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseController
{


    public function render($template, $data)
    {
        // Logic to render the template or file with the provided data
        $content = $this->renderTemplate($template, $data);

        // Create a new Response object with the rendered content
        $response = new Response($content);

        // Optionally, you can set additional headers or modify the response as needed
        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }

    public function createJsonResponse($data, $statusCode = 200, $headers = [])
    {
        // Create a new JsonResponse object with the provided data and status code
        $response = new JsonResponse($data, $statusCode, $headers);

        return $response;
    }

    private function renderTemplate($template, $data)
    {
        $templatePath = __DIR__ . '../../views' . $template. AppConstants::VIEW_FILE_EXT; // Assuming "views" folder is in the same directory as this class

        if (file_exists($templatePath)) {
            extract($data); // Extract the data array into individual variables for template rendering

            ob_start(); // Start output buffering
            require $templatePath; // Include the template file
            $content = ob_get_clean(); // Get the rendered content from the output buffer
        } else {
            throw new \Exception("Template file not found: $template");
        }

        return $content;
    }
}