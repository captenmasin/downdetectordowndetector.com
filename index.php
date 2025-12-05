<?php
$targetUrl = 'https://downdetector.com/';

function isAccessible(string $url, int $timeout = 10): array
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_NOBODY        => false,
        CURLOPT_HTTPGET       => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT        => $timeout,
        CURLOPT_CONNECTTIMEOUT => $timeout,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36',
    ]);

    $body  = curl_exec($ch);
    $error = curl_error($ch);
    $code  = curl_getinfo($ch, CURLINFO_RESPONSE_CODE) ?: 0;
    curl_close($ch);

    return [
        'ok'    => $body !== false && (($code >= 200 && $code < 400) || $code === 403),
        'code'  => $code,
        'error' => $body === false ? $error : null,
    ];
}

$result = isAccessible($targetUrl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DownDetectorDownDetector</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 2rem; background: #f7f7f7; }
        .status { padding: 1.5rem; border-radius: 6px; max-width: 500px; margin: auto; text-align: center; }
        .up { background: #e6ffed;color: #1b5e20; }
        .down { background: #ffecec; color: #922b21; }
        .code { margin-top: 1rem; font-size: 0.9rem; color: #555; }
    </style>
</head>
<body class="<?= $result['ok'] ? 'up' : 'down' ?>">
<?php if ($result['ok']): ?>
    <div class="status">
        <h1>Downdetector seems to be up!</h1>
        <p>Status code: <?= htmlspecialchars((string)$result['code'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
<?php else: ?>
    <div class="status">
        <h1>Downdetector seems to be down</h1>
        <p>Status code: <?= htmlspecialchars((string)$result['code'], ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if ($result['error']): ?>
            <p class="code">Error: <?= htmlspecialchars($result['error'], ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>
</body>
</html>
