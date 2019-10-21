<?php

return [
    'server' => [
        'url' => 'http://quizzes.docksal/apiquiz'
    ],
    'quiz' => [
        'node' => '/node/quiz',
        'filters' => '[drupal_internal__nid][value]',
        'fields' => 'title,field_paragraphs'
    ],
    'questions' => [
      'node' => '/node/quiz',
      'fields' => 'field_answers,field_question'
    ],
];