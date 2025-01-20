<?php
include_once 'inc/helpers.php';

$title = 'Down Detector Down Detector';
$description = 'Down Detector Down Detector | Is Down Detector down? Check Down Detector status to see if Down Detector is down or if it is just you. D';

$url = 'https://downdetector.com';

$down = isWebsiteDown($url);
$code = getStatusCode($url);
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title ?>
    </title>
    <link rel="stylesheet" href="app.css">
    <meta name="description" content="<?= $description ?>">

    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:url" content="https://downdetectordowndetector.com">

    <!--  <link rel="icon" href="/favicon.ico" sizes="any">-->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🤷‍♂️</text></svg>">
    <link rel="icon" href="./icon.png" type="image/png">
    <link rel="apple-touch-icon" href="/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
<div class="w-screen h-screen flex flex-col gap-2 p-8 text-center items-center justify-center <?= $down ? 'bg-red-100 dark:bg-red-900' : 'bg-green-100 dark:bg-green-900' ?>  dark:text-white text-zinc-800">

    <?php if ($down): ?>
        <svg data-slot="icon"
             class="w-24 text-red-500"
             fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"></path>
        </svg>
        <h1 class="text-3xl font-heading font-extrabold">It's down!</h1>
        <p class="text-xl">
            Uh oh, looks like Down Detector is down. Alert the authorities!
        </p>
    <?php else: ?>
        <svg data-slot="icon"
             class="w-24 text-green-500"
             fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"></path>
        </svg>
        <h1 class="text-3xl font-heading font-extrabold">It's up!</h1>
        <p class="text-xl">
            Phew, Down Detector is up and running. All is well.
        </p>
    <?php endif; ?>

    <p>
        Check for yourself at <a href="<?= $url ?>" target="_blank" class="underline"><?= $url ?></a>
    </p>

    <!-- Code: <?= $code ?>... 403 is technically up btw -->
</div>
</body>

</html>
