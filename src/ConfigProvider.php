<?php

declare(strict_types=1);
/**
 * This file is part of FirecmsExt Captcha.
 *
 * @link     https://www.klmis.cn
 * @document https://www.klmis.cn
 * @contact  zhimengxingyun@klmis.cn
 * @license  https://github.com/firecms-ext/captcha/blob/master/LICENSE
 */
namespace FirecmsExt\Captcha;


use FirecmsExt\Captcha\Contracts\CaptchaServiceInterface;
use FirecmsExt\Captcha\Listeners\ValidatorFactoryResolvedListener;
use FirecmsExt\Captcha\Services\CaptchaService;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                CaptchaServiceInterface::class => CaptchaService::class,
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'listeners' => [
                ValidatorFactoryResolvedListener::class
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for captcha.',
                    'source' => __DIR__ . '/../publish/captcha.php',
                    'destination' => BASE_PATH . '/config/autoload/captcha.php',
                ],
            ],
        ];
    }
}
