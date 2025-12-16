<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menu = [
            'Bières pression' => [
                ['name' => 'Tuborg (25cl)', 'price' => '3,50€'],
                ['name' => 'Tuborg (33cl)', 'price' => '4,50€'],
                ['name' => 'Tuborg (50cl)', 'price' => '5,50€'],

                ['name' => 'Pietra Rossa (25cl)', 'price' => '4,20€'],
                ['name' => 'Pietra Rossa (33cl)', 'price' => '5,50€'],
                ['name' => 'Pietra Rossa (50cl)', 'price' => '7,00€'],

                ['name' => 'La Bête (25cl)', 'price' => '4,80€'],
                ['name' => 'La Bête (33cl)', 'price' => '5,80€'],
                ['name' => 'La Bête (50cl)', 'price' => '7,50€'],

                ['name' => 'Brooklyn (25cl)', 'price' => '5,20€'],
                ['name' => 'Brooklyn (33cl)', 'price' => '6,50€'],
                ['name' => 'Brooklyn (50cl)', 'price' => '8,50€'],
            ],

            'Bières bouteille' => [
                ['name' => 'Desperados', 'price' => '4,80€'],
                ['name' => 'Cidre', 'price' => '4,90€'],
                ['name' => 'La Chouffe', 'price' => '4,80€'],
                ['name' => 'Bière sans alcool', 'price' => '3,80€'],
            ],

            'Vins blancs' => [
                ['name' => 'Uby N°4 IGP Méditerranée (12cl)', 'price' => '4,50€'],
                ['name' => 'Uby N°4 IGP Méditerranée (75cl)', 'price' => '20,00€'],
                ['name' => "Chardonnay CAMAS IGP Pays d’OC (12cl)", 'price' => '5,00€'],
                ['name' => "Chardonnay CAMAS IGP Pays d’OC (75cl)", 'price' => '22,00€'],
            ],

            'Vins rosés' => [
                ['name' => 'Rosé & Clair IGP Méditerranée (12cl)', 'price' => '5,00€'],
                ['name' => 'Rosé & Clair IGP Méditerranée (75cl)', 'price' => '21,00€'],
                ['name' => "Chat Minuty C de Provence AOP (12cl)", 'price' => '5,80€'],
                ['name' => "Chat Minuty C de Provence AOP (75cl)", 'price' => '26,00€'],
            ],

            'Vins rouges' => [
                ['name' => 'Uby N°7 Merlot IGP Côtes de Gascogne (12cl)', 'price' => '4,50€'],
                ['name' => 'Uby N°7 Merlot IGP Côtes de Gascogne (75cl)', 'price' => '19,00€'],
                ['name' => "Côte du Rhône AOP Caprice d’Antoine (12cl)", 'price' => '5,00€'],
                ['name' => "Côte du Rhône AOP Caprice d’Antoine (75cl)", 'price' => '21,00€'],
            ],

            'Champagne' => [
                ['name' => 'Saint Charles (12cl)', 'price' => '6,00€'],
                ['name' => 'Saint Charles (75cl)', 'price' => '35,00€'],
                ['name' => 'Moët & Chandon (12cl)', 'price' => '7,00€'],
                ['name' => 'Moët & Chandon (75cl)', 'price' => '48,00€'],
            ],

            'Cocktails' => [
                ['name' => 'Mojito', 'price' => '7,50€'],
                ['name' => 'Sex On The Beach', 'price' => '8,50€'],
                ['name' => 'Piña Colada', 'price' => '8,00€'],
                ['name' => 'Aperol Spritz', 'price' => '7,50€'],
                ['name' => 'Gin Tonic', 'price' => '8,00€'],
                ['name' => 'Margarita', 'price' => '8,50€'],
                ['name' => 'Porn Star Martini', 'price' => '8,50€'],
                ['name' => 'Moscow / London Mule', 'price' => '8,50€'],
                ['name' => 'Long Island', 'price' => '9,50€'],
            ],

            'Cocktails sans alcool' => [
                ['name' => 'Virgin Mojito', 'price' => '5,50€'],
                ['name' => 'Virgin Colada', 'price' => '5,50€'],
                ['name' => 'Bora Bora', 'price' => '5,50€'],
                ['name' => 'Framboise & Hibiscus', 'price' => '6,00€'],
                ['name' => 'Verre Gule', 'price' => '6,00€'],
            ],

            'Shooters' => [
                ['name' => 'Orgasme', 'price' => '3,00€'],
                ['name' => 'Get & Malibu', 'price' => '3,00€'],
                ['name' => 'Malibu Sunset', 'price' => '3,00€'],
                ['name' => 'Polar', 'price' => '3,00€'],
                ['name' => 'Kamikaze', 'price' => '3,50€'],
                ['name' => 'Tequila Shot', 'price' => '3,50€'],
                ['name' => 'Jägerbomb Shot', 'price' => '3,50€'],
                ['name' => 'Blue Shot', 'price' => '3,50€'],
                ['name' => 'Purple Shot', 'price' => '3,50€'],
                ['name' => 'Punch Shot', 'price' => '3,50€'],
                ['name' => 'Le Fire', 'price' => '3,50€'],
                ['name' => 'Formule 4 shooters', 'price' => '10,80€'],
                ['name' => 'Formule 6 shooters', 'price' => '15,80€'],
                ['name' => 'Formule Verre Gule (10 shooters)', 'price' => '24,90€'],
            ],

            'Softs' => [
                ['name' => 'Coca / Zéro', 'price' => '3,50€ (33cl) • 5,50€ (1L)'],
                ['name' => 'Schweppes (Agrumes / Tonic)', 'price' => '3,50€ (33cl) • 5,50€ (1L)'],
                ['name' => 'Red Bull', 'price' => '3,50€'],
                ['name' => 'Diabolo', 'price' => '3,50€'],
                ['name' => 'Jus (Abricot, Pomme, Orange, Ananas)', 'price' => '3,50€'],
                ['name' => 'Oasis', 'price' => '3,50€'],
                ['name' => 'Fuze Tea', 'price' => '3,50€'],
                ['name' => 'Perrier', 'price' => '3,50€ (33cl) • 4,50€ (1L)'],
                ['name' => 'San Pellegrino', 'price' => '3,50€ (33cl) • 5,00€ (1L)'],
            ],

            'Boissons chaudes' => [
                ['name' => 'Espresso / Allongé', 'price' => '1,80€ • 2,20€'],
                ['name' => 'Cappuccino / Café crème', 'price' => '3,00€'],
                ['name' => 'Thé', 'price' => '3,00€'],
                ['name' => 'Chocolat chaud', 'price' => '3,00€'],
            ],

            'Apéritifs' => [
                ['name' => 'Kir vin blanc', 'price' => '3,50€'],
                ['name' => 'Kir prosecco', 'price' => '3,50€'],
                ['name' => 'Ricard', 'price' => '3,50€'],
                ['name' => 'Martini (blanco / rosso)', 'price' => '3,50€'],
            ],

            'Gin' => [
                ['name' => "Gordon's", 'price' => '5,50€'],
                ['name' => 'Bombay Saphir', 'price' => '6,00€'],
                ['name' => "Hendrick's", 'price' => '7,00€'],
            ],

            'Whisky' => [
                ['name' => 'Ballantines', 'price' => '5,50€'],
                ['name' => 'Clan Campbell', 'price' => '5,00€'],
                ['name' => "Jack Daniel's", 'price' => '7,00€'],
                ['name' => 'Chivas', 'price' => '8,00€'],
            ],

            'Vodka' => [
                ['name' => 'Smirnoff', 'price' => '5,00€'],
                ['name' => 'Absolut', 'price' => '6,00€'],
                ['name' => 'Grey Goose', 'price' => '8,00€'],
            ],

            'Autres alcools' => [
                ['name' => 'Jäger Meister', 'price' => '5,00€'],
                ['name' => 'Jäger Bomb', 'price' => '7,50€'],
                ['name' => 'Absinthe', 'price' => '9,00€'],
            ],

            'Digestifs' => [
                ['name' => 'Get 27', 'price' => '5,50€'],
                ['name' => 'Get 31', 'price' => '6,00€'],
                ['name' => 'Baileys', 'price' => '5,50€'],
            ],

            'À manger' => [
                ['name' => 'Salade César', 'price' => '9,00€'],
                ['name' => 'Salade de chèvre', 'price' => '8,00€'],
                ['name' => 'Salade Italienne', 'price' => '8,50€'],
                ['name' => 'Burger Classic', 'price' => '11,50€'],
                ['name' => 'Burger Végé', 'price' => '9,50€'],
                ['name' => 'Burger Poulet', 'price' => '11,00€'],
                ['name' => 'Croque Monsieur', 'price' => '8,50€'],
                ['name' => 'Croque Madame', 'price' => '9,50€'],
                ['name' => 'Pâtes au saumon', 'price' => '12,00€'],
                ['name' => 'Pâtes bolo', 'price' => '10,00€'],
                ['name' => 'Bruschetta Margherita', 'price' => '7,50€'],
                ['name' => 'Bruschetta Saumon', 'price' => '8,50€'],
                ['name' => 'Bruschetta Triple Cheese', 'price' => '8,00€'],
                ['name' => 'Entrecôte / Faux filet + frites + salade', 'price' => '16,50€'],
                ['name' => 'Crème brûlée', 'price' => '4,50€'],
                ['name' => 'Dame blanche (3 boules)', 'price' => '4,00€'],
                ['name' => 'Moelleux au chocolat', 'price' => '4,50€'],
            ],
        ];

        // Option simple : on vide avant de re-remplir (pratique en dev)
        MenuItem::query()->delete();
        MenuCategory::query()->delete();

        $catOrder = 1;

        foreach ($menu as $categoryName => $items) {
            $category = MenuCategory::create([
                'name' => $categoryName,
                'sort_order' => $catOrder++,
                'is_active' => true,
            ]);

            $itemOrder = 1;

            foreach ($items as $row) {
                MenuItem::create([
                    'menu_category_id' => $category->id,
                    'name' => $row['name'],
                    'price_text' => $row['price'],
                    'sort_order' => $itemOrder++,
                    'is_active' => true,
                ]);
            }
        }
    }
}
