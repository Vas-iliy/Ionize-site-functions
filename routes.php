<?php

return (function () {
    $normId = '[1-9]+\d*';
    $normUrl = '[0-9aA-zZ_-]+';
    return [
        [
            'test' => "/^$/",
            'controller' => 'states/states'
        ],
        [
            'test' => "/^state\/($normId)$/",
            'controller' => 'states/state',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^category\/($normId)$/",
            'controller' => 'categories/category',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^login$/",
            'controller' => 'auth/login'
        ],
        [
            'test' => "/^logout$/",
            'controller' => 'auth/logout'
        ],
        [
            'test' => "/^new_state$/",
            'controller' => 'states/addState'
        ],
        [
            'test' => "/^edit_state\/($normId)$/",
            'controller' => 'states/editState',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^delete_state\/($normId)$/",
            'controller' => 'states/deleteState',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^new_category$/",
            'controller' => 'categories/addCategory'
        ],
        [
            'test' => "/^moderation$/",
            'controller' => 'moderation'
        ]
    ];
})();