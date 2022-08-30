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
namespace FirecmsExt\Captcha;

interface CaptchaServiceInterface
{
    public function api();

    public function output();

    public function check(string $code, ?string $key = null);

    public function encrypt(array $data);

    public function decrypt(string $encrypt);
}
