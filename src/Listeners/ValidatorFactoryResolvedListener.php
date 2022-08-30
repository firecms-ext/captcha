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
namespace FirecmsExt\Captcha\Listeners;

use FirecmsExt\Captcha\CaptchaServiceInterface;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Hyperf\Validation\Event\ValidatorFactoryResolved;
use Hyperf\Validation\Validator;

#[Listener]
class ValidatorFactoryResolvedListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            ValidatorFactoryResolved::class,
        ];
    }

    public function process(object $event): void
    {
        /** @var ValidatorFactoryInterface $validatorFactory */
        $validatorFactory = $event->validatorFactory;

        $validatorFactory->extend('captcha', function ($attribute, $value, $parameters, $validator) {
            /* @var Validator $validator */
            if (env('APP_ENV') === 'dev') {
                // return true;
            }

            return make(CaptchaServiceInterface::class)
                ->check($value, $validator->getData()[reset($parameters) ?: str_replace('_code', '_key', $attribute)]);
        });

        $validatorFactory->replacer('captcha', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':captcha', $attribute, $message);
        });
    }
}
