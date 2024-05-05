<?php
$conf = [
    'url' => [
        'domain'  => 'https://marcoconcert.com/',
        'success' => 'thank-you-page',
        'fail'    => 'payment-fail'
    ]
];

$redirectURL = "{$conf['url']['domain']}{$conf['url']['fail']}";

if (!empty($_POST['data'])) {
    $data = json_decode(base64_decode($_POST['data']), true);
    if ($data['status'] != 'failure' && $data['status'] != 'error') {
        $redirectURL = "{$conf['url']['domain']}{$conf['url']['success']}";
    }
}

header("Location: {$redirectURL}");
