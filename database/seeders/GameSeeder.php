<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\Platform;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            [
                'title' => 'The Witcher 3',
                'synopsis' => 'Incarnez Geralt de Riv, un chasseur de monstres professionnel, dans un monde ouvert fantastique.',
                'release_year' => 2015,
                'rating' => 4.8,
                'playtime_hours' => 100,
                'cover_url' => 'https://via.assets.so/game.png?id=1&q=95&w=300&h=450&fit=cover',
                'featured' => true,
                'status' => 'released',
                'category' => 'RPG',
                'platforms' => ['PC', 'PS5', 'Xbox'],
            ],
            [
                'title' => 'Elden Ring',
                'synopsis' => "Un RPG d'action en monde ouvert développé par FromSoftware.",
                'release_year' => 2022,
                'rating' => 4.9,
                'playtime_hours' => 80,
                'cover_url' => 'https://via.assets.so/game.png?id=2&q=95&w=300&h=450&fit=cover',
                'featured' => false,
                'status' => 'released',
                'category' => 'Action',
                'platforms' => ['PC', 'PS5', 'Xbox'],
            ],
            [
                'title' => 'Cyberpunk 2077',
                'synopsis' => 'Plongez dans Night City, une mégalopole obsédée par le pouvoir et le glamour.',
                'release_year' => 2020,
                'rating' => 4.5,
                'playtime_hours' => 60,
                'cover_url' => 'https://via.assets.so/game.png?id=3&q=95&w=300&h=450&fit=cover',
                'featured' => false,
                'status' => 'released',
                'category' => 'RPG',
                'platforms' => ['PC', 'PS5'],
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'synopsis' => "L'épopée du hors-la-loi Arthur Morgan et de la bande de Dutch van der Linde.",
                'release_year' => 2018,
                'rating' => 4.7,
                'playtime_hours' => 90,
                'cover_url' => 'https://via.assets.so/game.png?id=4&q=95&w=300&h=450&fit=cover',
                'featured' => false,
                'status' => 'released',
                'category' => 'Aventure',
                'platforms' => ['PC', 'PS5', 'Xbox'],
            ],
            [
                'title' => 'Hollow Knight',
                'synopsis' => "Explorez un royaume souterrain d'insectes dans ce metroidvania exigeant.",
                'release_year' => 2017,
                'rating' => 4.6,
                'playtime_hours' => 40,
                'cover_url' => 'https://via.assets.so/game.png?id=5&q=95&w=300&h=450&fit=cover',
                'featured' => false,
                'status' => 'released',
                'category' => 'Aventure',
                'platforms' => ['PC', 'Switch'],
            ],
            [
                'title' => 'Civilization VI',
                'synopsis' => 'Bâtissez un empire capable de défier le temps dans ce jeu de stratégie au tour par tour.',
                'release_year' => 2016,
                'rating' => 4.3,
                'playtime_hours' => 120,
                'cover_url' => 'https://via.assets.so/game.png?id=6&q=95&w=300&h=450&fit=cover',
                'featured' => false,
                'status' => 'released',
                'category' => 'Stratégie',
                'platforms' => ['PC', 'Switch'],
            ],
        ];

        foreach ($games as $data) {
            $categoryName = $data['category'];
            $platformNames = $data['platforms'];
            unset($data['category'], $data['platforms']);

            $data['category_id'] = Category::where('name', $categoryName)->value('id');

            $game = Game::create($data);

            $game->platforms()->attach(
                Platform::whereIn('name', $platformNames)->pluck('id')->all()
            );
        }
       $platforms = Platform::all();

        Game::factory()
            ->count(14)
            ->recycle(Category::all())
            ->create()
            ->each(fn ($game) => $game->platforms()->attach(
                $platforms->random(rand(1, 3))->pluck('id')
            ));

        $featured = Game::factory()
            ->featured()
            ->recycle(Category::all())
            ->create();

        $featured->platforms()->attach(
            $platforms->random(rand(1, 3))->pluck('id')
        );
    }
}