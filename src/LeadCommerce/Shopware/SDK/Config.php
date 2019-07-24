<?php

namespace LeadCommerce\Shopware\SDK;

/**
 * Class Configuration
 * @package LeadCommerce\Shopware\SDK
 */
class Config
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var array
     */
    private $guzzleOptions;

    /**
     * Config constructor.
     * @param string $baseUrl
     * @param string|null $username
     * @param string|null $apiKey
     * @param array $guzzleOptions
     */
    public function __construct(string $baseUrl, string $username = null, string $apiKey = null, array $guzzleOptions = [])
    {
        $this->baseUrl = $baseUrl;
        $this->username = $username;
        $this->apiKey = $apiKey;
        $this->guzzleOptions = $guzzleOptions;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return array
     */
    public function getGuzzleOptions(): array
    {
        return $this->guzzleOptions;
    }
}
