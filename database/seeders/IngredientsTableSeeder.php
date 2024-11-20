<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        $ingredients = [
            // Увлажняющие компоненты
            [
                'name' => 'Glycerin',
                'comedogenicity' => 0,
                'description' => 'Увлажняющий компонент, безопасен для всех типов кожи'
            ],
            [
                'name' => 'Macadamia Ternifolia Seed Oil',
                'comedogenicity' => 1,
                'description' => 'Масло богато пальмитолеиновой кислотой и полезно для сухой кожи'
            ],
            [
                'name' => 'Sodium Acrylate/Sodium Acryloyldimethyl Taurate Copolymer',
                'comedogenicity' => 0,
                'description' => 'Полимерный загуститель и эмульгатор'
            ],
            [
                'name' => 'Polyisobutene',
                'comedogenicity' => 0,
                'description' => 'Синтетический полимер, используемый как эмолент и загуститель'
            ],
            [
                'name' => 'Hydrolyzed Sponge',
                'comedogenicity' => 0,
                'description' => 'Ингредиент морского происхождения, улучшает эластичность кожи'
            ],
            [
                'name' => 'Glycereth-26',
                'comedogenicity' => 0,
                'description' => 'Полиглицерильный эфир, используется как эмульгатор и загуститель'
            ],
            [
                'name' => 'Caprylyl/Capryl Glucoside',
                'comedogenicity' => 0,
                'description' => 'Мягкое ПАВ растительного происхождения'
            ],
            [
                'name' => 'Sorbitan Oleate',
                'comedogenicity' => 1,
                'description' => 'Эмульгатор, полученный из сорбитола и олеиновой кислоты'
            ],
            [
                'name' => 'Propolis Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт с антибактериальными и противовоспалительными свойствами'
            ],

            [
                'name' => 'Propylene Glycol',
                'comedogenicity' => 0,
                'description' => 'Увлажнитель, может вызывать раздражение у чувствительной кожи'
            ],

            // Масла

            [
                'name' => 'Jojoba Oil',
                'comedogenicity' => 2,
                'description' => 'Масло жожоба, умеренно комедогенно'
            ],
            [
                'name' => 'Argan Oil',
                'comedogenicity' => 0,
                'description' => 'Аргановое масло, не комедогенно'
            ],
            [
                'name' => 'Tea Tree Oil',
                'comedogenicity' => 1,
                'description' => 'Масло чайного дерева, обладает антибактериальным действием'
            ],

            [
                'name' => 'Trehalose',
                'comedogenicity' => 0,
                'description' => 'Природный сахар, известен своими увлажняющими свойствами, безопасен для кожи.'
            ],
            [
                'name' => '1,2-Hexanediol',
                'comedogenicity' => 0,
                'description' => 'Гликоль, используется в качестве увлажнителя и растворителя, безопасен для большинства типов кожи.'
            ],

            // Активные компоненты
            [
                'name' => 'Niacinamide',
                'comedogenicity' => 0,
                'description' => 'Витамин B3, уменьшает воспаления и покраснения'
            ],
            [
                'name' => 'Salicylic Acid',
                'comedogenicity' => 0,
                'description' => 'Салициловая кислота, отшелушивает и борется с акне'
            ],
            [
                'name' => 'Retinol',
                'comedogenicity' => 0,
                'description' => 'Витамин А, стимулирует обновление клеток'
            ],

            // Эмоленты и окклюзивы

            [
                'name' => 'Shea Butter',
                'comedogenicity' => 4,
                'description' => 'Масло ши, питательное, но комедогенное'
            ],

            // Проблемные компоненты

            [
                'name' => 'Butyl Stearate',
                'comedogenicity' => 3,
                'description' => 'Умеренно комедогенный эмолент'
            ],
            [
                'name' => 'Oleic Acid',
                'comedogenicity' => 4,
                'description' => 'Жирная кислота, может закупоривать поры'
            ],

            // Спирты
            [
                'name' => 'Cetyl Alcohol',
                'comedogenicity' => 2,
                'description' => 'Жирный спирт, умеренно комедогенный'
            ],
            [
                'name' => 'Stearyl Alcohol',
                'comedogenicity' => 2,
                'description' => 'Жирный спирт, может закупоривать поры'
            ],

            // Распространенные масла
            [
                'name' => 'Sweet Almond Oil',
                'comedogenicity' => 2,
                'description' => 'Миндальное масло, умеренно комедогенное'
            ],
            [
                'name' => 'Grape Seed Oil',
                'comedogenicity' => 1,
                'description' => 'Масло виноградных косточек, легкое и малокомедогенное'
            ],

            // Витамины и антиоксиданты
            [
                'name' => 'Vitamin E',
                'comedogenicity' => 2,
                'description' => 'Антиоксидант, умеренно комедогенный'
            ],
            [
                'name' => 'Vitamin C',
                'comedogenicity' => 0,
                'description' => 'Осветляет и укрепляет кожу'
            ],
            [
                'name' => 'Propanediol',
                'comedogenicity' => 0,
                'description' => 'Гликоль, используется как растворитель и увлажнитель, безопасен для большинства типов кожи.'
            ],


            // Консерванты
            [
                'name' => 'Phenoxyethanol',
                'comedogenicity' => 0,
                'description' => 'Консервант, безопасен для кожи'
            ],
            [
                'name' => 'Methylparaben',
                'comedogenicity' => 0,
                'description' => 'Консервант, может вызывать раздражение'
            ],

            // Натуральные экстракты
            [
                'name' => 'Aloe Vera',
                'comedogenicity' => 0,
                'description' => 'Успокаивает и увлажняет кожу'
            ],
            [
                'name' => 'Chamomile Extract',
                'comedogenicity' => 0,
                'description' => 'Успокаивающий противовоспалительный компонент'
            ],
            [
                'name' => 'Green Tea Extract',
                'comedogenicity' => 0,
                'description' => 'Антиоксидант, успокаивает кожу'
            ],

            // Кислоты
            [
                'name' => 'Lactic Acid',
                'comedogenicity' => 0,
                'description' => 'Отшелушивающая и увлажняющая кислота'
            ],
            [
                'name' => 'Glycolic Acid',
                'comedogenicity' => 0,
                'description' => 'Отшелушивающая кислота, обновляет кожу'
            ],
            [
                'name' => 'Mandelic Acid',
                'comedogenicity' => 0,
                'description' => 'Мягкая отшелушивающая кислота'
            ],
            [
                'name' => 'Malachite Extract',
                'comedogenicity' => 0,
                'description' => 'Антиоксидант, помогает защитить кожу от свободных радикалов и улучшить её здоровье.'
            ],


            // Пептиды
            [
                'name' => 'Copper Peptides',
                'comedogenicity' => 0,
                'description' => 'Стимулируют выработку коллагена'
            ],
            [
                'name' => 'Matrixyl',
                'comedogenicity' => 0,
                'description' => 'Пептид, уменьшает морщины'
            ],

            // Растительные масла
            [
                'name' => 'Olive Oil',
                'comedogenicity' => 3,
                'description' => 'Оливковое масло, умеренно комедогенное'
            ],
            [
                'name' => 'Rosehip Oil',
                'comedogenicity' => 1,
                'description' => 'Масло шиповника, слабо комедогенное'
            ],
            [
                'name' => 'Marula Oil',
                'comedogenicity' => 1,
                'description' => 'Масло марулы, подходит для проблемной кожи'
            ],

                // Производные силикона
                [
                    'name' => 'Cyclopentasiloxane',
                    'comedogenicity' => 0,
                    'description' => 'Летучий силикон, придает гладкость'
                ],
                [
                    'name' => 'Cyclohexasiloxane',
                    'comedogenicity' => 0,
                    'description' => 'Силикон, улучшает текстуру'
                ],
                [
                    'name' => 'Amodimethicone',
                    'comedogenicity' => 0,
                    'description' => 'Силикон, формирует защитную пленку'
                ],

                // Растительные экстракты
                [
                    'name' => 'Centella Asiatica Extract',
                    'comedogenicity' => 0,
                    'description' => 'Экстракт центеллы, заживляет и успокаивает'
                ],
                [
                    'name' => 'Licorice Root Extract',
                    'comedogenicity' => 0,
                    'description' => 'Экстракт солодки, осветляет'
                ],
                [
                    'name' => 'Calendula Extract',
                    'comedogenicity' => 0,
                    'description' => 'Экстракт календулы, противовоспалительный'
                ],

                // Аминокислоты
                [
                    'name' => 'Arginine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, увлажняет'
                ],
                [
                    'name' => 'Glycine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, успокаивает'
                ],
                [
                    'name' => 'Proline',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, укрепляет'
                ],

                // Эфиры жирных кислот
                [
                    'name' => 'Caprylic/Capric Triglyceride',
                    'comedogenicity' => 1,
                    'description' => 'Смягчающий компонент из кокосового масла'
                ],
                [
                    'name' => 'Isopropyl Palmitate',
                    'comedogenicity' => 4,
                    'description' => 'Эмолент, сильно комедогенный'
                ],
                [
                    'name' => 'Ethylhexyl Palmitate',
                    'comedogenicity' => 4,
                    'description' => 'Эмолент, может закупоривать поры'
                ],
            // Этилгексилглицерин
            [
                'name' => 'Ethylhexylglycerin',
                'comedogenicity' => 0,
                'description' => 'Антисептик и увлажнитель, не вызывает комедогенности, безопасен для кожи.'
            ],

            // Экстракт корня скутеллярии байкальской
            [
                'name' => 'Scutellaria Baicalensis Root Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт растения с антивоспалительными и антиоксидантными свойствами, безопасен для кожи.'
            ],

            // Экстракт корня пиона
            [
                'name' => 'Paeonia Suffruticosa Root Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт корня пиона, обладает успокаивающим действием и улучшает состояние кожи.'
            ],

                // Полимеры
                [
                    'name' => 'Carbomer',
                    'comedogenicity' => 0,
                    'description' => 'Загуститель, формирует гель'
                ],
                [
                    'name' => 'Polyacrylamide',
                    'comedogenicity' => 0,
                    'description' => 'Формирует пленку, стабилизатор'
                ],
                [
                'name' => 'Portulaca Oleracea Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт портулаки, обладает антивоспалительными и антиоксидантными свойствами, безопасен для кожи.'
                 ],



                // Другие масла
                [
                    'name' => 'Hemp Seed Oil',
                    'comedogenicity' => 0,
                    'description' => 'Масло конопли, не комедогенное'
                ],
                [
                    'name' => 'Tamanu Oil',
                    'comedogenicity' => 2,
                    'description' => 'Масло таману, заживляющее'
                ],
            // Экстракт гамамелиса
                [
                'name' => 'Hamamelis Virginiana (Witch Hazel) Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт гамамелиса, известен своими успокаивающими и противовоспалительными свойствами, безопасен для большинства типов кожи.'
                 ],
            // Экстракт гамамелиса
            [
                'name' => 'Hamamelis Virginiana Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт гамамелиса, известен своими успокаивающими и противовоспалительными свойствами, безопасен для большинства типов кожи.'
            ],
            [
                'name' => 'Squalene',
                'comedogenicity' => 1,
                'description' => 'Натуральный увлажняющий компонент, помогает восстановить липидный барьер кожи'
            ],
            [
                'name' => 'Pyroglutamic Acid',
                'comedogenicity' => 0,
                'description' => 'Усиливает проникновение активных компонентов, обладает увлажняющими свойствами'
            ],
            [
                'name' => 'Bisabolol',
                'comedogenicity' => 0,
                'description' => 'Природный компонент ромашки, оказывает успокаивающее и противовоспалительное действие'
            ],
            [
                'name' => 'Saccharide Isomerate',
                'comedogenicity' => 0,
                'description' => 'Увлажняющий полисахарид, создает на коже защитную пленку'
            ],
            [
                'name' => 'Cehami Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт африканского растения, содержит антиоксиданты и противовоспалительные компоненты'
            ],
            [
                'name' => 'Alteromonas Ferment Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт морских бактерий, обладает увлажняющими и успокаивающими свойствами'
            ],
            [
                'name' => 'Polyglyceryl-3 Diisostearate',
                'comedogenicity' => 0,
                'description' => 'Эмульгатор, помогает стабилизировать формулы'
            ],
            [
                'name' => 'Sodium Cocoyl Glutamate',
                'comedogenicity' => 0,
                'description' => 'Мягкое поверхностно-активное вещество растительного происхождения'
            ],
            [
                'name' => 'Caprylyl Glycol',
                'comedogenicity' => 0,
                'description' => 'Увлажняющий компонент, часто используется в сочетании с консервантами'
            ],
            [
                'name' => 'Glucose',
                'comedogenicity' => 0,
                'description' => 'Натуральный увлажняющий компонент, усиливает проникновение активных веществ'
            ],
            [
                'name' => 'Diethoxyethyl Succinate',
                'comedogenicity' => 0,
                'description' => 'Увлажняющий и смягчающий компонент на основе янтарной кислоты'
            ],

            [
                'name' => 'Arbutin',
                'comedogenicity' => 0,
                'description' => 'Природный осветляющий компонент из растения Bearberry'
            ],
            [
                'name' => 'Alpha-Arbutin',
                'comedogenicity' => 0,
                'description' => 'Более стабильная форма арбутина, также обладает осветляющим действием'
            ],
            [
                'name' => 'Coccinia Indica Fruit Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт плодов Кокцинии индийской, содержит антиоксиданты'
            ],
            [
                'name' => 'Eclipta Prostrata Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт травы Эклипты распростертой, оказывает успокаивающее и осветляющее действие'
            ],
            [
                'name' => 'Macadamia Integrifolia Seed Oil',
                'comedogenicity' => 1,
                'description' => 'Масло макадамии, богатое мононенасыщенными жирными кислотами'
            ],
            [
                'name' => 'Olea Europaea Fruit Oil',
                'comedogenicity' => 2,
                'description' => 'Оливковое масло, питательное и увлажняющее'
            ],
            [
                'name' => 'Simmondsia Chinensis Seed Oil',
                'comedogenicity' => 2,
                'description' => 'Масло жожоба, схожее по строению с кожным себумом'
            ],
            [
                'name' => 'Vitis Vinifera Seed Oil',
                'comedogenicity' => 1,
                'description' => 'Масло виноградных косточек, богатое линолевой кислотой'
            ],
            [
                'name' => 'Theobroma Cacao Extract',
                'comedogenicity' => 4,
                'description' => 'Экстракт какао-бобов, питательный и смягчающий компонент'
            ],
            [
                'name' => 'Chamaecyparis Obtusa Leaf Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт листьев японского кипариса, обладает антиоксидантными свойствами'
            ],
            [
                'name' => 'Prunus Persica Flower Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт цветков персика, содержит витамины и аминокислоты'
            ],
            [
                'name' => 'Camellia Sinensis Seed Oil',
                'comedogenicity' => 1,
                'description' => 'Масло семян камелии, богато жирными кислотами'
            ],
            [
                'name' => 'Yeast Ferment Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт дрожжевого фермента, содержит витамины и минералы'
            ],
            [
                'name' => 'Artemisia Princeps Leaf Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт листьев полыни, обладает успокаивающим действием'
            ],
            [
                'name' => 'Candida Bombicola/Glucose/Methyl Rapeseedate Ferment',
                'comedogenicity' => 0,
                'description' => 'Био-ферментированный компонент, улучшает увлажнение'
            ],
            [
                'name' => 'Betaine Salicylate',
                'comedogenicity' => 0,
                'description' => 'Стабильное производное салициловой кислоты, обладает легким отшелушивающим эффектом'
            ],
            [
                'name' => 'Sucrose Palmitate',
                'comedogenicity' => 0,
                'description' => 'Эмульгатор на основе пальмового масла и сахарозы'
            ],
            [
                'name' => 'Hydrogenated Lecithin',
                'comedogenicity' => 0,
                'description' => 'Модифицированный лецитин, используется для стабилизации формул'
            ],
            [
                'name' => 'Gellan Gum',
                'comedogenicity' => 0,
                'description' => 'Натуральный полисахаридный загуститель, полученный из бактерий'
            ],
            [
                'name' => 'Sodium Phytate',
                'comedogenicity' => 0,
                'description' => 'Натуральный хелатирующий агент, стабилизирует формулы'
            ],
            [
                'name' => 'Cellulose',
                'comedogenicity' => 0,
                'description' => 'Натуральный полисахарид, используется в качестве загустителя'
            ],
            [
                'name' => 'Cyanocobalamin',
                'comedogenicity' => 0,
                'description' => 'Синтетическая форма витамина B12, оказывает восстанавливающее действие'
            ],
            [
                'name' => 'Polyglutamic Acid',
                'comedogenicity' => 0,
                'description' => 'Высокомолекулярный полимер, интенсивно увлажняет кожу'
            ],
            [
                'name' => 'Asiaticoside',
                'comedogenicity' => 0,
                'description' => 'Активный компонент экстракта центеллы, обладает заживляющим и восстанавливающим действием'
            ],
            [
                'name' => 'Asiatic Acid',
                'comedogenicity' => 0,
                'description' => 'Активный компонент экстракта центеллы, улучшает микроциркуляцию и регенерацию'
            ],
            [
                'name' => 'Dimethylsilanol Hyaluronate',
                'comedogenicity' => 0,
                'description' => 'Комплекс гиалуроновой кислоты с диметилсиланолом, обеспечивает глубокое увлажнение'
            ],
            [
                'name' => 'Potassium Hyaluronate',
                'comedogenicity' => 0,
                'description' => 'Соль гиалуроновой кислоты с калием, увлажняет и восстанавливает кожу'
            ],
            [
                'name' => 'Hydroxypropyltrimonium Hyaluronate',
                'comedogenicity' => 0,
                'description' => 'Катионный производный гиалуроновой кислоты, улучшает проникновение и увлажнение'
            ],
            [
                'name' => 'Sodium Hyaluronate Dimethylsilanol',
                'comedogenicity' => 0,
                'description' => 'Комплекс гиалуроната натрия и диметилсиланола, обеспечивает глубокое увлажнение'
            ],
            [
                'name' => 'Cholesterol',
                'comedogenicity' => 0,
                'description' => 'Холестерин используется для восстановления защитного барьера кожи, не является комедогенным.'
            ],
            // Мадекассосид
                [
                'name' => 'Madecassoside',
                'comedogenicity' => 0,
                'description' => 'Проводник и активатор заживления кожи, безопасен для всех типов кожи, в том числе чувствительной.'
                ],
                [
                'name' => 'Madecassic Acid',
                'comedogenicity' => 0,
                'description' => 'Антиоксидант и противовоспалительное средство, помогает заживлению кожи, безопасен для всех типов кожи.'
            ],
                [
                    'name' => 'Sea Buckthorn Oil',
                    'comedogenicity' => 1,
                    'description' => 'Масло облепихи, восстанавливающее'
                ],

                // Церамиды
                [
                    'name' => 'Ceramide NP',
                    'comedogenicity' => 0,
                    'description' => 'Восстанавливает барьер кожи'
                ],
                [
                    'name' => 'Ceramide AP',
                    'comedogenicity' => 0,
                    'description' => 'Укрепляет защитный барьер'
                ],
                [
                    'name' => 'Phytosphingosine',
                    'comedogenicity' => 0,
                    'description' => 'Предшественник церамидов'
                ],

                // Пробиотики
                [
                    'name' => 'Lactobacillus Ferment',
                    'comedogenicity' => 0,
                    'description' => 'Ферменты, укрепляют микробиом'
                ],
                [
                    'name' => 'Bifida Ferment Lysate',
                    'comedogenicity' => 0,
                    'description' => 'Пробиотик, укрепляет барьер'
                ],

                // Минералы
                [
                    'name' => 'Zinc Oxide',
                    'comedogenicity' => 1,
                    'description' => 'Оксид цинка, солнцезащитный фильтр'
                ],
                [
                    'name' => 'Titanium Dioxide',
                    'comedogenicity' => 0,
                    'description' => 'Диоксид титана, солнцезащитный фильтр'
                ],
                [
                    'name' => 'Magnesium Ascorbyl Phosphate',
                    'comedogenicity' => 0,
                    'description' => 'Стабильная форма витамина C'
                ],


                // Производные витаминов
                [
                    'name' => 'Tocopheryl Acetate',
                    'comedogenicity' => 1,
                    'description' => 'Витамин E, антиоксидант'
                ],
                [
                    'name' => 'Retinyl Palmitate',
                    'comedogenicity' => 2,
                    'description' => 'Производное витамина A'
                ],
                [
                    'name' => 'Ascorbyl Glucoside',
                    'comedogenicity' => 0,
                    'description' => 'Производное витамина C'
                ],

                // Новые кислоты
                [
                    'name' => 'Azelaic Acid',
                    'comedogenicity' => 0,
                    'description' => 'Азелаиновая кислота, против акне'
                ],
                [
                    'name' => 'Kojic Acid',
                    'comedogenicity' => 0,
                    'description' => 'Койевая кислота, осветляет'
                ],
                [
                    'name' => 'Tranexamic Acid',
                    'comedogenicity' => 0,
                    'description' => 'От пигментации и воспалений'
                ],

                // Растительные воски
                [
                    'name' => 'Carnauba Wax',
                    'comedogenicity' => 1,
                    'description' => 'Растительный воск'
                ],
                [
                    'name' => 'Candelilla Wax',
                    'comedogenicity' => 1,
                    'description' => 'Натуральный воск'
                ],
                [
                    'name' => 'Berry Wax',
                    'comedogenicity' => 2,
                    'description' => 'Воск из ягод'
                ],

                // Эфирные масла
                [
                    'name' => 'Lavender Oil',
                    'comedogenicity' => 2,
                    'description' => 'Масло лаванды, успокаивающее'
                ],
                [
                    'name' => 'Peppermint Oil',
                    'comedogenicity' => 1,
                    'description' => 'Масло мяты, освежающее'
                ],
                [
                    'name' => 'Rosemary Oil',
                    'comedogenicity' => 1,
                    'description' => 'Масло розмарина, тонизирующее'
                ],

                // Дополнительные растительные экстракты
                [
                    'name' => 'Witch Hazel Extract',
                    'comedogenicity' => 0,
                    'description' => 'Экстракт гамамелиса, вяжущий'
                ],
                [
                    'name' => 'Willow Bark Extract',
                    'comedogenicity' => 0,
                    'description' => 'Экстракт ивы, содержит салицилаты'
                ],
                [
                    'name' => 'Mugwort Extract',
                    'comedogenicity' => 0,
                    'description' => 'Экстракт полыни, успокаивающий'
                ],

                // Минеральные компоненты
                [
                    'name' => 'Kaolin',
                    'comedogenicity' => 0,
                    'description' => 'Белая глина, абсорбирующая'
                ],
                [
                    'name' => 'Bentonite',
                    'comedogenicity' => 0,
                    'description' => 'Бентонит, очищающая глина'
                ],
                [
                    'name' => 'Zinc PCA',
                    'comedogenicity' => 0,
                    'description' => 'Цинк PCA, себорегулирующий'
                ],
                // Увлажняющие компоненты
                [
                    'name' => 'Sodium PCA',
                    'comedogenicity' => 0,
                    'description' => 'Натуральный увлажняющий фактор'
                ],
                [
                    'name' => 'Urea',
                    'comedogenicity' => 0,
                    'description' => 'Увлажняет и отшелушивает'
                ],
            // Бета-глюкан
                [
                'name' => 'Beta-Glucan',
                'comedogenicity' => 0,
                'description' => 'Полисахарид с успокаивающими и антивоспалительными свойствами, безопасен для всех типов кожи.'
            ],
                [
                    'name' => 'Betaine',
                    'comedogenicity' => 0,
                    'description' => 'Увлажняет и защищает'
                ],


                // Новые силиконы
                [
                    'name' => 'Methyl Trimethicone',
                    'comedogenicity' => 1,
                    'description' => 'Легкий силикон'
                ],
                [
                    'name' => 'Phenyl Trimethicone',
                    'comedogenicity' => 1,
                    'description' => 'Силикон, придает блеск'
                ],
                [
                    'name' => 'PEG-10 Dimethicone',
                    'comedogenicity' => 1,
                    'description' => 'Водорастворимый силикон'
                ],

                // Пептиды и протеины
                [
                    'name' => 'Palmitoyl Tripeptide-1',
                    'comedogenicity' => 0,
                    'description' => 'Пептид, стимулирует коллаген'
                ],
                [
                    'name' => 'Hydrolyzed Collagen',
                    'comedogenicity' => 0,
                    'description' => 'Гидролизованный коллаген'
                ],
                [
                    'name' => 'Silk Proteins',
                    'comedogenicity' => 0,
                    'description' => 'Протеины шелка, увлажняют'
                ],

                // Регуляторы жирности
                [
                    'name' => 'Nylon-12',
                    'comedogenicity' => 0,
                    'description' => 'Абсорбирует излишки себума'
                ],
                [
                    'name' => 'Silica',
                    'comedogenicity' => 0,
                    'description' => 'Матирует и абсорбирует'
                ],
                [
                    'name' => 'Corn Starch',
                    'comedogenicity' => 0,
                    'description' => 'Крахмал, абсорбирует'
                ],
            [
                'name' => 'Water',
                'comedogenicity' => 0,
                'description' => 'Основной растворитель в косметике'
            ],
            [
                'name' => 'Ascorbic Acid',
                'comedogenicity' => 0,
                'description' => 'Витамин С (13%), мощный антиоксидант, осветляет кожу'
            ],
            [
                'name' => 'Butylene Glycol',
                'comedogenicity' => 1,
                'description' => 'Увлажнитель, улучшает проникновение активных компонентов'
            ],
            [
                'name' => 'Dipropylene Glycol',
                'comedogenicity' => 0,
                'description' => 'Растворитель, кондиционирующий агент'
            ],
            [
                'name' => 'Serine',
                'comedogenicity' => 0,
                'description' => 'Аминокислота, увлажняет и поддерживает кожный барьер'
            ],
            [
                'name' => 'Glutamic Acid',
                'comedogenicity' => 0,
                'description' => 'Аминокислота, важная для регенерации кожи'
            ],
            [
                'name' => 'Aspartic Acid',
                'comedogenicity' => 0,
                'description' => 'Аминокислота, участвует в процессах увлажнения'
            ],
            [
                'name' => 'Leucine',
                'comedogenicity' => 0,
                'description' => 'Аминокислота, стимулирует выработку коллагена'
            ],
            [
                'name' => 'Alanine',
                'comedogenicity' => 0,
                'description' => 'Аминокислота, помогает удерживать влагу в коже'
            ],
            [
                'name' => 'Lysine',
                'comedogenicity' => 0,
                'description' => 'Аминокислота, участвует в формировании коллагена'
            ],
                [
                    'name' => 'Tyrosine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, участвует в пигментообразовании'
                ],
                [
                    'name' => 'Phenylalanine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, необходима для синтеза коллагена'
                ],
                [
                    'name' => 'Threonine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, поддерживает барьерные функции кожи'
                ],
                [
                    'name' => 'Valine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, участвует в процессах регенерации'
                ],
                [
                    'name' => 'Isoleucine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, необходима для синтеза белков'
                ],
                [
                    'name' => 'Histidine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, обладает противовоспалительным действием'
                ],
                [
                    'name' => 'Methionine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, участвует в клеточном росте'
                ],
                [
                    'name' => 'Cysteine',
                    'comedogenicity' => 0,
                    'description' => 'Аминокислота, важна для синтеза коллагена и кератина'
                ],

            [
                'name' => '3-O-Ethyl Ascorbic Acid',
                'comedogenicity' => 0,
                'description' => 'Стабильная форма витамина С, осветляет и защищает'
            ],
            [
                'name' => 'Panthenol',
                'comedogenicity' => 0,
                'description' => 'Провитамин B5, увлажняет и заживляет'
            ],
            [
                'name' => 'Acetyl Glucosamine',
                'comedogenicity' => 0,
                'description' => 'Увлажняет, поддерживает синтез гиалуроновой кислоты'
            ],
            [
                'name' => 'Caffeine',
                'comedogenicity' => 0,
                'description' => 'Антиоксидант, уменьшает отечность'
            ],
            [
                'name' => 'Sodium Hyaluronate',
                'comedogenicity' => 0,
                'description' => 'Гиалуронат натрия, интенсивно увлажняет'
            ],
            [
                'name' => 'Hydrolyzed Hyaluronic Acid (500ppm)',
                'comedogenicity' => 0,
                'description' => 'Гидролизованный гиалуронат, улучшает увлажнение кожи, не вызывает закупорки пор.'
            ],
            [
                'name' => 'Sodium Sulfite',
                'comedogenicity' => 0,
                'description' => 'Консервант, антиоксидант'
            ],
            [
                'name' => 'Disodium EDTA',
                'comedogenicity' => 0,
                'description' => 'Хелатирующий агент, стабилизатор формулы'
            ],
            [
                'name' => 'Glutathione',
                'comedogenicity' => 0,
                'description' => 'Антиоксидант, осветляет кожу'
            ],
            [
                'name' => 'Adenosine',
                'comedogenicity' => 0,
                'description' => 'Успокаивает кожу, уменьшает морщины'
            ],
            [
                'name' => 'Gardenia Florida Fruit Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт гардении, антиоксидант'
            ],
            [
                'name' => 'Allantoin',
                'comedogenicity' => 0,
                'description' => 'Успокаивает и заживляет кожу'
            ],
            [
                'name' => 'Dextrin',
                'comedogenicity' => 0,
                'description' => 'Загуститель, улучшает текстуру'
            ],
            [
                'name' => 'Squalane',
                'comedogenicity' => 1,
                'description' => 'Легкий эмолент, восстанавливает барьер кожи'
            ],
            [
                'name' => 'Tocotrienols',
                'comedogenicity' => 0,
                'description' => 'Форма витамина Е, антиоксидант'
            ],
            [
                'name' => 'Tocopherol',
                'comedogenicity' => 0,
                'description' => 'Витамин Е, антиоксидант'
            ],
            [
                'name' => 'Elaeis Guineensis Oil',
                'comedogenicity' => 3,
                'description' => 'Пальмовое масло, может быть комедогенным'
            ],
            [
                'name' => 'Pentylene Glycol',
                'comedogenicity' => 0,
                'description' => 'Увлажнитель, усилитель проникновения'
            ],
            [
                'name' => 'Glyceryl Acrylate/Acrylic Acid Copolymer',
                'comedogenicity' => 0,
                'description' => 'Полимер, используется для стабилизации формул, не вызывает закупорки пор.'
            ],
            // PVM/MA кополимер
            [
                'name' => 'PVM/MA Copolymer',
                'comedogenicity' => 0,
                'description' => 'Используется как стабилизатор и улучшает текстуру продуктов, не вызывает комедогенности.'
            ],

            // Полиглицерил-10 лаурет
            [
                'name' => 'Polyglyceryl-10 Laurate',
                'comedogenicity' => 0,
                'description' => 'Моющее средство, используется в качестве эмульгатора, безопасен для кожи.'
            ],

            // Ксантановая камедь
            [
                'name' => 'Xanthan Gum',
                'comedogenicity' => 0,
                'description' => 'Природный загуститель, безопасен для кожи и не вызывает закупорки пор.'
            ],

            // Трометамол
            [
                'name' => 'Tromethamine',
                'comedogenicity' => 0,
                'description' => 'Используется для регулирования pH продуктов, безопасен для кожи.'
            ],
            [
                'name' => 'Glycyrrhiza Glabra Root Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт корня солодки, осветляет и успокаивает'
            ],
            [
                'name' => 'Glycyrrhiza Glabra (Licorice) Root Extract',
                'comedogenicity' => 0,
                'description' => 'Экстракт корня солодки, осветляет и успокаивает'
            ],

            [
                'name' => 'Snail Secretion Filtrate',
                'comedogenicity' => 1,
                'description' => 'Фильтрат секрета улитки, увлажняет и восстанавливает кожу'
            ],
            [
                'name' => 'Cetearyl Olivate',
                'comedogenicity' => 2,
                'description' => 'Эмульгатор на основе оливкового масла, смягчает кожу'
            ],
            [
                'name' => 'Sorbitan Olivate',
                'comedogenicity' => 2,
                'description' => 'Эмульгатор из оливкового масла, часто используется вместе с Cetearyl Olivate'
            ],

            [
                'name' => 'Ethyl Hexanediol',
                'comedogenicity' => 1,
                'description' => 'Увлажняющий компонент и растворитель'
            ],
            [
                'name' => 'Sodium Polyacrylate',
                'comedogenicity' => 0,
                'description' => 'Полимер, загуститель и стабилизатор формулы'
            ],
            [
                'name' => 'Palmitic Acid',
                'comedogenicity' => 2,
                'description' => 'Жирная кислота, может быть комедогенной'
            ],
            [
                'name' => 'Stearic Acid',
                'comedogenicity' => 3,
                'description' => 'Жирная кислота, умеренно комедогенная'
            ],
            [
                'name' => 'Myristic Acid',
                'comedogenicity' => 3,
                'description' => 'Жирная кислота, умеренно комедогенная'
            ],
            [
                'name' => 'Coconut Oil',
                'comedogenicity' => 5,
                'description' => 'Масло кокоса, высоко комедогенное, может забивать поры на жирной и проблемной коже.'
            ],
            [
                'name' => 'Isopropyl Myristate',
                'comedogenicity' => 5,
                'description' => 'Используется как растворитель и эмолент, может вызывать закупорку пор.'
            ],
            [
                'name' => 'Lanolin',
                'comedogenicity' => 4,
                'description' => 'Природный воск, получаемый из шерсти овец, может блокировать поры, особенно у чувствительных.'
            ],
            [
                'name' => 'Cocoa Butter',
                'comedogenicity' => 4,
                'description' => 'Масло какао, часто используется в продуктах для увлажнения кожи, может забивать поры на жирной коже.'
            ],
            [
                'name' => 'Wheat Germ Oil',
                'comedogenicity' => 4,
                'description' => 'Масло пшеничных зародышей, высоко жирное и может быть комедогенным для жирной кожи.'
            ],
            [
                'name' => 'Sodium Lauryl Sulfate',
                'comedogenicity' => 3,
                'description' => 'Активное вещество, которое может раздражать кожу и вызывать закупорку пор.'
            ],
            [
                'name' => 'Sodium Acetylated Hyaluronate',
                'comedogenicity' => 0,
                'description' => 'Гиалуронат с ацетилированной группой, улучшает проникающую способность и увлажняет кожу.'
            ],

            [
                'name' => 'Algae Extract',
                'comedogenicity' => 3,
                'description' => 'Экстракты водорослей, могут вызывать раздражение и закупорку пор при длительном применении.'
            ],
            [
                'name' => 'Algin',
                'comedogenicity' => 1,
                'description' => 'Экстракт водорослей, используемый в косметике в качестве загустителя, стабилизатора и увлажнителя. Он не вызывает закупорки пор и безопасен для большинства типов кожи.'
            ],
            [
                'name' => 'Benzophenone',
                'comedogenicity' => 2,
                'description' => 'Солнцезащитный агент, иногда вызывает реакцию на коже и блокирует поры.'
            ],
            [
                'name' => 'Sodium Hyaluronate Crosspolymer',
                'comedogenicity' => 0,
                'description' => 'Кроссполимер гиалуроната, используется для глубокой гидратации, не вызывает закупорки пор.'
            ],
            [
                'name' => 'Hydrolyzed Sodium Hyaluronate',
                'comedogenicity' => 0,
                'description' => 'Гидролизованный гиалуронат натрия, применяется для интенсивного увлажнения, безопасен для кожи.'
            ],

            [
                'name' => 'Petrolatum',
                'comedogenicity' => 5,
                'description' => 'Петролатум или вазелин, может вызывать закупорку пор на жирной и склонной к акне коже.'
            ],
            [
                'name' => 'Acetylated Lanolin',
                'comedogenicity' => 4,
                'description' => 'Является модификацией ланолина, который используется для улучшения текстуры и увеличения стабильности продуктов, но может вызывать проблемы для людей с жирной или склонной к акне кожей.'
            ],
            [
                'name' => 'Acetylated Lanolin Alcohol',
                'comedogenicity' => 4,
                'description' => 'Является модификацией ланолина, который используется для улучшения текстуры и увеличения стабильности продуктов, но может вызывать проблемы для людей с жирной или склонной к акне кожей.'
            ],
            [
                'name' => 'Cetearyl Alcohol',
                'comedogenicity' => 3,
                'description' => 'Спирт с жирными кислотами, может быть комедогенным для кожи с акне.'
            ],
            [
                'name' => 'Dimethicone',
                'comedogenicity' => 0,
                'description' => 'Силикон, безопасен для большинства типов кожи и не вызывает закупорку пор.'
            ],
            [
                'name' => 'Hyaluronic Acid',
                'comedogenicity' => 0,
                'description' => 'Гиалуроновая кислота, увлажняющий компонент, безопасен для всех типов кожи.'
            ],
            [
                'name' => 'Stearic acid',
                'comedogenicity' => 2,
                'description' => 'Жирная кислота, используется как эмульгатор, стабилизатор и загуститель.В некоторых случаях, особенно при использовании в больших концентрациях или в комбинации с другими жирными компонентами, она может вызвать закупорку пор у людей с чувствительной и склонной к акне кожей. В целом, для большинства типов кожи, она считается относительно безопасной.'
            ]
        ];




        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
