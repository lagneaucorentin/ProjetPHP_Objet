<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 15/01/2018
 * Time: 15:33
 */

namespace Projet\Core\Routing;

class Route
{
    private $path;
    private $httpMethod;
    private $action;

    public function __construct(array $httpMethod, string $path, string $action)
    {
        $this->httpMethod = $httpMethod;
        $this->path = $path;
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getHttpMethod(): array
    {
        return $this->httpMethod;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }
}