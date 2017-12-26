<?php

return [

    'articles' => [
        'model' => '\InetStudio\Articles\Models\ArticleModel',
        'fields' => [
            'title' => 'title',
            'time' => 'publish_date',
        ],
    ],

    'ingredients' => [
        'model' => '\InetStudio\Ingredients\Models\IngredientModel',
        'fields' => [
            'title' => 'title',
            'time' => 'created_at',
        ],
    ],

];
