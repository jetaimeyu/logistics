<?php
return [
    'rate_limit'=>[
        'access'=>env('RATE_LIMITS','60,100'),
        'sign' =>env('SIGN_RATE_LIMIT', '10,100')
    ]
];
