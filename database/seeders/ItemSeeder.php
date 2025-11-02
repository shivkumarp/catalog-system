<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = Category::all();

        $items = [];

        // Electronics items
        $electronics = $categories->where('slug', 'electronics')->first();
        $electronicsItems = [
            ['name' => 'Smartphone X', 'price' => 699.99],
            ['name' => 'Laptop Pro', 'price' => 1299.99],
            ['name' => 'Wireless Headphones', 'price' => 149.99],
            ['name' => 'Smart Watch', 'price' => 249.99],
            ['name' => 'Tablet Mini', 'price' => 399.99],
            ['name' => 'Bluetooth Speaker', 'price' => 79.99],
            ['name' => 'Gaming Mouse', 'price' => 49.99],
            ['name' => 'Mechanical Keyboard', 'price' => 89.99],
            ['name' => 'Monitor 24"', 'price' => 199.99],
            ['name' => 'USB-C Cable', 'price' => 19.99],
        ];

        foreach ($electronicsItems as $item) {
            $items[] = [
                'name' => $item['name'],
                'description' => "Description for {$item['name']}",
                'price' => $item['price'],
                'category_id' => $electronics->id,
            ];
        }

        $books = $categories->where('slug', 'books')->first();
        $booksItems = [
            ['name' => 'Programming Guide', 'price' => 39.99],
            ['name' => 'Science Fiction Novel', 'price' => 14.99],
            ['name' => 'Cookbook', 'price' => 24.99],
            ['name' => 'History Book', 'price' => 29.99],
            ['name' => 'Children Storybook', 'price' => 9.99],
            ['name' => 'Biography', 'price' => 19.99],
            ['name' => 'Self-Help Book', 'price' => 16.99],
            ['name' => 'Travel Guide', 'price' => 21.99],
            ['name' => 'Poetry Collection', 'price' => 12.99],
            ['name' => 'Art Book', 'price' => 34.99],
        ];

        foreach ($booksItems as $item) {
            $items[] = [
                'name' => $item['name'],
                'description' => "Description for {$item['name']}",
                'price' => $item['price'],
                'category_id' => $books->id,
            ];
        }

        $clothing = $categories->where('slug', 'clothing')->first();
        $clothingItems = [
            ['name' => 'T-Shirt', 'price' => 19.99],
            ['name' => 'Jeans', 'price' => 49.99],
            ['name' => 'Jacket', 'price' => 89.99],
            ['name' => 'Sneakers', 'price' => 69.99],
            ['name' => 'Dress', 'price' => 59.99],
            ['name' => 'Sweater', 'price' => 39.99],
            ['name' => 'Shorts', 'price' => 29.99],
            ['name' => 'Hat', 'price' => 24.99],
            ['name' => 'Socks', 'price' => 9.99],
            ['name' => 'Backpack', 'price' => 44.99],
        ];

        foreach ($clothingItems as $item) {
            $items[] = [
                'name' => $item['name'],
                'description' => "Description for {$item['name']}",
                'price' => $item['price'],
                'category_id' => $clothing->id,
            ];
        }

        $homeGarden = $categories->where('slug', 'home-garden')->first();
        $homeGardenItems = [
            ['name' => 'Coffee Table', 'price' => 119.99],
            ['name' => 'Garden Tools Set', 'price' => 49.99],
            ['name' => 'Kitchen Knife', 'price' => 29.99],
            ['name' => 'Plant Pot', 'price' => 14.99],
            ['name' => 'Bed Sheets', 'price' => 39.99],
            ['name' => 'Lawn Mower', 'price' => 199.99],
            ['name' => 'Cookware Set', 'price' => 89.99],
            ['name' => 'Flower Seeds', 'price' => 7.99],
            ['name' => 'Wall Clock', 'price' => 24.99],
            ['name' => 'Gardening Gloves', 'price' => 12.99],
        ];

        foreach ($homeGardenItems as $item) {
            $items[] = [
                'name' => $item['name'],
                'description' => "Description for {$item['name']}",
                'price' => $item['price'],
                'category_id' => $homeGarden->id,
            ];
        }

        $sports = $categories->where('slug', 'sports')->first();
        $sportsItems = [
            ['name' => 'Basketball', 'price' => 29.99],
            ['name' => 'Yoga Mat', 'price' => 24.99],
            ['name' => 'Running Shoes', 'price' => 79.99],
            ['name' => 'Tennis Racket', 'price' => 89.99],
            ['name' => 'Dumbbell Set', 'price' => 149.99],
            ['name' => 'Swimming Goggles', 'price' => 19.99],
            ['name' => 'Camping Tent', 'price' => 129.99],
            ['name' => 'Bicycle', 'price' => 299.99],
            ['name' => 'Fitness Tracker', 'price' => 59.99],
            ['name' => 'Soccer Ball', 'price' => 34.99],
        ];

        foreach ($sportsItems as $item) {
            $items[] = [
                'name' => $item['name'],
                'description' => "Description for {$item['name']}",
                'price' => $item['price'],
                'category_id' => $sports->id,
            ];
        }

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
