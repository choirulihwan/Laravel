<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(
            [
                "name"    => "Water, 500 ml", 
                "price"	=> "300",
                "description"    => "Water is an inorganic compound with the chemical formula H2O. It is a transparent, tasteless, odorless,[a] and nearly colorless chemical substance, and it is the main constituent of Earth's hydrosphere and the fluids of all known living organisms (in which it acts as a solvent[1]). It is vital for all known forms of life, despite not providing food, energy or organic micronutrients."
            ]           
        );

        Product::create(
            [
                "name"    => "Rice, 1000 g", 
                "price"	=> "1000",
                "description"    => "Rice is the seed of the grass species Oryza sativa (Asian rice) or less commonly O. glaberrima (African rice). The name wild rice is usually used for species of the genera Zizania and Porteresia, both wild and domesticated, although the term may also be used for primitive or uncultivated varieties of Oryza."
            ]
        );

        Product::create(
            [
                "name"    => "Milk, 1000 ml", 
                "price"	=> "250",
                "description"    => "Milk is a white liquid food produced by the mammary glands of mammals. It is the primary source of nutrition for young mammals (including breastfed human infants) before they are able to digest solid food.[1] Immune factors and immune-modulating components in milk contribute to milk immunity."
            ],
        );

        Product::create(
            [
                "name"    => "Croissant, 450 g", 
                "price"	=> "150",
                "description"    => "A croissant is a buttery, flaky, viennoiserie pastry inspired by the shape of the Austrian kipferl but using the French yeast-leavened laminated dough.[1][better source needed] Croissants are named for their historical crescent shape, the dough is layered with butter, rolled and folded several times in succession, then rolled into a thin sheet, in a technique called laminating"
            ]
            );
    }
}
