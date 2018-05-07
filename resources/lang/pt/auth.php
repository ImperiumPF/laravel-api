<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Os dados de autenticação não correspondem aos nossos registos.',
    'throttle' => 'Demasiadas tentativas de autenticação. Por favor tente de novo dentro de :seconds segundos.',
    
    /* AuthController@login */ 
    'jwtFailed' => 'Erro ao iniciar sessão, por favor tente de novo.',

    /* AuthController@logout */ 
    'logout' => 'Sessão terminada com sucesso.',
    'logoutError' => 'Ocorreu um erro ao terminar sessão, por favor tente de novo.',

    /* Web */
    'login' => 'Iniciar Sessão',
    'register' => 'Criar Conta',
    'follow' => 'Segue-nos no :social',
    'like' => 'Deixa um like no :social'
];
