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
namespace FirecmsExt\Captcha\Contracts;

interface CaptchaServiceInterface
{
    public function api();

    public function output();

    public function check(string $code, ?string $key = null);
}
