<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DecisionEngine Path
    |--------------------------------------------------------------------------
    |
    | This is the base URI path where DecisionEngine's views, such as the rule engine
    | and rule execution screen, will be available from. You're free to tweak
    | this path according to your preferences and application design.
    |
    */
    'path' => env('DECISION_ENGINE_PATH', 'decision-engine'),

    /*
    |--------------------------------------------------------------------------
    | DecisionEngine Connection
    |--------------------------------------------------------------------------
    |
    | This is the db connection in your application that connects with
    | provided by DecisionEngine. It will serve as the primary connection you use while
    | interacting with DecisionEngine related models, migrations, and so on.
    |
    */
    'db_connection' => env('DECISION_ENGINE_CONNECTION', env('DB_CONNECTION', 'mysql')),

    /*
    |--------------------------------------------------------------------------
    | DecisionEngine Primary Key Type
    |--------------------------------------------------------------------------
    |
    | This is the primary key type of your database tables
    | You can select id - will create unsigned bid int column or uuid - will uuid equivalent column
    | Default is id.
    |
    */
    'db_primary_key_type' => env('DECISION_ENGINE_PRIMARY_KEY_TYPE', 'id'),

    /*
    |--------------------------------------------------------------------------
    | DecisionEngine Types
    |--------------------------------------------------------------------------
    |
    | There are 3 types of engine execution can happen for the input if it passes validations
    | code - Given code will be executed
    | command - Given command will be executed
    | api - Given api will be called
    |
    */
    'types' => [
        'code' => 'Code',
        'command' => 'Command',
    ],

    /*
    |--------------------------------------------------------------------------
    | DecisionEngine Web Route guards
    |--------------------------------------------------------------------------
    |
    | This is the guards of the decision engine web routes.
    | This contains the web routes for index, create, update and show for rule engines and index and show for rule executions.
    | Default is web.
    |
    */
    'web_guards' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | DecisionEngine API route guard
    |--------------------------------------------------------------------------
    |
    | This is the guards of the decision engine API routes.
    | This contains the api which executes your decision engine rule based on the input given.
    | Default is null but make sure to change the value according to your requirement.
    |
    */
    'api_guards' => [],

    /*
    |--------------------------------------------------------------------------
    | Pagination Size
    |--------------------------------------------------------------------------
    |
    | Pagination size of the index pages of rule engine and rule execution.
    | Default is 20.
    |
    */
    'pagination_size' => 20,

    /*
    |--------------------------------------------------------------------------
    | DecisionEngine Logger
    |--------------------------------------------------------------------------
    |
    | This setting defines which logging channel will be used by the DecisionEngine
    | library to write log messages. You are free to specify any of your
    | logging channels listed inside the "logging" configuration file.
    |
    */
    'logger' => env('DECISION_ENGINE_LOGGER'),

];
