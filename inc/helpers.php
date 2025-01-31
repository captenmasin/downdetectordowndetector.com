<?php

function getStatusCode($url){
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return response as a string
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);          // Timeout after 10 seconds
    curl_setopt($ch, CURLOPT_NOBODY, true);         // Only get HTTP headers

    // Execute cURL session
    curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        curl_close($ch);

        return true; // Website is down (cURL error)
    }

    // Get HTTP response code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode;
}

function isWebsiteDown($url) {
    $httpCode = getStatusCode($url);

    return ($httpCode < 200 || $httpCode >= 400) && $httpCode !== 403;
}
