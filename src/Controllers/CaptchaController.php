<?php

declare(strict_types=1);
/**
 * This file is part of FirecmsExt Captcha.
 *
 * @link     https://www.klmis.cn
 * @document https://www.klmis.cn
 * @contact  zhimengxingyun@klmis.cn
 * @license  https://gitee.com/firecms-ext/captcha/blob/master/LICENSE
 */
namespace FirecmsExt\Captcha\Controllers;

use FirecmsExt\Captcha\CaptchaServiceInterface;
use FirecmsExt\Captcha\Requests\CaptchaRequest;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[Controller]
class CaptchaController
{
    #[Inject]
    protected CaptchaServiceInterface $captcha;

    #[Inject]
    protected ResponseInterface $response;

    #[GetMapping(path: '/captcha')]
    public function output(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response->raw($this->captcha->output())
            ->withHeader('Content-Type', 'image/jpeg');
    }

    #[PostMapping(path: '/captcha')]
    public function api(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response->json($this->captcha->api())
            ->withHeader('Content-Type', 'application/json; charset=utf-8');
    }

    #[PostMapping(path: '/captcha/check')]
    public function check(CaptchaRequest $request): \Psr\Http\Message\ResponseInterface
    {
        return $this->response->json(['message' => '验证通过', 'data' => $request->validated()]);
    }
}
