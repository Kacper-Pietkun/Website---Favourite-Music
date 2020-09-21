<?php

class Routing
{
    private $routing = [
    '/' => 'index',
    '/formularz' => 'photo_form',
    '/kategorie' => 'categories',
    '/rap' => 'rap',
    '/rock' => 'rock',
    '/metal' => 'metal',
    '/los' => 'lottery',
    '/kolekcja' => 'collection',
    '/o_muzyce' => 'about_music',
    '/rejestracja' => 'registration',
    '/logowanie' => 'login',
    '/wyloguj' => 'logout',
    '/twoja_galeria' => 'yours_gallery',
    '/szukaj' => 'photo_search'
    ];

    function route()
    {
        return $this->routing;
    }
}

