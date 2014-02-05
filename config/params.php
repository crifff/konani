<?php

return [
    'adminEmail' => 'admin@example.com',
    'twitterConsumerKey' => isset($_ENV['TWITTER_CONSUMER_KEY']) ? $_ENV['TWITTER_CONSUMER_KEY'] : "",
    'twitterConsumerSecret' => isset($_ENV['TWITTER_CONSUMER_SECRET']) ? $_ENV['TWITTER_CONSUMER_SECRET'] : "",
    'bingAccountKey' => isset($_ENV['BING_ACCOUNT_KEY']) ? $_ENV['BING_ACCOUNT_KEY'] : "",
];
