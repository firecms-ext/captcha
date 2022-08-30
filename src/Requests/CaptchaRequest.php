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
namespace FirecmsExt\Captcha\Requests;

use Hyperf\HttpMessage\Exception\UnauthorizedHttpException;
use Hyperf\Validation\Request\FormRequest;

class CaptchaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'captcha_key' => 'required',
            'captcha_code' => 'required|captcha',
        ];
    }

    protected function failedAuthorization()
    {
        throw new UnauthorizedHttpException(__('message.This action is unauthorized'));
    }
}
