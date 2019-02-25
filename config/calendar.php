<?php

return [

    'articles' => [
        'model' => 'InetStudio\Articles\Contracts\Models\ArticleModelContract',
        'field' => [
            'title' => 'title',
            'name' => 'publish_date',
        ],
    ],

    'ingredients' => [
        'model' => 'InetStudio\Ingredients\Contracts\Models\IngredientModelContract',
        'field' => [
            'title' => 'title',
            'name' => 'created_at',
        ],
    ],

];
