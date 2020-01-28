<?php

return [

    'articles' => [
        'model' => 'InetStudio\ArticlesPackage\Articles\Contracts\Models\ArticleModelContract',
        'field' => [
            'title' => 'title',
            'name' => 'publish_date',
        ],
        'views_namespace' => 'admin.module.articles',
    ],

];
