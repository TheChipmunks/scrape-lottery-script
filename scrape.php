<?php

require 'vendor/autoload.php';

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

$client = new GuzzleHttp\Client();

$games = [
    0 => [
        'POWERBALL' => [
            'drawNumbers',
            'powerball',
            'powerplay'
        ]
    ],
    1 => [
        'MEGA_MILLIONS' => [
            'drawNumbers',
            'megaball',
            'megaplier'
        ]
    ],
    2 => [
        'FANTASY_5' => [
            'drawNumbers'
        ]
    ],
    3 => [
        'CLASSIC_LOTTO_47' => [
            'drawNumbers'
        ]
    ],
    4 => [
        'CLUB_KENO' => [
            'drawNumber'
        ]
    ],
    5 => [
        'DAILY_3' => [
            'drawNumbersMid',
            'drawNumbersEve'
        ]
    ],
    6 => [
        'DAILY_4' => [
            'drawNumbersMid',
            'drawNumbersEve'
        ]
    ],
    7 => [
        'LUCKY_FOR_LIFE' => [
            'drawNumbers',
            'luckyball'
        ]
    ],
    8 => [
        'POKER_LOTTO' => [
            'drawNumbers'
        ]
    ],
    9 => [
        'DAILY_KENO' => [
            'drawNumbers'
        ]
    ]
];

$jsonLastDate = '[
   {
      "query":"{\n  POWERBALLLastDrawDate: lastDrawDate(logicalGameIdentifier: \"POWERBALL\") {\n    date\n    __typename\n  }\n  MEGA_MILLIONSLastDrawDate: lastDrawDate(logicalGameIdentifier: \"MEGA_MILLIONS\") {\n    date\n    __typename\n  }\n  FANTASY_5LastDrawDate: lastDrawDate(logicalGameIdentifier: \"FANTASY_5\") {\n    date\n    __typename\n  }\n  CLASSIC_LOTTO_47LastDrawDate: lastDrawDate(logicalGameIdentifier: \"CLASSIC_LOTTO_47\") {\n    date\n    __typename\n  }\n  DAILY_3LastDrawDate: lastDrawDate(logicalGameIdentifier: \"DAILY_3\") {\n    date\n    __typename\n  }\n  DAILY_4LastDrawDate: lastDrawDate(logicalGameIdentifier: \"DAILY_4\") {\n    date\n    __typename\n  }\n  LUCKY_FOR_LIFELastDrawDate: lastDrawDate(logicalGameIdentifier: \"LUCKY_FOR_LIFE\") {\n    date\n    __typename\n  }\n  POKER_LOTTOLastDrawDate: lastDrawDate(logicalGameIdentifier: \"POKER_LOTTO\") {\n    date\n    __typename\n  }\n  DAILY_KENOLastDrawDate: lastDrawDate(logicalGameIdentifier: \"DAILY_KENO\") {\n    date\n    __typename\n  }\n}\n",
      "operationName":null
   }
]';

$dates = fetch($jsonLastDate);
$dates = array_shift($dates);

$jsonGames = '[
   {
      "query":"query gameCardData($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    resultsPending\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbers\n    powerball\n    powerplay\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"POWERBALL",
         "drawDate":"POWERBALLLastDrawDate"
      },
      "operationName":"gameCardData"
   },
   {
      "query":"query megaMillionsData($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    resultsPending\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbers\n    megaplier\n    megaball\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"MEGA_MILLIONS",
         "drawDate":"MEGA_MILLIONSLastDrawDate"
      },
      "operationName":"megaMillionsData"
   },
   {
      "query":"query fantasy5Data($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    resultsPending\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbers\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"FANTASY_5",
         "drawDate":"FANTASY_5LastDrawDate"
      },
      "operationName":"fantasy5Data"
   },
   {
      "query":"query lotto47Data($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    resultsPending\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbers\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"CLASSIC_LOTTO_47",
         "drawDate":"CLASSIC_LOTTO_47LastDrawDate"
      },
      "operationName":"lotto47Data"
   },
   {
      "query":"query clubKenoData {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: \"CLUB_KENO\") {\n    jackpot\n    __typename\n  }\n  drawNumber: getLatestClubKenoDrawNumber {\n    drawNumber\n    __typename\n  }\n}\n",
      "operationName":"clubKenoData"
   },
   {
      "query":"query daily3Data($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbersMid\n    drawNumbersEve\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"DAILY_3",
         "drawDate":"DAILY_3LastDrawDate"
      },
      "operationName":"daily3Data"
   },
   {
      "query":"query daily4Data($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbersMid\n    drawNumbersEve\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"DAILY_4",
         "drawDate":"DAILY_4LastDrawDate"
      },
      "operationName":"daily4Data"
   },
   {
      "query":"query luckyForLifeData($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbers\n    luckyball\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"LUCKY_FOR_LIFE",
         "drawDate":"LUCKY_FOR_LIFELastDrawDate"
      },
      "operationName":"luckyForLifeData"
   },
   {
      "query":"query pokerLottoData($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbers\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"POKER_LOTTO",
         "drawDate":"POKER_LOTTOLastDrawDate"
      },
      "operationName":"pokerLottoData"
   },
   {
      "query":"query dailyKenoData($logicalGameIdentifier: String, $drawDate: String) {\n  jackpot: currentEstimatedJackpotForGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    jackpot\n    __typename\n  }\n  nextDrawDate: nextDrawTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  nextBreakDate: nextBreakTimeForLogicalGame(logicalGameIdentifier: $logicalGameIdentifier) {\n    date\n    __typename\n  }\n  winningNumbers: winningNumbers(logicalGameIdentifier: $logicalGameIdentifier, drawDate: $drawDate) {\n    resultsPending\n    drawNumbers\n    __typename\n  }\n  drawingDays: drawingDays(logicalGameIdentifier: $logicalGameIdentifier) {\n    SUNDAY\n    MONDAY\n    TUESDAY\n    WEDNESDAY\n    THURSDAY\n    FRIDAY\n    SATURDAY\n    __typename\n  }\n}\n",
      "variables":{
         "logicalGameIdentifier":"DAILY_KENO",
         "drawDate":"DAILY_KENOLastDrawDate"
      },
      "operationName":"dailyKenoData"
   }
]';

foreach ($dates['data'] as $key => $date) {
    $jsonGames = str_replace($key, $date['date'], $jsonGames);
}

$response = fetch($jsonGames);

$numbers = [];
foreach ($response as $key => $item) {
    foreach ($games[$key] as $game => $fields) {
        foreach ($fields as $field) {
            $numbers[$game][$field] = isset($item['data']['winningNumbers']) ? $item['data']['winningNumbers'][$field] : (isset($item['data']['drawNumber']) ? $item['data']['drawNumber'][$field] : null);
        }
    }
}

header('Content-Type: application/json');
echo json_encode($numbers);

function fetch(string $json): array
{
    global $client;
    try {
        $result = $client->request('POST', 'https://www.michiganlottery.com/api', [
            'json' => json_decode($json)
        ]);
    } catch (RequestException $e) {
        echo Psr7\str($e->getRequest());
        if ($e->hasResponse()) {
            echo Psr7\str($e->getResponse());
        }
        die;
    }

    $response = $result->getBody()->getContents();
    $response = json_decode($response, true);
    return $response;
}