<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFaq;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $dermatology = Category::where('slug', 'dermatology-skin-care')->first();
        $gastro = Category::where('slug', 'gastroenterology-gut-health')->first();
        $pediatrics = Category::where('slug', 'pediatrics-child-healthcare')->first();
        $ortho = Category::where('slug', 'orthopedics-bone-health')->first();
        $vitality = Category::where('slug', 'general-vitality-tonics')->first();

        $products = [
            // 1. SCABICOD SOAP
            [
                'category_id' => $dermatology?->id,
                'therapeutic_class' => 'Anti-Scabies & Parasiticidal Medicated Soap Bar',
                'name' => 'SCABICOD SOAP',
                'slug' => 'scabicod-soap',
                'generic_name' => 'Permethrin 1% w/w',
                'brand_name' => 'SCABICOD SOAP',
                'strength' => '1% w/w',
                'dosage_form' => 'Medicated Soap Bar',
                'pack_size' => '75 gm Bar',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'active_ingredients' => 'Permethrin USP 1% w/w',
                'market_price_range' => 'BDT 220.00 to BDT 250.00',
                'short_description' => 'SCABICOD SOAP contains Permethrin 1% w/w, a pyrethroid that paralyzes and kills mites and their eggs for prevention and treatment of scabies.',
                'full_description' => 'This soap contains Permethrin 1% w/w, a pyrethroid that works by paralyzing and killing mites and their eggs. It is prescribed for the prevention and treatment of scabies, caused by tiny parasites that irritate the skin. It is commonly used alongside creams or lotions during treatment and may be continued as directed by a physician to help reduce the risk of recurrence.',
                'pharmacology' => 'Permethrin is a synthetic pyrethroid active against a broad range of pests including mites and lice. It acts on the nerve cell membrane of parasites by disrupting sodium channel currents, causing delayed repolarization, paralysis, and death of mites and their eggs.',
                'indications' => "• Treatment of scabies (mite infestation)\n• Helps eliminate mites and their eggs\n• Helps relieve itching and skin irritation associated with scabies\n• Supports prevention of reinfestation when used as directed",
                'dosage' => "• Wet the affected skin with water.\n• Apply the soap and work into a rich lather.\n• Leave the lather on the skin for 3–5 minutes.\n• Rinse thoroughly with clean water.\n• Use as directed by a physician.",
                'directions_for_use' => 'Wet the affected skin with water. Apply the soap and work into a rich lather. Leave the lather on the skin for 3 to 5 minutes before rinsing thoroughly with clean water.',
                'side_effects' => 'Well tolerated, no known side effects.',
                'contraindications' => "• Hypersensitivity or allergy to Permethrin or any ingredient in the formulation.\n• For external use only.\n• Avoid contact with eyes, mouth, and other mucous membranes.",
                'precautions' => "• Use only as prescribed.\n• Do not apply to broken or severely inflamed skin unless advised by a physician.\n• Discontinue use and seek medical advice if severe irritation or an allergic reaction occurs.\n• Keep out of reach of children.",
                'pregnancy_lactation' => 'Use during pregnancy and breastfeeding only if prescribed by a registered physician.',
                'drug_interactions' => 'Avoid simultaneous application of harsh skin cleansers or other unapproved topical medications.',
                'storage' => "• Store in a cool, dry place below 30°C.\n• Protect from direct sunlight and moisture.\n• Keep the soap tightly packed after use.",
                'featured_image' => 'images/products/scabicod-soap.png',
                'seo_title' => 'SCABICOD SOAP (Permethrin 1% w/w) - Anti-Scabies Medicated Soap',
                'meta_description' => 'SCABICOD SOAP (Permethrin 1% w/w) for treatment and prevention of scabies. Paralyzes and eliminates mites and their eggs.',
                'meta_keywords' => 'SCABICOD SOAP, Permethrin 1% soap, anti scabies soap, Green Darma soap, scabies treatment bar',
                'image_alt' => 'SCABICOD SOAP Permethrin 1 percent Green Darma Pharmaceuticals',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is SCABICOD SOAP used for?', 'answer' => 'SCABICOD SOAP (Permethrin 1% w/w) is used for the treatment and prevention of scabies, helping eliminate mites and their eggs and relieve skin itching.'],
                    ['question' => 'How long should SCABICOD SOAP lather stay on the skin?', 'answer' => 'Leave the lather on wet skin for 3–5 minutes before rinsing thoroughly with clean water.'],
                    ['question' => 'Are there any known side effects of SCABICOD SOAP?', 'answer' => 'SCABICOD SOAP is well tolerated with no known side effects.'],
                ],
            ],

            // 2. TINEA SOAP
            [
                'category_id' => $dermatology?->id,
                'therapeutic_class' => 'Topical Antifungal Agent (Azole Antifungal)',
                'name' => 'Tinea Soap',
                'slug' => 'tinea-soap',
                'generic_name' => 'Luliconazole 1%',
                'brand_name' => 'Tinea Soap',
                'strength' => '1% w/w',
                'dosage_form' => 'Medicated Soap Bar',
                'pack_size' => '75 gm Bar',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'active_ingredients' => 'Luliconazole INN 1% w/w',
                'market_price_range' => 'BDT 198.00 to BDT 530.00',
                'short_description' => 'Tinea Soap is indicated for the topical treatment of interdigital tinea pedis, tinea cruris and tinea corporis caused by Trichophyton rubrum and Epidermophyton floccosum.',
                'full_description' => 'Tinea Soap (Luliconazole 1%) is indicated for the topical treatment of interdigital tinea pedis, tinea cruris and tinea corporis caused by the organisms Trichophyton rubrum and Epidermophyton floccosum.',
                'pharmacology' => 'Luliconazole is a topical antifungal agent. It is a broad-spectrum antifungal agent that belongs to the azole group. It acts against fungus by inhibiting the enzyme lanosterol demethylase and blocks ergosterol synthesis which is an important constituent of fungal cell membrane. Thus it exerts strong fungicidal activity both in vitro and in vivo against dermatophytes, Candida albicans, Malassezia spp., Trichophyton and Epidermophyton spp.',
                'indications' => 'Is indicated for the topical treatment of interdigital tinea pedis, tinea cruris and tinea corporis caused by the organisms Trichophyton rubrum and Epidermophyton floccosum.',
                'dosage' => 'Apply a thin layer to the affected area and approximately 1 inch of the surrounding skin once daily or as directed by the physician. Continue treatment for the recommended duration to ensure complete eradication of the fungal infection.',
                'directions_for_use' => 'Clean and dry the affected area before application. Apply a thin layer evenly over the infected skin and gently rub until absorbed. Wash hands before and after use unless the hands are the treated area. For external use only.',
                'side_effects' => 'Contact dermatitis and cellulitis may occur. Application site reactions were observed in less than 1% of subjects in clinical trials.',
                'contraindications' => 'Contraindicated in patients with a history of hypersensitivity to luliconazole.',
                'precautions' => 'For external use only. Avoid contact with the eyes, mouth and other mucous membranes. Discontinue use if severe irritation or allergic reactions occur. Use only as directed by the physician.',
                'pregnancy_lactation' => 'Use during pregnancy and lactation only if the potential benefit justifies the potential risk. Consult a registered physician before use.',
                'drug_interactions' => 'Avoid simultaneous application of other topical antifungal formulations on the same site unless advised by a physician.',
                'storage' => 'Store below 30°C in a cool, dry place. Protect from light and moisture. Keep out of the reach of children.',
                'featured_image' => 'images/products/tinea-soap.png',
                'seo_title' => 'Tinea Soap (Luliconazole 1%) - Topical Antifungal Agent | Green Darma',
                'meta_description' => 'Tinea Soap (Luliconazole 1%) for topical treatment of tinea pedis, tinea cruris, and tinea corporis. Broad-spectrum azole antifungal medicated soap.',
                'meta_keywords' => 'Tinea Soap, Luliconazole 1% soap, topical antifungal soap, tinea pedis treatment, Green Darma Luliconazole',
                'image_alt' => 'Tinea Soap Luliconazole 1 percent Green Darma Pharmaceuticals',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is Tinea Soap used for?', 'answer' => 'Tinea Soap is indicated for the topical treatment of interdigital tinea pedis (athlete\'s foot), tinea cruris (jock itch), and tinea corporis (ringworm).'],
                    ['question' => 'How should Tinea Soap be applied?', 'answer' => 'Clean and dry the affected area before application. Apply a thin layer evenly over infected skin and approximately 1 inch of surrounding skin once daily.'],
                    ['question' => 'Is Tinea Soap safe during pregnancy and lactation?', 'answer' => 'Use during pregnancy and lactation only if the potential benefit justifies the potential risk, under consultation with a registered physician.'],
                ],
            ],

            // 3. SCABVAR LOTION
            [
                'category_id' => $dermatology?->id,
                'therapeutic_class' => 'Scabicides & Antipruritics (Topical)',
                'name' => 'SCABVAR Lotion',
                'slug' => 'scabvar-lotion',
                'generic_name' => 'Permethrin 5% + Crotamiton 10%',
                'brand_name' => 'SCABVAR Lotion',
                'strength' => '5% w/v + 10% w/v',
                'dosage_form' => 'Topical Lotion',
                'pack_size' => '60 ml Bottle',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'active_ingredients' => 'Permethrin 5% w/v + Crotamiton 10% w/v',
                'market_price_range' => 'BDT 160.00 to BDT 255.00',
                'short_description' => 'SCABVAR Lotion is indicated for the treatment of scabies and pruritus, providing fast relief from itching and skin irritation.',
                'full_description' => 'SCABVAR Lotion (Permethrin 5% + Crotamiton 10%) is indicated for the treatment of scabies and pruritus. Moreover, it is used for the relief of itching and skin irritation such as sunburn, dry eczema, itchy dermatitis, allergic rashes, hives, nettle rash, chickenpox, insect bites and stings, heat rashes and personal itching.',
                'pharmacology' => 'Permethrin is a synthetic pyrethroid with potent scabicidal activity that acts by disrupting the nerve membrane function of mites, leading to paralysis and death. Crotamiton possesses both antipruritic and scabicidal properties, providing effective relief from itching while helping eliminate scabies mites.',
                'indications' => 'SCABVAR lotion is indicated for the treatment of scabies and pruritus. Moreover, it is used for the relief of itching and skin irritation such as sunburn, dry eczema, itchy dermatitis, allergic rashes, hives, nettle rash, chickenpox, insect bites and stings, heat rashes and personal itching.',
                'dosage' => "Adults (including the elderly): After the patient has taken a warm bath, the skin should be well dried and the lotion rubbed into the entire body surface (excluding the face and scalp) until no traces of the preparation remain visible. The application should be repeated once daily, preferably in the evening, for a total of 3–5 days. Particular attention should be paid to areas susceptible to mite infestation such as the interdigital spaces, wrists, axillae and genitalia. After completion of treatment, a cleansing bath should be taken followed by a change of bed linen and underclothing.\n\nChildren: Apply as described for adults. In children under 2 years of age, the lotion should not be applied more than once daily.",
                'directions_for_use' => 'Before application, the skin should be clean, cool and dry. For adults and children over 2 years, apply the lotion to the whole body from the neck down, rubbing lightly into the skin until the lotion disappears. Include all skin surfaces, such as between the fingers and toes, under the nails and on the soles of the feet. For babies under 2 years, apply to the face, neck, ears and scalp, avoiding the areas immediately around the eyes and mouth. Leave the lotion on for at least 8 hours before washing off. Reapply to any area that may be washed during the treatment period, such as after washing the hands.',
                'side_effects' => 'The lotion is generally well tolerated. Mild burning, stinging, itching, redness, skin irritation or rash may occur. Excessive application may result in localized adverse reactions or more severe skin reactions.',
                'contraindications' => 'Contraindicated in patients with known hypersensitivity to Permethrin, Crotamiton, or any of the excipients of the formulation.',
                'precautions' => 'For external use only. Avoid contact with the eyes, mouth and other mucous membranes. Do not apply to severely inflamed or broken skin unless advised by a physician. Use with caution in infants and young children and follow the recommended treatment duration.',
                'pregnancy_lactation' => 'Use during pregnancy and breastfeeding only if clearly needed and under the advice of a registered physician.',
                'drug_interactions' => 'Avoid concurrent use with other topical anti-pruritics or skin preparations that may alter skin permeability.',
                'storage' => 'Store below 30°C in a cool, dry place, protected from light and moisture. Keep out of the reach of children.',
                'featured_image' => 'images/products/scabvar-lotion.png',
                'seo_title' => 'SCABVAR Lotion (Permethrin 5% + Crotamiton 10%) - Scabies & Antipruritic',
                'meta_description' => 'SCABVAR Lotion (Permethrin 5% + Crotamiton 10%) for scabies and pruritus relief. Effective topical scabicide and anti-itch lotion.',
                'meta_keywords' => 'SCABVAR Lotion, Permethrin Crotamiton, scabies lotion, antipruritic lotion, skin itching relief',
                'image_alt' => 'SCABVAR Lotion Permethrin 5 percent Crotamiton 10 percent',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is SCABVAR Lotion used for?', 'answer' => 'SCABVAR lotion is indicated for the treatment of scabies and pruritus, as well as relief of itching from eczema, rashes, insect bites, and heat rashes.'],
                    ['question' => 'How long should SCABVAR Lotion remain on the skin?', 'answer' => 'Leave the lotion on for at least 8 hours before washing off.'],
                    ['question' => 'How should SCABVAR Lotion be applied to children under 2 years?', 'answer' => 'For babies under 2 years, apply to face, neck, ears and scalp (avoiding eyes and mouth), not more than once daily.'],
                ],
            ],

            // 4. GREENSTAR SHAMPOO
            [
                'category_id' => $dermatology?->id,
                'therapeutic_class' => 'Topical Antifungal Shampoo / Anti-Dandruff Preparation',
                'name' => 'Greenstar Shampoo',
                'slug' => 'greenstar-shampoo',
                'generic_name' => 'Ketoconazole 2% + Zinc Pyrithione 1% + Aloe Vera 10%',
                'brand_name' => 'Greenstar Shampoo',
                'strength' => 'Ketoconazole 2% w/v + ZPTO 1% w/v + Aloe Vera 10% w/v',
                'dosage_form' => 'Medicated Antidandruff Shampoo',
                'pack_size' => '100 ml Bottle',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'active_ingredients' => 'Ketoconazole USP 2% w/v + Zinc Pyrithione (ZPTO) 1% w/v + Aloe Vera Extract 10% w/v',
                'market_price_range' => 'BDT 250.00 to BDT 690.00',
                'short_description' => 'Greenstar Shampoo is indicated for the treatment and prevention of seborrhoeic dermatitis, dandruff (Pityriasis capitis) and pityriasis versicolor.',
                'full_description' => 'Greenstar Shampoo (Ketoconazole 2% + Zinc Pyrithione 1% + Aloe Vera 10%) is indicated for the treatment and prevention of seborrhoeic dermatitis, dandruff (Pityriasis capitis) and pityriasis versicolor. It also helps control scalp itching, flaking and scaling associated with fungal infections.',
                'pharmacology' => 'Ketoconazole interacts with 14-α-sterol demethylase, a cytochrome P-450 enzyme necessary for the conversion of lanosterol to ergosterol. This results in inhibition of ergosterol synthesis and increased fungal cellular permeability due to reduced amounts of ergosterol present in the fungal cell membrane. This metabolic inhibition also results in accumulation of 14-α-methyl-3,6-diol, a toxic sterol. The increase in membrane fluidity is also thought to produce impairment of membrane-bound enzyme systems as components become less closely packed.',
                'indications' => 'For the treatment and prevention of seborrhoeic dermatitis, dandruff (Pityriasis capitis) and pityriasis versicolor. It also helps control scalp itching, flaking and scaling associated with fungal infections.',
                'dosage' => "To use the Ketoconazole 2% shampoo, follow these steps:\n\nShake the bottle well before use.\nUse a small amount of water to wet the area where Ketoconazole 2% shampoo is to be applied.\nApply the shampoo to the affected skin/scalp and a large area around it.\nGently rub the shampoo until it forms lather.\nLeave the shampoo on the skin/scalp for 5 minutes.\nRinse the shampoo off with water.\n\nTreatment:\nSeborrhoeic dermatitis and Dandruff: twice weekly for 2 to 4 weeks.\nPityriasis versicolor: once daily for 5 days.\nSeborrhoeic dermatitis and Dandruff (Prevention): once every 1 or 2 weeks.\nPityriasis versicolor (Prevention): once daily for 3 days during a single treatment course before the summer.",
                'directions_for_use' => 'Wet the hair and scalp thoroughly before application. Apply the shampoo evenly to the affected area, massage gently until a rich lather forms, leave for 5 minutes, then rinse thoroughly with clean water. Avoid contact with the eyes.',
                'side_effects' => 'Application site irritation, burning sensation, itching, dryness, redness or changes in hair texture may occur. These reactions are generally mild and temporary.',
                'contraindications' => 'Contraindicated in patients with known hypersensitivity to Ketoconazole, Zinc Pyrithione, Aloe Vera or any component of the formulation.',
                'precautions' => 'In patients who have been on prolonged treatment with topical corticosteroids, it is recommended that the steroid treatment be gradually withdrawn over a period of 2 to 3 weeks, while using Ketoconazole shampoo, to prevent any potential rebound effect. Avoid contact with the eyes. If the shampoo gets into the eyes, they should be bathed with water.',
                'pregnancy_lactation' => 'Use during pregnancy and lactation only if clearly needed and under the advice of a registered physician.',
                'storage' => 'Store below 30°C in a cool, dry place. Protect from direct sunlight. Keep out of the reach of children.',
                'featured_image' => 'images/products/greenstar-shampoo.png',
                'seo_title' => 'Greenstar Shampoo (Ketoconazole 2% + ZPTO 1% + Aloe Vera 10%) | Green Darma',
                'meta_description' => 'Greenstar Shampoo (Ketoconazole 2% + ZPTO 1% + Aloe Vera 10%) for treatment and prevention of dandruff, seborrhoeic dermatitis, and pityriasis versicolor.',
                'meta_keywords' => 'Greenstar Shampoo, Ketoconazole ZPTO shampoo, anti-dandruff shampoo, seborrhoeic dermatitis, Green Darma shampoo',
                'image_alt' => 'Greenstar Shampoo Ketoconazole 2 percent Zinc Pyrithione 1 percent Aloe Vera 10 percent',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is Greenstar Shampoo used for?', 'answer' => 'Greenstar Shampoo is used for the treatment and prevention of seborrhoeic dermatitis, severe dandruff, and pityriasis versicolor.'],
                    ['question' => 'How long should Greenstar Shampoo be left on the scalp?', 'answer' => 'Leave the shampoo on the skin/scalp for 5 minutes before rinsing thoroughly with water.'],
                    ['question' => 'What is the recommended treatment frequency for dandruff?', 'answer' => 'Use twice weekly for 2 to 4 weeks during active treatment, and once every 1 or 2 weeks for prevention.'],
                ],
            ],

            // 5. X-COREL G TABLET
            [
                'category_id' => $ortho?->id,
                'therapeutic_class' => 'Calcium, Vitamin D & Mineral Supplement / Bone Health Supplement',
                'name' => 'X-Corel G Tablet',
                'slug' => 'x-corel-g-tablet',
                'generic_name' => 'Coral Calcium 600 mg + Vitamin D3 + Magnesium',
                'brand_name' => 'X-Corel G Tablet',
                'strength' => 'Coral Calcium 600 mg + Vitamin D3 400 IU + Magnesium 365 mg',
                'dosage_form' => 'Film-Coated Tablet',
                'pack_size' => '30 Tablets Container / Blister',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'active_ingredients' => 'Coral Calcium (Organic Calcium Carbonate) 600 mg + Vitamin D3 (Cholecalciferol) 400 IU + Magnesium Oxide 365 mg',
                'market_price_range' => 'BDT 200.00 to BDT 450.00',
                'short_description' => 'X-Corel G Tablet is indicated for the prevention and treatment of calcium and vitamin D deficiency, supporting bone and teeth health, osteoporosis, and fracture healing.',
                'full_description' => 'X-Corel G Tablet is indicated for the prevention and treatment of calcium and vitamin D deficiency. It is used to support bone and teeth health, osteoporosis, osteopenia, increased calcium requirements during pregnancy and lactation, postmenopausal bone loss, elderly patients with calcium deficiency, and as an adjunct in fracture healing.',
                'pharmacology' => 'Coral Calcium provides elemental calcium essential for bone mineralization and maintenance of healthy bones and teeth. Vitamin D3 (Cholecalciferol) enhances intestinal absorption of calcium and phosphorus, improving calcium utilization and supporting normal bone formation. Magnesium plays an important role in bone metabolism, muscle function, nerve transmission, and activation of vitamin D, contributing to overall skeletal health.',
                'indications' => 'X-Corel G Tablet is indicated for the prevention and treatment of calcium and vitamin D deficiency. It is used to support bone and teeth health, osteoporosis, osteopenia, increased calcium requirements during pregnancy and lactation, postmenopausal bone loss, elderly patients with calcium deficiency, and as an adjunct in fracture healing.',
                'dosage' => 'Adults: 1 tablet once or twice daily, preferably after meals, or as directed by the physician. Swallow the tablet whole with water.',
                'directions_for_use' => "• Take the tablet after food.\n• Swallow whole with a glass of water.\n• Do not crush or chew unless advised by a physician.\n• Use regularly for maximum benefit.",
                'side_effects' => 'Generally well tolerated. Mild side effects may include constipation, nausea, abdominal discomfort, bloating, flatulence, or diarrhea. Excessive intake may lead to hypercalcemia.',
                'contraindications' => 'Contraindicated in patients with hypersensitivity to any of the ingredients, hypercalcemia, hypervitaminosis D, severe renal impairment, nephrolithiasis (kidney stones), or conditions associated with excessive calcium accumulation.',
                'precautions' => 'Use with caution in patients with kidney disease, history of renal stones, cardiac disorders, or sarcoidosis. Avoid exceeding the recommended dose. Periodic monitoring of serum calcium may be required during prolonged therapy.',
                'pregnancy_lactation' => 'May be used during pregnancy and lactation when calcium supplementation is indicated and under the advice of a registered physician.',
                'drug_interactions' => 'Oral calcium may decrease absorption of tetracycline and fluoroquinolone antibiotics, bisphosphonates, and levothyroxine. Separate administration by 2 to 3 hours.',
                'storage' => 'Store below 30°C in a dry place, protected from light and moisture. Keep out of the reach of children.',
                'featured_image' => 'images/products/x-corel-g.png',
                'seo_title' => 'X-Corel G Tablet (Coral Calcium 600 mg + Vitamin D3 + Magnesium)',
                'meta_description' => 'X-Corel G Tablet (Coral Calcium 600 mg + Vitamin D3 + Magnesium) for bone and teeth health, osteoporosis protection, and calcium supplementation.',
                'meta_keywords' => 'X-Corel G Tablet, Coral Calcium 600mg, Vitamin D3, Magnesium, bone health supplement, Green Darma',
                'image_alt' => 'X-Corel G Tablet Coral Calcium 600mg Vitamin D3 Magnesium Green Darma Pharmaceuticals',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is X-Corel G Tablet used for?', 'answer' => 'X-Corel G Tablet is used for the prevention and treatment of calcium and vitamin D deficiency, supporting bone and teeth health, osteoporosis, and fracture healing.'],
                    ['question' => 'How should X-Corel G Tablet be taken?', 'answer' => 'Adults: Take 1 tablet once or twice daily after food, swallowed whole with a glass of water.'],
                    ['question' => 'Is X-Corel G Tablet safe during pregnancy and lactation?', 'answer' => 'May be used during pregnancy and lactation when calcium supplementation is indicated and under physician advice.'],
                ],
            ],
        ];

        foreach ($products as $pData) {
            $faqs = $pData['faqs'] ?? [];
            unset($pData['faqs']);

            $product = Product::updateOrCreate(
                ['slug' => $pData['slug']],
                $pData
            );

            $product->faqs()->delete();
            foreach ($faqs as $index => $faq) {
                ProductFaq::create([
                    'product_id' => $product->id,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'sort_order' => $index + 1,
                ]);
            }
        }
    }
}
