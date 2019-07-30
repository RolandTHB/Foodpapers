<?php if (!class_exists('CaptchaConfiguration')) { return; }

// BotDetect PHP Captcha configuration options

return [
    // Captcha configuration for example page
    'ExampleCaptcha' => [
        'UserInputID' => 'captchaCode',
        'ImageWidth' => 250,
        'ImageHeight' => 50,
    ],

    // Captcha configuration for article page
    'AddArticleCaptcha' => [
        'UserInputID' => 'captchaCode',
        'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
        'ImageStyle' => [
            ImageStyle::Radar,
            ImageStyle::Collage,
            ImageStyle::Fingerprints,
        ],
    ],

    // Captcha configuration for register page
    'RegisterCaptcha' => [
        'UserInputID' => 'captchaCode2',
        'ImageWidth' => 250,
        'ImageHeight' => 50,
    ],

    // Captcha configuration for register page
    'RegCaptcha' => [
        'UserInputID' => 'captchaCode2',
        'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
        'ImageStyle' => [
            ImageStyle::Radar,
            ImageStyle::Collage,
            ImageStyle::Fingerprints,
        ],
    ],


];