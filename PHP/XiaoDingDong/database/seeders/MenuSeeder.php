<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Mongolian Beef',
            'category' => 'Main Course',
            'brief' => 'Steamed beef with a hint of Mongolian sauce.',
            'description' => "The crowd's favorite dish since 1989, made with the finest Mongolian sesame sauce and strawberry puree.",
            'price' => 12,
            'img_path' => 'mongolian_beef.png'
        ]);

        Menu::create([
            'name' => 'Iced Tea',
            'category' => 'Beverages',
            'brief' => 'Regular sweeted iced tea.',
            'description' => "Made with the finest tea leaves, a classic beverage anyone would want to drink.",
            'price' => 4,
            'img_path' => 'iced_tea.png'
        ]);

        Menu::create([
            'name' => 'Sweet and Sour Pork',
            'category' => 'Main Course',
            'brief' => 'Tangy and crispy pork bites',
            'description' => "Deep fried pork glazed with sweet and sour sauce, chili flakes, and scallions.",
            'price' => 23,
            'img_path' => 'sweet_and_sour_pork.png'
        ]);
        
        Menu::create([
            'name' => "General Tso's Chicken",
            'category' => 'Main Course',
            'brief' => 'Crispy chicken in a sweet and spicy sauce',
            'description' => "Deep fried chicken, stir fried in a sweet and spicy sauce with scallions on top.",
            'price' => 20,
            'img_path' => 'general_tsos_chicken.png'
        ]);
        
        Menu::create([
            'name' => 'Mongolian Beef',
            'category' => 'Main Course',
            'brief' => 'Savory beef stir-fried with scallions',
            'description' => "Marinated beef stir fried with mongolian spice sauce and scallions.",
            'price' => 23,
            'img_path' => 'mongolian_beef.png'
        ]);
        
        Menu::create([
            'name' => 'Mapo Tofu',
            'category' => 'Main Course',
            'brief' => 'Spicy tofu with minced meat',
            'description' => "Steamed soft white tofu glazed with rich minced meat sauce and chili oil.",
            'price' => 20,
            'img_path' => 'mapo_tofu.png'
        ]);
        
        Menu::create([
            'name' => 'Orange Chicken',
            'category' => 'Main Course',
            'brief' => 'Fresh, sweet and sour chicken',
            'description' => "Deep fried chicken glazed with sweet and sour orange sauce with scallions on top.",
            'price' => 20,
            'img_path' => 'orange_chicken.png'
        ]);
        
        Menu::create([
            'name' => 'Sesame Chicken',
            'category' => 'Main Course',
            'brief' => 'Crispy chicken with a nutty sesame glaze',
            'description' => "Sesame Chicken is a popular Chinese dish featuring breaded and deep-fried chicken pieces glazed with a sweet and nutty sesame sauce",
            'price' => 21,
            'img_path' => 'sesame_chicken.png'
        ]);

        Menu::create([
            'name' => 'Sweet Iced Tea',
            'category' => 'Beverages',
            'brief' => 'Regular sweeted iced tea.',
            'description' => "Made with the finest tea leaves and the sweetest cane sugar served with clear iced cubes, a classic beverage anyone would want to drink.",
            'price' => 5,
            'img_path' => 'sweet_iced_tea.png'
        ]);
        
        Menu::create([
            'name' => 'Sweet Hot Tea',
            'category' => 'Beverages',
            'brief' => 'Regular sweeted hot tea.',
            'description' => "Made with the finest tea leaves and the sweetest cane sugar, a classic beverage anyone would want to drink.",
            'price' => 4,
            'img_path' => 'sweet_hot_tea.png'
        ]);
        
        Menu::create([
            'name' => 'Iced Tea',
            'category' => 'Beverages',
            'brief' => 'Regular iced tea.',
            'description' => "Made with the finest tea leaves served with clear iced cubes, a classic beverage anyone would want to drink.",
            'price' => 5,
            'img_path' => 'iced_tea.png'
        ]);
        
        Menu::create([
            'name' => 'Hot Tea',
            'category' => 'Beverages',
            'brief' => 'Regular hot tea.',
            'description' => "Made with the finest tea leaves, a classic beverage anyone would want to drink.",
            'price' => 4,
            'img_path' => 'hot_tea.png'
        ]);
        
        Menu::create([
            'name' => 'Chinese Tea',
            'category' => 'Beverages',
            'brief' => 'Our special chinese tea',
            'description' => "Not just a regular chinese tea, our chinese tea is a mix of Quanyin, Oolong, and Jasmine tea.",
            'price' => 9,
            'img_path' => 'chinese_tea.png'
        ]);
        
        Menu::create([
            'name' => 'Mineral Water',
            'category' => 'Beverages',
            'brief' => 'Regular mineral water',
            'description' => "Nothing special, just a regular mineral water.",
            'price' => 3,
            'img_path' => 'mineral_water.png'
        ]);

        Menu::create([
            'name' => 'XDD Special Mochi',
            'category' => 'Desserts',
            'brief' => "Our resto's special chinese mochi",
            'description' => "Different from a regular mochi, definitely worth a try. Our mochi is served with crushed sweetened peanuts and matcha powder.",
            'price' => 15,
            'img_path' => 'mochi.png'
        ]);
    }
}
