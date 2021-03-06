<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

$resources = [];
//$resources['baseUrl'] = 'http://api.nfldata.apiphany.com/{Subscription}/{Format}/';
/** Use New V2 Base URL */
$resources['baseUrl'] = 'http://api.fantasydata.net/nfl/v2/{Format}/';

/**
 * Action: Check If Games In Progress
 * Resource: AreAnyGamesInProgress
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/AreAnyGamesInProgress?key=<Your_developer_key>
 */
$resources['operations']['AreAnyGamesInProgress'] = [
    'httpMethod' => 'GET',
    'uri' => 'AreAnyGamesInProgress',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Format' => [
            'type' => 'string', 'location' => 'uri', 'default' => 'xml'
        ],
    ],
];

/**
 * Action: Get Current Season
 * Resource: CurrentSeason
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/CurrentSeason
 */
$resources['operations']['CurrentSeason'] = [
    'httpMethod' => 'GET',
    'uri' => 'CurrentSeason',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'xml' ],
    ]
];

/**
 * Action: Get Upcoming Season
 * Resource: UpcomingSeason
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/UpcomingSeason?key=<Your_developer_key>
 */
$resources['operations']['UpcomingSeason'] = [
    'httpMethod' => 'GET',
    'uri' => 'UpcomingSeason',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'xml' ],
    ]
];

/**
 * Action: Get Last Completed Season
 * Resource: LastCompletedSeason
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/LastCompletedSeason?key=<Your_developer_key>
 */
$resources['operations']['LastCompletedSeason'] = [
    'httpMethod' => 'GET',
    'uri' => 'LastCompletedSeason',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'xml' ],
    ]
];

/**
 * Action: Get Teams for Season
 * Resource: Teams
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Teams/{season}?key=<Your_developer_key>
 */
$resources['operations']['Teams'] = [
    'httpMethod' => 'GET',
    'uri' => 'Teams{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => false,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Schedules for Season
 * Resource: Schedules
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Schedules/{season}?key=<Your_developer_key>
 */
$resources['operations']['Schedules'] = [
    'httpMethod' => 'GET',
    'uri' => 'Schedules{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Bye Week for Season
 * Resource: Byes
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Byes/{season}?key=<Your_developer_key>
 */
$resources['operations']['Byes'] = [
    'httpMethod' => 'GET',
    'uri' => 'Byes{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

// deprecated -- Get Last Completed Week
/**
 * Action: Get Last Completed Week
 * Resource: LastCompletedWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/LastCompletedWeek?key=<Your_developer_key>
 */
$resources['operations']['LastCompletedWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'LastCompletedWeek',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'xml' ],
    ]
];

/**
 * Action: Get Current Week
 * Resource: CurrentWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/CurrentWeek?key=<Your_developer_key>
 */
$resources['operations']['CurrentWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'CurrentWeek',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Format' => [
            'type' => 'string', 'location' => 'uri', 'default' => 'xml'
        ],
    ],
];

/**
 * Action: Get Upcoming Week
 * Resource: UpcomingWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/UpcomingWeek?key=<Your_developer_key>
 */
$resources['operations']['UpcomingWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'UpcomingWeek',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Format' => [
            'type' => 'string', 'location' => 'uri', 'default' => 'xml'
        ],
    ],
];

/**
 * Action: Get Game Scores for Season
 * Resource: Scores
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Scores/{season}?key=<Your_developer_key>
 */
