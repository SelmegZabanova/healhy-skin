<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientAlias;
use Illuminate\Database\Seeder;

class IngredientAliasesSeeder extends Seeder
{
    public function run()
    {
        $aliases = [
            'Vitamin C' => [
                'Ascorbic Acid',
                'L-Ascorbic Acid',
                'Vitamin C',
                'Ascorbyl Glucoside',
                'Sodium Ascorbyl Phosphate',
                'Magnesium Ascorbyl Phosphate',
                '3-O-Ethyl Ascorbic Acid',
                'Ascorbyl Tetraisopalmitate',
                'Ascorbyl Palmitate'
            ],

                'Macadamia Ternifolia Seed Oil' => [
                    'Macadamia Nut Oil'
                ],

                'Sodium Acrylate/Sodium Acryloyldimethyl Taurate Copolymer' => [
                    'Acrylates/C10-30 Alkyl Acrylate Crosspolymer'
                ],
                'Polyisobutene' => [
                    'PIB'
                ],
                'Hydrolyzed Sponge' => [
                    'Marine Sponge Extract'
                ],
                'Glycereth-26' => [
                    'Polyglyceryl-26 Ether'
                ],
                'Caprylyl/Capryl Glucoside' => [
                    'Coco-Glucoside'
                ],
                'Sorbitan Oleate' => [
                    'Sorbitan Monooleate'
                ],
                'Propolis Extract' => [
                    'Bee Propolis Extract'
                ],
                'Serine' => [
                    'L-Serine'
                ],
                'Glutamic Acid' => [
                    'L-Glutamic Acid'
                ],
                'Aspartic Acid' => [
                    'L-Aspartic Acid'
                ],
                'Leucine' => [
                    'L-Leucine'
                ],
                'Alanine' => [
                    'L-Alanine'
                ],
                'Lysine' => [
                    'L-Lysine'
                ],
                'Tyrosine' => [
                    'L-Tyrosine'
                ],
                'Phenylalanine' => [
                    'L-Phenylalanine'
                ],
                'Threonine' => [
                    'L-Threonine'
                ],
                'Valine' => [
                    'L-Valine'
                ],
                'Isoleucine' => [
                    'L-Isoleucine'
                ],
                'Histidine' => [
                    'L-Histidine'
                ],
                'Methionine' => [
                    'L-Methionine'
                ],
                'Cysteine' => [
                    'L-Cysteine'
                ],


            'Hyaluronic Acid' => [
                'Sodium Hyaluronate',
                'Hydrolyzed Hyaluronic Acid',
                'Hydrolyzed Hyaluronic Acid (500ppm)',
                'Hydrolyzed Sodium Hyaluronate',
                'Hyaluronic Acid',
                'HA',
                'Hyaluronan'
            ],

            'Niacinamide' => [
                'Vitamin B3',
                'Nicotinamide',
                'Niacinamide',
                'Niacin',
                'Nicotinic Acid'
            ],

            'Glycerin' => [
                'Glycerin',
                'Glycerine',
                'Glycerol',
                'Vegetable Glycerin',
                'Plant Glycerin'
            ],

            'Tocopherol' => [
                'Vitamin E',
                'Tocopherol',
                'Alpha Tocopherol',
                'D-Alpha Tocopherol',
                'DL-Alpha Tocopherol',
                'Tocopheryl Acetate',
                'Vitamin E Acetate'
            ],

            'Retinol' => [
                'Vitamin A',
                'Retinol',
                'Retinyl Palmitate',
                'Retinyl Acetate',
                'Retinyl Propionate',
                'Hydroxypinacolone Retinoate'
            ],

            'Salicylic Acid' => [
                'Salicylic Acid',
                'BHA',
                'Beta Hydroxy Acid',
                'Betahydroxy Acid',
                'Willow Bark Extract'
            ],

            'Panthenol' => [
                'Vitamin B5',
                'Panthenol',
                'D-Panthenol',
                'DL-Panthenol',
                'Pro-Vitamin B5',
                'Dexpanthenol',
                'Provitamin B5'
            ],
            'Snail Secretion Filtrate' => [
                'Snail Mucin',
                'Snail Slime Filtrate',
                'Snail Mucus Filtrate',
                'Snail Extract'
            ],
                'Cetearyl Olivate' => [
                    'Olivem 1000'
                ],
                'Sorbitan Olivate' => [
                    'Olivem'
                ],

                'Ethyl Hexanediol' => [
                    '2-Ethyl-1,3-hexanediol',
                    'Ethylhexanediol',
                    'Octylene Glycol'
                ],
                'Sodium Polyacrylate' => [
                    'Acrylic Sodium Salt Polymer',
                    'Polyacrylic Acid Sodium Salt'
                ],
                'Palmitic Acid' => [
                    'Hexadecanoic Acid',
                    'C16:0 Fatty Acid',
                    'n-Hexadecanoic Acid'
                ],
                'Myristic Acid' => [
                    'Tetradecanoic Acid',
                    'C14:0 Fatty Acid',
                    'n-Tetradecanoic Acid'
                ],

                // Кокосовое масло
                'Coconut Oil' => [
                    'Cocos Nucifera Oil',
                    'Coconut Extract',
                    'Coconut Fat',
                ],

                // Изопропилмиристат
                'Isopropyl Myristate' => [
                    'Isopropyl Myristate',
                    'IPM',
                    'Myristic Acid Isopropyl Ester',
                ],

                // Ланолин
                'Lanolin' => [
                    'Lanolin Alcohol',
                    'Wool Fat',
                    'Hydrogenated Lanolin',
                ],

                // Какао-масло
                'Cocoa Butter' => [
                    'Theobroma Cacao Seed Butter',
                    'Cocoa Butter Extract',
                    'Cocoa Fat',
                ],

                // Масло пшеничных зародышей
                'Wheat Germ Oil' => [
                    'Triticum Vulgare Germ Oil',
                    'Wheat Germ Oil',
                    'Wheat Oil',
                ],

                // Лаурилсульфат натрия
                'Sodium Lauryl Sulfate' => [
                    'Sodium Dodecyl Sulfate',
                    'Sodium Lauryl Sulphate',
                    'Sodium Lauryl Ether Sulfate',
                ],

                // Экстракт водорослей
                'Algae Extract' => [
                    'Seaweed Extract',
                    'Marine Extract',
                    'Algae',
                    'Algea',
                ],
                'Algin'=> [
                    'Alginic Acid',
                    'Sodium Alginate',
                    'Potassium Alginate',
                    'Calcium Alginate',
                    'Alginic Acid Sodium Salt',
                ],

                // Бензофенон
                'Benzophenone' => [
                    'Benzophenone-3',
                    'Oxybenzone',
                    'BP-3',
                ],

                // Петролатум
                'Petrolatum' => [
                    'Petroleum Jelly',
                    'Mineral Oil Jelly',
                    'Vaseline',
                ],

                // Цетеариловый спирт
                'Cetearyl Alcohol' => [
                    'Cetearyl Alcohol',
                    'Cetyl Stearyl Alcohol',
                    'Emulsifying Wax',
                ],

                // Диметикон
                'Dimethicone' => [
                    'Dimethicone',
                    'Polydimethylsiloxane',
                    'Silicone Fluid',
                ],
            'Stearic Acid' => [
                'Octadecanoic Acid',
                'Stearate',
                'Ethanol, 2-(octadecyloxy)-',
                'C18H36O2',
                'Stearin',
            ],
                        // 1,2-Гександиол
                '1,2-Hexanediol' => [
                    'Hexanediol',
                ],


                // Натрия гиалуронат
                'Sodium Hyaluronate' => [
                    'Hyaluronic Acid Salt',
                    'Sodium Salt of Hyaluronic Acid',
                ],



                // Натрия ацетилированный гиалуронат
                'Sodium Acetylated Hyaluronate' => [
                    'Acetylated Hyaluronic Acid',
                ],

                // Натрия гиалуронат кроссполимер
                'Sodium Hyaluronate Crosspolymer' => [
                    'Crosslinked Sodium Hyaluronate',
                ],


                // Аллантоин
                'Allantoin' => [
                    'Allantoine',
                    'Diureide of Glycolic Acid',
                ],
                'Squalene' => [
                    'Squalane',
                    'Shark Liver Oil'
                ],
                'Pyroglutamic Acid' => [
                    'PCA',
                    'Pyrrolidone Carboxylic Acid'
                ],
                'Bisabolol' => [
                    'Alpha-Bisabolol',
                    'Levomenol'
                ],
                'Saccharide Isomerate' => [
                    'Pentavitin'
                ],
                'Cehami Extract' => [
                    'Cehami',
                    'Cehami Seed Extract'
                ],
                'Alteromonas Ferment Extract' => [
                    'Alteromonas Extract',
                    'Marine Bacteria Extract'
                ],
                'Polyglyceryl-3 Diisostearate' => [
                    'Polyglyceryl Diisostearate'
                ],
                'Sodium Cocoyl Glutamate' => [
                    'Cocoyl Glutamate',
                    'Sodium Cocoyl Glutamate'
                ],
                'Caprylyl Glycol' => [
                    '1,2-Octanediol'
                ],
                'Glucose' => [
                    'Dextrose',
                    'Corn Sugar'
                ],
                'Diethoxyethyl Succinate' => [
                    'Succinic Acid Diethyl Ester'
                ],

                    'Arbutin' => [
                        'Bearberry Extract'
                    ],
                'Asiaticoside' => [
                    'Centella Asiatica Extract',
                    'Madecassoside',
                    'Asiatic Acid',
                    'Madecassic Acid',
                    'Centella Asiatica Acid'
                ],

                'Dimethylsilanol Hyaluronate' => [
                    'Silanol Hyaluronate'
                ],
                'Potassium Hyaluronate' => [
                    'Potassium Salt of Hyaluronic Acid'
                ],
                'Hydroxypropyltrimonium Hyaluronate' => [
                    'Cationic Hyaluronic Acid'
                ],
                'Sodium Hyaluronate Dimethylsilanol' => [
                    'Silanol Sodium Hyaluronate'
                ],
                'Theobroma Cacao Extract' => [
                    'Cocoa Extract',
                    'Cocoa Powder Extract'
                ],
                'Chamaecyparis Obtusa Leaf Extract' => [
                    'Hinoki Cypress Leaf Extract'
                ],
                'Prunus Persica Flower Extract' => [
                    'Peach Flower Extract'
                ],
                'Camellia Sinensis Seed Oil' => [
                    'Camellia Oil',
                    'Green Tea Seed Oil'
                ],
                'Yeast Ferment Extract' => [
                    'Saccharomyces Ferment Extract'
                ],
                'Artemisia Princeps Leaf Extract' => [
                    'Mugwort Extract'
                ],
                'Candida Bombicola/Glucose/Methyl Rapeseedate Ferment' => [
                    'Biosaccharide Gum-1'
                ],
                'Betaine Salicylate' => [
                    'Salicyloyl Betaine'
                ],
                'Sucrose Palmitate' => [
                    'Sucrose Ester'
                ],
                'Hydrogenated Lecithin' => [
                    'Hydrogenated Phospholipids'
                ],
                'Gellan Gum' => [
                    'Gellam Gum'
                ],
                'Sodium Phytate' => [
                    'Phytic Acid Sodium Salt'
                ],
                'Cellulose' => [
                    'Microcrystalline Cellulose'
                ],
                'Cyanocobalamin' => [
                    'Vitamin B12'
                ],
                'Polyglutamic Acid' => [
                    'PGA'
                ],
                    'Alpha-Arbutin' => [
                    'Alpha Arbutin'
                ],
                'Coccinia Indica Fruit Extract' => [
                    'Ivy Gourd Extract'
                ],
                'Eclipta Prostrata Extract' => [
                    'Bhringraj Extract'
                ],
                'Olea Europaea Fruit Oil' => [
                    'Olive Oil',
                    'Extra Virgin Olive Oil'
                ],
                'Simmondsia Chinensis Seed Oil' => [
                    'Jojoba Oil'
                ],
                'Vitis Vinifera Seed Oil' => [
                    'Grape Seed Oil'
                ],

                // Трехалоза
                'Trehalose' => [
                    'Trehalose Dihydrate',
                ],

                // Бетаин
                'Betaine' => [
                    'Trimethylglycine',
                ],

                // Пропандиол
                'Propanediol' => [
                    '1,3-Propanediol',
                ],

                // Экстракт портулаки
                'Portulaca Oleracea Extract' => [
                    'Purslane Extract',
                ],

                // Экстракт гамамелиса
                'Hamamelis Virginiana (Witch Hazel) Extract' => [
                    'Witch Hazel Extract',
                ],




                // Церамида NP
                'Ceramide NP' => [
                    'Ceramide 3',
                ],

                // Бета-глюкан
                'Beta-Glucan' => [
                    'Beta Glucan',
                ],

                // Экстракт малахита
                'Malachite Extract' => [
                    'Malachite',
                ],

                // Холестерин
                'Cholesterol' => [
                    'Cholesterin',
                ],

                // Пентиленгликоль
                'Pentylene Glycol' => [
                    '1,2-Pentylene Glycol',
                ],

                // Глицерил акрилат/акриловая кислота кополимер
                'Glyceryl Acrylate/Acrylic Acid Copolymer' => [
                    'Glyceryl Acrylate Copolymer',
                ],

                // PVM/MA кополимер
                'PVM/MA Copolymer' => [
                    'PVM/MA',
                ],

                // Полиглицерил-10 лаурет
                'Polyglyceryl-10 Laurate' => [
                    'Polyglyceryl Laurate',
                ],

                // Ксантановая камедь
                'Xanthan Gum' => [
                    'Xanthan',
                ],

                // Трометамол
                'Tromethamine' => [
                    'Tris',
                ],

                // Карбомер
                'Carbomer' => [
                    'Carbopol',
                ],

                // Этилгексилглицерин
                'Ethylhexylglycerin' => [
                    'Octoxyglycerin',
                ],

                // Экстракт корня скутеллярии байкальской
                'Scutellaria Baicalensis Root Extract' => [
                    'Baikal Skullcap Extract',
                ],

                // Экстракт корня пиона
                'Paeonia Suffruticosa Root Extract' => [
                    'Peony Extract',
                ]
            ];



        foreach ($aliases as $mainName => $alternativeNames) {
            $ingredient = Ingredient::where('name', $mainName)->first();
            if ($ingredient) {
                foreach ($alternativeNames as $alias) {
                    if ($alias !== $mainName) {
                        IngredientAlias::create([
                            'ingredient_id' => $ingredient->id,
                            'name' => $alias
                        ]);
                    }
                }
            }
        }
    }
}
