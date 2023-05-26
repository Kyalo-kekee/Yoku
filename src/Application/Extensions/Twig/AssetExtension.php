<?php

namespace Yoku\Ddd\Application\Extensions\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Yoku\Ddd\Application\Config\App;

class AssetExtension extends AbstractExtension
{
    private $assetBaseUrl;

    public function __construct()
    {
        $this->assetBaseUrl = App::BASE_URL;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('asset', [$this, 'assetFunction']),
        ];
    }

    public function assetFunction(string $assetPath): string
    {
        // Construct the URL of the asset based on the asset base URL and the provided asset path
        return rtrim($this->assetBaseUrl, '/') . '/' . ltrim($assetPath, '/');
    }
}