$resources['operations']['Scores'] = [
    'httpMethod' => 'GET',
    'uri' => 'Scores{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Scores for Season and Week
 * Resource: ScoresByWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/ScoresByWeek/{season}/{week}?key=<Your_developer_key>
 */
$resources['operations']['ScoresByWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'ScoresByWeek{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Team Stats per Game for Season for Week
 * Resource: TeamGameStats
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/TeamGameStats/{season}/{week}?key=<Your_developer_key>
 */
$resources['operations']['TeamGameStats'] = [
    'httpMethod' => 'GET',
    'uri' => 'TeamGameStats{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Team Stats for Season
 * Resource: TeamSeasonStats
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/TeamSeasonStats{/Season}?key=<Your_developer_key>
 */
$resources['operations']['TeamSeasonStats'] = [
    'httpMethod' => 'GET',
    'uri' => 'TeamSeasonStats{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Team Standings for Season
 * Resource: Standings
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Standings{/Season}?key=<Your_developer_key>
 */
$resources['operations']['Standings'] = [
    'httpMethod' => 'GET',
    'uri' => 'Standings{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Available Players
 * Resource: Players
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Players
 */
$resources['operations']['Players'] = [
    'httpMethod' => 'GET',
    'uri' => 'Players',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];

/**
 * Action: Get Team Roster and Depth Charts
 * Resource: Players
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Players/{team}?key=<Your_developer_key>
 */
$resources['operations']['PlayersByTeam'] = [
    'httpMethod' => 'GET',
    'uri' => 'Players{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Team' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Player Stats and News
 * Resource: Player
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Player{/PlayerID}?key=<Your_developer_key>
 */
$resources['operations']['Player'] = [
    'httpMethod' => 'GET',
    'uri' => 'Player{/PlayerID}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'PlayerID' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Free Agents
 * Resource: FreeAgents
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/FreeAgents?key=<Your_developer_key>
 */
$resources['operations']['FreeAgents'] = [
    'httpMethod' => 'GET',
    'uri' => 'FreeAgents',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];






/**
 * Action: Get Season League Leaders
 * Resource: SeasonLeagueLeaders
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/SeasonLeagueLeaders/{season}/{position}/{column}
 */
$resources['operations']['SeasonLeagueLeaders'] = [
    'httpMethod' => 'GET',
    'uri' => 'SeasonLeagueLeaders{/Season}{/Position}{/Column}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Position' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Column' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Game League Leaders By Week
 * Resource: GameLeagueLeadersByWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/GameLeagueLeadersByWeek/{season}{/week}/{position}/{column}
 */
$resources['operations']['GameLeagueLeadersByWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'GameLeagueLeaders{/Season}{/Week}{/Position}{/Column}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Position' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Column' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Fantasy Defense By Game
 * Resource: FantasyDefenseByGame
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/FantasyDefenseByGame/{season}/{week}?key=<Your_developer_key>
 */
$resources['operations']['FantasyDefenseByGame'] = [
    'httpMethod' => 'GET',
    'uri' => 'FantasyDefenseByGame{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Fantasy Defense By Season
 * Resource: FantasyDefenseBySeason
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/FantasyDefenseBySeason/{season}?key=<Your_developer_key>
 */
$resources['operations']['FantasyDefenseBySeason'] = [
    'httpMethod' => 'GET',
    'uri' => 'FantasyDefenseBySeason{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Projected Fantasy Defense Stats By Season and Week
 * Resource: FantasyDefenseProjectionsByGame
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/FantasyDefenseProjectionsByGame/{season}/{week}
 */
$resources['operations']['FantasyDefenseProjectionsByGame'] = [
    'httpMethod' => 'GET',
    'uri' => 'FantasyDefenseProjectionsByGame{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Fantasy Defense Projections By Season
 * Resource: FantasyDefenseProjectionsBySeason
 *
 * http://api.nfldata.apiphany.com/nfl/v2{format}/FantasyDefenseProjectionsBySeason/{season}
 */
$resources['operations']['FantasyDefenseProjectionsBySeason'] = [
    'httpMethod' => 'GET',
    'uri' => 'FantasyDefenseProjectionsBySeason{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Injuries for Season for Week
 * Resource: InjuriesByWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Injuries/{season}/{week}
 */
$resources['operations']['Injuries'] = [
    'httpMethod' => 'GET',
    'uri' => 'Injuries{/Season}{/Week}{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Team' => [
            'required' => false,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get News
 * Resource: News
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/News?key=<Your_developer_key>
 */
$resources['operations']['News'] = [
    'httpMethod' => 'GET',
    'uri' => 'News',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];

/**
 * Action: Get News for Player
 * Resource: NewsByPlayerID
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/NewsByPlayerID/{playerid}?key=<Your_developer_key>
 */
$resources['operations']['NewsByPlayerID'] = [
    'httpMethod' => 'GET',
    'uri' => 'NewsByPlayerID{/PlayerID}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'PlayerID' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get News for Team
 * Resource: NewsByTeam
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/NewsByTeam/{team}?key=<Your_developer_key>
 */
$resources['operations']['NewsByTeam'] = [
    'httpMethod' => 'GET',
    'uri' => 'NewsByTeam{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Team' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Box Score
 * Resource: BoxScore
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/BoxScore/{season}/{week}/{team}?key=<Your_developer_key>
 */
$resources['operations']['BoxScore'] = [
    'httpMethod' => 'GET',
    'uri' => 'BoxScore{/Season}{/Week}{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Team' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Live Box Scores
 * Resource: LiveBoxScores
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/LiveBoxScores?key=<Your_developer_key>
 */
$resources['operations']['LiveBoxScores'] = [
    'httpMethod' => 'GET',
    'uri' => 'LiveBoxScores',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];

/**
 * Action: Get Box Score Delta
 * Resource: BoxScoresDelta
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/BoxScoresDelta/{season}/{week}/{minutes}
 */
$resources['operations']['BoxScoresDelta'] = [
    'httpMethod' => 'GET',
    'uri' => 'BoxScoresDelta{/Season}{/Week}{/Minutes}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Minutes' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Live Box Scores
 * Resource: LiveBoxScores
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/LiveBoxScores?key=<Your_developer_key>
 */
$resources['operations']['LiveBoxScores'] = [
    'httpMethod' => 'GET',
    'uri' => 'LiveBoxScores',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];

/**
 * Action: Get Recently Updated Box Scores
 * Resource: RecentlyUpdatedBoxScores
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/RecentlyUpdatedBoxScores/{minutes}
 */
$resources['operations']['RecentlyUpdatedBoxScores'] = [
    'httpMethod' => 'GET',
    'uri' => 'RecentlyUpdatedBoxScores{/Minutes}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Minutes' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];


/**
 * Action: Get Game Stats for Season
 * Resource: GameStats
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/GameStats/{season}
 */
$resources['operations']['GameStats'] = [
    'httpMethod' => 'GET',
    'uri' => 'GameStats{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Game Stats for Season for Week
 * Resource: GameStatsByWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/GameStatsByWeek/{season}/{week}
 */
$resources['operations']['GameStatsByWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'GameStatsByWeek{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Timeframes
 * Resource: Timeframes
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Timeframes/{type}?key=<Your_developer_key>
 */
$resources['operations']['Timeframes'] = [
    'httpMethod' => 'GET',
    'uri' => 'Timeframes{/Type}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Type' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Final Box Scores
 * Resource: FinalBoxScores
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/FinalBoxScores?key=<Your_developer_key>
 */
$resources['operations']['FinalBoxScores'] = [
    'httpMethod' => 'GET',
    'uri' => 'FinalBoxScores',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];

/**
 * Action: Get Active Box Scores
 * Resource: ActiveBoxScores
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/ActiveBoxScores?key=<Your_developer_key>
 */
$resources['operations']['ActiveBoxScores'] = [
    'httpMethod' => 'GET',
    'uri' => 'ActiveBoxScores',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];

/**
 * Action: Get Box Scores for Season for Week
 * Resource: BoxScores
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/BoxScores/{season}/{week}?key=<Your_developer_key>
 */
$resources['operations']['BoxScores'] = [
    'httpMethod' => 'GET',
    'uri' => 'BoxScores{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Stadiums
 * Resource: Stadiums
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/Stadiums?key=<Your_developer_key>
 */
$resources['operations']['Stadiums'] = [
    'httpMethod' => 'GET',
    'uri' => 'Stadiums',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
    ]
];



/**
 * Action: Get Player Season Stats By Season
 * Resource: PlayerSeasonStats
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/PlayerSeasonStats/{season}
 */
$resources['operations']['PlayerSeasonStats'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerSeasonStats{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
    ]
];

/**
 * Action: Get Player Season Stats by Team for Season
 * Resource: PlayerSeasonStatsByTeam
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/PlayerSeasonStatsByTeam/{season}/{team}
 */
$resources['operations']['PlayerSeasonStatsByTeam'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerSeasonStatsByTeam{/Season}{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Team' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Players Season Stats by Player for Season
 * Resource: PlayerSeasonStatsByPlayerID
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/PlayerSeasonStatsByPlayerID/{season}/{playerid}
 */
$resources['operations']['PlayerSeasonStatsByPlayerID'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerSeasonStatsByPlayerID{/Season}{/PlayerID}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'PlayerID' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Player Season Projection Stats By Season
 * Resource: PlayerSeasonProjectionStats
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/PlayerSeasonProjectionStatsByWeek/{season}
 */
$resources['operations']['PlayerSeasonProjectionStats'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerSeasonProjectionStats{/Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
    ]
];

/**
 * Action: Get Player Season Projection Stats by Season, Team
 * Resource: PlayerSeasonStatsByTeam
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/PlayerSeasonProjectionStatsByTeam/{season}/{team}
 */
$resources['operations']['PlayerSeasonProjectionStatsByTeam'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerSeasonProjectionStatsByTeam{/Season}{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Team' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Players Season Stats by Player for Season, PlayerID
 * Resource: PlayerSeasonStatsByPlayerID
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/PlayerSeasonProjectionStatsByPlayerID/{season}/{playerid}
 */
$resources['operations']['PlayerSeasonProjectionStatsByPlayerID'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerSeasonProjectionStatsByPlayerID{/Season}{/PlayerID}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'PlayerID' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];



/**
 * Action: Get Players Game Stats By Season and Week
 * Resource: PlayerGameStatsByWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/PlayerGameStatsByWeek/{season}/{week}?key=<Your_developer_key>
 */
$resources['operations']['PlayerGameStatsByWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerGameStatsByWeek{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Players Game Stats by Team for Season for Week
 * Resource: PlayerGameStatsByTeam
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/PlayerGameStatsByTeam/{season}/{week}/{team}?key=<Your_developer_key>
 */
$resources['operations']['PlayerGameStatsByTeam'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerGameStatsByTeam{/Season}{/Week}{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Team' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Players Game Stats by Player for Season, Week and PlayerID
 * Resource: PlayerGameStatsByPlayerID
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/PlayerGameStatsByPlayerID/{season}/{week}/{playerid}?key=<Your_developer_key>
 */
$resources['operations']['PlayerGameStatsByPlayerID'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerGameStatsByPlayerID{/Season}{/Week}{/PlayerID}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'PlayerID' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Projected Player Game Stats by Season and Week
 * Resource: PlayerGameProjectionStatsByWeek
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/PlayerGameProjectionStatsByWeek/{season}/{week}/
 */
$resources['operations']['PlayerGameProjectionStatsByWeek'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerGameProjectionStatsByWeek{/Season}{/Week}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'key' => [ 'type' => 'string', 'location' => 'query' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
    ]
];

/**
 * Action: Get Projected Player Game Stats by Season, Week and Team
 * Resource: PlayerGameProjectionStatsByTeam
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/PlayerGameProjectionStatsByTeam/{season}/{week}/{team}
 */
$resources['operations']['PlayerGameProjectionStatsByTeam'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerGameProjectionStatsByTeam{/Season}{/Week}{/Team}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'key' => [ 'type' => 'string', 'location' => 'query' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Team' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

/**
 * Action: Get Player Game Projection Stats by Player for Season, Week and PlayerID
 * Resource: PlayerGameStatsByPlayerID
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/PlayerGameProjectionStatsByPlayerID/{season}/{week}/{playerid}
 */
$resources['operations']['PlayerGameProjectionStatsByPlayerID'] = [
    'httpMethod' => 'GET',
    'uri' => 'PlayerGameProjectionStatsByPlayerID{/Season}{/Week}{/PlayerID}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'Week' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
        'PlayerID' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];


/**
 * Action: Gets Fantasy Players with ADP
 * Resource: FantasyPlayersByADP
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{subscription}/{format}/FantasyPlayers
 */
$resources['operations']['FantasyPlayersByADP'] = [
    'httpMethod' => 'GET',
    'uri' => 'FantasyPlayers',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Subscription' => [ 'type' => 'string', 'location' => 'uri' ],
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'key' => [ 'type' => 'string', 'location' => 'query' ]
    ]
];

/**
 * Action: Gets Daily Fantasy Players
 * Resource: DailyFantasyPlayers
 *
 * http://api.nfldata.apiphany.com/nfl/v2/{format}/DailyFantasyPlayers/{date}
 */
$resources['operations']['DailyFantasyPlayers'] = [
    'httpMethod' => 'GET',
    'uri' => 'DailyFantasyPlayers/{Date}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Subscription' => [ 'type' => 'string', 'location' => 'uri' ],
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'key' => [ 'type' => 'string', 'location' => 'query' ],
        'Date' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ],
    ]
];



/**
 * These models are used by Guzzle to determine how to return the result
 * from any given call.
 *
 * The additionalProperties['location'] tells the guzzle response model
 * where to look for the response data and how to parse it.
 */
$resources['models'] = [
    'JSON_Resource' => [
        'type' => 'object',
        'additionalProperties' => [
            'location' => 'json'
        ]
    ],
    'XML_Resource' => [
        'type' => 'object',
        'additionalProperties' => [
            'location' => 'xml'
        ]
    ]
];

return $resources;