<?php

namespace Yoku\Ddd\Application\Core;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Yoku\Ddd\Application\Config\App;
use Yoku\Ddd\Application\Extensions\Twig\AssetExtension;

class BaseController
{
    private $assetBaseUrl;

    public function __construct()
    {
        $this->assetBaseUrl = App::BASE_URL;
    }

    public function render(string $template, array $data = [], bool $loadAsTemplate = true)
    {
        // Logic to render the template or file with the provided data
        if ($loadAsTemplate) {
            $content = $this->renderWithTemplate($template, $data);
        } else {
            $content = $this->renderTemplate($template, $data);
        }

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

    public function asset(string $assetPath): string
    {
        // Construct the URL of the asset based on the asset base URL and the provided asset path
        return rtrim($this->assetBaseUrl, '/') . '/' . ltrim($assetPath, '/');
    }

    private function renderTemplate(string $template, array $data): string
    {
        $templatePath = realpath(__DIR__ . '/../../../views/' . $template . AppConstants::VIEW_FILE_EXT);

        if (file_exists($templatePath)) {
            extract($data); // Extract the data array into individual variables for template rendering

            ob_start(); // Start output buffering
            require $templatePath; // Include the template file
            $content = ob_get_clean(); // Get the rendered content from the output buffer
        } else {
            throw new \Exception("Template file not found: $templatePath");
        }

        return $content;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    private function renderWithTemplate(string $template, array $data): string
    {
        $templatePath = $template . AppConstants::VIEW_FILE_TEMP;

        $templateEngine = new Templating();
        $twig = $templateEngine->registerTwig();

        $twig->addExtension(new AssetExtension());


        try {
           $content = $templateEngine->render($twig,$templatePath,$data);
        }catch (\Exception $e){
            throw new \Exception("File not found:" . $templatePath);
        }

        return $content;
    }
}
