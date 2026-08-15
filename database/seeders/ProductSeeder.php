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
                'short_description' => 'SCABICOD SOAP contains Permethrin 1% w/w, a potent synthetic pyrethroid formulated in a gentle medicated cleansing soap bar for the effective treatment, symptom relief, and prevention of scabies and mite infestations.',
                'full_description' => 'SCABICOD SOAP (Permethrin 1% w/w) is a specialized medicated dermatological soap bar engineered for the treatment and prevention of scabies (caused by Sarcoptes scabiei mites) and associated skin parasites. Permethrin acts directly on the nerve cell membranes of mites, disrupting sodium channel currents to cause rapid paralysis and elimination of adult mites and their eggs. SCABICOD SOAP provides deep cleansing, relieves severe nighttime itching, and prevents reinfestation across family members when used as part of a scabies hygiene regimen.',
                'pharmacology' => 'Permethrin is a synthetic pyrethroid active against a broad range of skin parasites including Sarcoptes scabiei (scabies mites) and Pediculus humanus. It acts on the nerve cell membrane of parasites by disrupting sodium channel currents, causing delayed repolarization, paralysis, and death of mites and their eggs. In soap formulation, Permethrin 1% w/w ensures optimal topical coverage and mechanical mite reduction.',
                'indications' => "• Treatment of scabies (Sarcoptes scabiei mite infestation)\n• Eradication of scabies mites and their eggs\n• Rapid relief from nocturnal itching, rash, and skin irritation caused by scabies\n• Prevention of reinfestation and household spread during scabies therapy\n• Adjunctive skin hygiene bar during topical scabicide treatment",
                'dosage' => "• Wet the body thoroughly with warm water.\n• Gently rub SCABICOD SOAP all over the body to create a rich, creamy lather, paying special attention to skin folds, between fingers and toes, wrists, axillae, and groin.\n• Allow the lather to remain on the skin for 3 to 5 minutes for active ingredient absorption.\n• Rinse thoroughly with clean water and pat dry with a clean towel.\n• Use daily or as prescribed by a registered physician.",
                'directions_for_use' => 'Wet the affected skin with clean water. Apply SCABICOD SOAP to generate a rich lather over the body. Leave lather intact for 3 to 5 minutes before rinsing off completely with water. Use clean clothing and washed bedding following treatment.',
                'side_effects' => 'SCABICOD SOAP is well tolerated by most skin types. Temporary mild stinging, localized redness, or slight skin dryness may occur in sensitive individuals. Discontinue if hypersensitivity occurs.',
                'contraindications' => "• Known hypersensitivity or allergy to Permethrin, synthetic pyrethroids, or soap excipients.\n• For external dermatological use only.\n• Avoid direct contact with eyes, mouth, and open deep wounds.",
                'precautions' => "• For external use only. Do not swallow or apply inside body cavities.\n• Avoid contact with eyes; rinse immediately with water if contact occurs.\n• Discontinue use and consult a dermatologist if severe rash or swelling occurs.\n• Keep out of reach of infants and children.",
                'pregnancy_lactation' => 'Use during pregnancy and lactation only if clearly needed and advised by a registered physician.',
                'drug_interactions' => 'Avoid simultaneous use with aggressive chemical exfoliants or unapproved topical medications on the same skin area.',
                'storage' => "• Store below 30°C in a cool, dry place.\n• Keep protected from direct sunlight and excessive humidity.\n• Allow soap bar to drain in a dry soap dish after each use.",
                'featured_image' => 'images/products/scabicod-soap.png',
                'seo_title' => 'SCABICOD SOAP (Permethrin 1% w/w) - Anti-Scabies Medicated Soap Bar | Green Darma',
                'meta_description' => 'Buy SCABICOD SOAP (Permethrin 1% w/w) for treatment and prevention of scabies, mite elimination, and fast relief from skin itching. DGDA certified medicated soap.',
                'meta_keywords' => 'SCABICOD SOAP, Scabicod Soap, Permethrin 1% soap, anti scabies soap, scabies treatment soap bar, mite soap, skabicod, scabicode, scabies sabun, scabicide soap, Green Darma Scabicod, scabies skin soap, Permethrin soap price in Bangladesh',
                'search_aliases' => 'scabicod soap, skabicod soap, scabicode soap, skabicod, scabicode, scabicod, scabies soap, permethrin 1% soap, permethrin soap bar, anti mite soap, mite soap, scabies sabun, scabies treatment soap, itching soap bar',
                'image_alt' => 'SCABICOD SOAP Permethrin 1 percent Anti-Scabies Medicated Soap Bar Green Darma Pharmaceuticals',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is SCABICOD SOAP used for?', 'answer' => 'SCABICOD SOAP (Permethrin 1% w/w) is prescribed for the treatment and prevention of scabies (mite infestation), helping eliminate scabies mites and their eggs while reducing severe skin itching.'],
                    ['question' => 'How long should the lather of SCABICOD SOAP stay on the skin?', 'answer' => 'Allow the rich lather of SCABICOD SOAP to remain on wet skin for 3 to 5 minutes before rinsing off thoroughly with clean water.'],
                    ['question' => 'Can SCABICOD SOAP be used by all family members?', 'answer' => 'Yes, scabies treatment is recommended for all cohabiting household members simultaneously to prevent reinfestation, under physician guidance.'],
                    ['question' => 'Does SCABICOD SOAP cause side effects?', 'answer' => 'SCABICOD SOAP is dermatologically well-tolerated. Rare mild irritation or temporary dryness may occur in hyper-sensitive skin.'],
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
                'short_description' => 'Tinea Soap (Luliconazole 1% w/w) is a powerful broad-spectrum azole antifungal medicated soap bar indicated for the topical treatment and prevention of ringworm (tinea corporis), jock itch (tinea cruris), and athlete\'s foot (tinea pedis).',
                'full_description' => 'Tinea Soap (Luliconazole 1% w/w) is an advanced topical antifungal soap bar formulated for the treatment and control of superficial fungal skin infections. Luliconazole is a potent imidazole derivative that inhibits the lanosterol 14-α-demethylase enzyme, disrupting ergosterol biosynthesis in fungal cell membranes. Tinea Soap provides fungicidal action against dermatophytes including Trichophyton rubrum, Trichophyton mentagrophytes, and Epidermophyton floccosum, rapidly relieving ringworm lesions, jock itch redness, and athlete\'s foot peeling.',
                'pharmacology' => 'Luliconazole is a broad-spectrum azole antifungal agent possessing high fungicidal potency. It inhibits ergosterol synthesis—an essential structural lipid of fungal cell membranes—by blocking lanosterol 14-α-demethylase. This results in fungal cell membrane disruption, electrolyte leakage, and cell death. In soap form, Luliconazole 1% penetrates infected stratum corneum layers while washing away fungal spores.',
                'indications' => "• Topical treatment of Tinea Corporis (ringworm of the body)\n• Topical treatment of Tinea Cruris (jock itch in the groin & thighs)\n• Topical treatment of Interdigital Tinea Pedis (athlete's foot between toes)\n• Fungal skin infections caused by Trichophyton rubrum & Epidermophyton floccosum\n• Relief of fungal skin scaling, redness, cracking, and intense burning itching",
                'dosage' => "• Wet affected skin thoroughly with water.\n• Lather Tinea Soap gently over infected skin areas and 1 to 2 inches of surrounding skin.\n• Leave lather on the skin for 2 to 3 minutes for optimal antifungal absorption.\n• Rinse thoroughly with clean water and dry skin completely.\n• Use once or twice daily for 2 to 4 weeks or as directed by a physician.",
                'directions_for_use' => 'Clean and dry the affected area prior to use. Apply Tinea Soap evenly over infected skin to form a smooth lather. Rub gently, leave for 2 to 3 minutes, then wash off with clean water. Keep affected skin areas dry and clean.',
                'side_effects' => 'Generally safe and well tolerated. Rare application site reactions such as mild itching, localized redness, or contact irritation may occur in less than 1% of patients.',
                'contraindications' => 'Contraindicated in individuals with known hypersensitivity or allergy to Luliconazole, azole antifungal agents, or formulation components.',
                'precautions' => "• For external dermatological use only.\n• Avoid contact with eyes, nostrils, mouth, and broken skin.\n• Complete the recommended treatment course even if symptoms resolve early to avoid fungal recurrence.\n• Keep out of reach of children.",
                'pregnancy_lactation' => 'Use during pregnancy and breastfeeding only if prescribed by a registered doctor after benefit-risk assessment.',
                'drug_interactions' => 'Avoid simultaneous application of other harsh topical antifungal creams or alcohol-based lotions on the same area without medical advice.',
                'storage' => 'Store below 30°C in a dry place protected from direct heat and light. Place in a free-draining soap dish.',
                'featured_image' => 'images/products/tinea-soap.png',
                'seo_title' => 'Tinea Soap (Luliconazole 1% w/w) - Topical Antifungal Soap Bar | Green Darma',
                'meta_description' => 'Tinea Soap (Luliconazole 1% w/w) for fast treatment of ringworm (tinea corporis), jock itch (tinea cruris), and athlete\'s foot (tinea pedis). Broad-spectrum azole antifungal medicated soap.',
                'meta_keywords' => 'Tinea Soap, Tinea Soap Luliconazole, Luliconazole 1% soap, topical antifungal soap bar, tinea corporis soap, tinea cruris soap, tinea pedis soap, ringworm soap, athlete\'s foot soap, jock itch soap, tenia soap, tinia soap, dadu soap, Green Darma Luliconazole',
                'search_aliases' => 'tinea soap, tenia soap, tinia soap, luliconazole soap, luliconazole 1% soap bar, ringworm soap, athlete\'s foot soap, jock itch soap, antifungal soap, dadu soap, khujli soap, tinea cruris soap, tinea corporis soap',
                'image_alt' => 'Tinea Soap Luliconazole 1 percent Topical Antifungal Medicated Soap Bar Green Darma Pharmaceuticals',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What skin conditions does Tinea Soap treat?', 'answer' => 'Tinea Soap (Luliconazole 1%) is used for ringworm (tinea corporis), jock itch (tinea cruris), and athlete\'s foot (tinea pedis) caused by dermatophyte fungi.'],
                    ['question' => 'How quickly does Tinea Soap relieve fungal itching?', 'answer' => 'Tinea Soap provides rapid symptomatic relief from fungal itching, burning, and skin redness within the first few days of regular daily use.'],
                    ['question' => 'How long should I use Tinea Soap?', 'answer' => 'Continue using Tinea Soap once or twice daily for the full duration (typically 2 to 4 weeks) as advised by your doctor to prevent fungal recurrence.'],
                    ['question' => 'Can Tinea Soap be used for daily prevention of fungal infections?', 'answer' => 'Yes, individuals prone to recurrent ringworm, jock itch, or athlete\'s foot can use Tinea Soap regularly during high-humidity seasons under medical guidance.'],
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
                'active_ingredients' => 'Permethrin USP 5% w/v + Crotamiton BP 10% w/v',
                'market_price_range' => 'BDT 160.00 to BDT 255.00',
                'short_description' => 'SCABVAR Lotion combines Permethrin 5% w/v and Crotamiton 10% w/v in a dual-action scabicide and antipruritic lotion formula for rapid eradication of scabies mites and immediate relief from intense itching.',
                'full_description' => 'SCABVAR Lotion (Permethrin 5% + Crotamiton 10%) is a premier combination scabicide and anti-itch dermatological lotion. Permethrin 5% acts as a potent ovicidal scabicide that paralyzes and kills Sarcoptes scabiei mites and their eggs. Crotamiton 10% delivers dual benefits: strong antipruritic action that stops severe itching instantly and additional scabicidal efficacy. SCABVAR Lotion is also indicated for symptomatic itch relief in dry eczema, allergic dermatitis, hives, nettle rash, chickenpox lesions, and insect stings.',
                'pharmacology' => 'Permethrin 5% is a synthetic pyrethroid that selectively impairs voltage-gated sodium channels in parasite nerve cell membranes, causing delayed repolarization, paralysis, and death of scabies mites and eggs. Crotamiton 10% is a synthetic antipruritic agent with mild bacteriostatic and scabicidal activity that acts on peripheral nerve receptors to suppress the itch signal. Together, they provide synergistic mite clearance and immediate itch suppression.',
                'indications' => "• Treatment of scabies (Sarcoptes scabiei infestation) in adults, children, and infants\n• Rapid relief of intense itching (pruritus) associated with scabies\n• Relief of itching in allergic rashes, dermatitis, dry eczema, and hives\n• Symptomatic relief from chickenpox itch, nettle rash, insect stings, and heat rash\n• Pediatric scabies management under clinical supervision",
                'dosage' => "• Ensure skin is cool, clean, and completely dry before application.\n• Adults & Children over 2 years: Apply SCABVAR Lotion thoroughly over the entire body from neck to toes, ensuring full coverage of skin folds, finger/toe webs, wrists, armpits, and external genitalia.\n• Children under 2 years: Apply to face, neck, scalp, and ears under medical direction, avoiding eyes and mouth.\n• Leave lotion on skin for at least 8 to 14 hours (preferably overnight) before washing off.\n• Repeat treatment after 7 days if recommended by physician.",
                'directions_for_use' => 'Apply lotion evenly over clean, dry skin from neck downwards. Rub gently until absorbed. Leave on for 8–12 hours uninterrupted before taking a warm bath. Reapply to hands if washed during treatment. Change all bedsheets and clothing after washing off lotion.',
                'side_effects' => 'SCABVAR Lotion is well tolerated. Mild transient burning, stinging, localized redness, or temporary rash may occur shortly after application. Rare contact sensitivity to Crotamiton.',
                'contraindications' => 'Contraindicated in individuals with known hypersensitivity to Permethrin, Crotamiton, pyrethroids, or lotion base ingredients.',
                'precautions' => "• For external use only. Do not swallow or apply near mucosal openings.\n• Avoid contact with eyes; rinse with water immediately if accidental contact occurs.\n• Do not apply on raw, weeping, or severely broken skin surfaces.\n• Keep out of reach of children.",
                'pregnancy_lactation' => 'Use during pregnancy and breastfeeding only when prescribed by a registered physician.',
                'drug_interactions' => 'Avoid simultaneous application of other topical corticosteroids or counter-irritants on the same skin area without doctor approval.',
                'storage' => 'Store below 30°C in a dry place. Keep container tightly closed and protected from direct sunlight.',
                'featured_image' => 'images/products/scabvar-lotion.png',
                'seo_title' => 'SCABVAR Lotion (Permethrin 5% + Crotamiton 10%) - Scabicide & Anti-Itch Lotion',
                'meta_description' => 'SCABVAR Lotion (Permethrin 5% + Crotamiton 10%) for complete scabies treatment & fast itch relief. Dual-action topical scabicide lotion. DGDA approved.',
                'meta_keywords' => 'SCABVAR Lotion, SCABVAR, Permethrin 5% Crotamiton 10% lotion, scabies lotion, antipruritic lotion, scabicide lotion, scabvar, scab var, scabvac, anti itch lotion, permethrin lotion Bangladesh, Green Darma SCABVAR',
                'search_aliases' => 'scabvar lotion, scabvar, scab var, scabvac, permethrin 5% lotion, crotamiton 10% lotion, permethrin crotamiton lotion, scabies lotion, scabicide lotion, anti itch lotion, scabies treatment lotion',
                'image_alt' => 'SCABVAR Lotion Permethrin 5 percent Crotamiton 10 percent Scabicide and Antipruritic Lotion Green Darma',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is SCABVAR Lotion used for?', 'answer' => 'SCABVAR Lotion (Permethrin 5% + Crotamiton 10%) is formulated for the eradication of scabies mites and eggs, as well as fast relief from severe itching due to eczema, rashes, and insect stings.'],
                    ['question' => 'How long should SCABVAR Lotion stay on the skin?', 'answer' => 'Leave SCABVAR Lotion on the body uninterrupted for at least 8 to 12 hours (ideally overnight) before washing off with a warm bath.'],
                    ['question' => 'Why does SCABVAR Lotion combine Permethrin and Crotamiton?', 'answer' => 'Permethrin 5% acts as a potent scabicide that kills mites, while Crotamiton 10% provides immediate anti-itch relief so patients stop scratching and prevent secondary skin infections.'],
                    ['question' => 'Is SCABVAR Lotion safe for young children?', 'answer' => 'SCABVAR Lotion can be used in pediatric patients under physician advice, following age-appropriate application guidelines.'],
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
                'short_description' => 'Greenstar Shampoo is indicated for the treatment and prevention of seborrhoeic dermatitis, severe dandruff (Pityriasis capitis), and pityriasis versicolor, conditioning scalp with natural Aloe Vera.',
                'full_description' => 'Greenstar Shampoo (Ketoconazole 2% + Zinc Pyrithione 1% + Aloe Vera 10%) is an advanced therapeutic shampoo for scalp fungal conditions. Ketoconazole 2% inhibits ergosterol synthesis in Malassezia yeasts, Zinc Pyrithione 1% reduces epidermal turnover and controls scalp scaling, while Aloe Vera 10% restores scalp hydration and prevents post-wash hair dryness.',
                'pharmacology' => 'Ketoconazole inhibits fungal cytochrome P-450 dependent 14-α-sterol demethylase, stopping ergosterol synthesis and causing fungal cell death. Zinc Pyrithione exerts cytostatic activity against Malassezia species. Aloe Vera soothes scalp inflammation.',
                'indications' => 'For treatment and prevention of seborrhoeic dermatitis, stubborn dandruff (Pityriasis capitis), pityriasis versicolor, and fungal scalp itching and flaking.',
                'dosage' => 'Seborrhoeic dermatitis & Dandruff: Use twice weekly for 2 to 4 weeks. Prevention: Use once every 1–2 weeks.',
                'directions_for_use' => 'Wet hair and scalp thoroughly. Apply shampoo, massage into rich lather, leave on scalp for 5 minutes, then rinse completely with clean water.',
                'side_effects' => 'Mild temporary scalp dryness or hair texture alteration in sensitive users.',
                'contraindications' => 'Hypersensitivity to Ketoconazole, ZPTO, or Aloe Vera.',
                'precautions' => 'Avoid contact with eyes. Gradually taper off topical steroid treatments when starting Ketoconazole shampoo.',
                'pregnancy_lactation' => 'Use during pregnancy and lactation only if prescribed by a registered physician.',
                'storage' => 'Store below 30°C in a cool, dry place protected from direct sunlight.',
                'featured_image' => 'images/products/greenstar-shampoo.png',
                'seo_title' => 'Greenstar Shampoo (Ketoconazole 2% + ZPTO 1% + Aloe Vera 10%) | Green Darma',
                'meta_description' => 'Greenstar Shampoo (Ketoconazole 2% + ZPTO 1% + Aloe Vera 10%) for treatment and prevention of severe dandruff, seborrhoeic dermatitis, and scalp itching.',
                'meta_keywords' => 'Greenstar Shampoo, Ketoconazole ZPTO shampoo, anti-dandruff shampoo, seborrhoeic dermatitis, Green Darma shampoo, greenstar, ketoconazole shampoo Bangladesh',
                'search_aliases' => 'greenstar shampoo, greenstar, ketoconazole shampoo, zpto shampoo, anti dandruff shampoo, seborrheic dermatitis shampoo, scalp fungal shampoo',
                'image_alt' => 'Greenstar Shampoo Ketoconazole 2 percent Zinc Pyrithione 1 percent Aloe Vera 10 percent Green Darma',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is Greenstar Shampoo used for?', 'answer' => 'Greenstar Shampoo is used for the treatment and prevention of seborrhoeic dermatitis, severe dandruff, and pityriasis versicolor.'],
                    ['question' => 'How long should Greenstar Shampoo remain on the scalp?', 'answer' => 'Leave the shampoo lather on the scalp for 5 minutes before rinsing thoroughly with clean water.'],
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
                'short_description' => 'X-Corel G Tablet provides highly bioavailable organic Coral Calcium 600 mg with Vitamin D3 and Magnesium for osteoporosis prevention, bone density support, and calcium replenishment.',
                'full_description' => 'X-Corel G Tablet combines organic Coral Calcium with Cholecalciferol (Vitamin D3) and Magnesium Oxide to deliver optimal skeletal nutrition. Coral Calcium has a porous structure that maximizes intestinal calcium absorption compared to inorganic calcium carbonate. Vitamin D3 enhances active calcium transport, while Magnesium supports bone matrix formation.',
                'pharmacology' => 'Coral Calcium provides elemental calcium for bone mineralization. Vitamin D3 regulates calcium and phosphate homeostasis. Magnesium acts as a essential cofactor in bone alkaline phosphatase activity.',
                'indications' => 'Prevention and treatment of calcium and Vitamin D deficiency, osteoporosis, osteopenia, pregnancy/lactation calcium support, postmenopausal bone protection, and fracture healing.',
                'dosage' => 'Adults: 1 tablet once or twice daily after meals, swallowed whole with water.',
                'directions_for_use' => 'Swallow tablet whole with a glass of water after food. Do not chew or crush.',
                'side_effects' => 'Generally well tolerated; mild flatulence or mild constipation in rare cases.',
                'contraindications' => 'Hypercalcemia, severe renal impairment, hypervitaminosis D, kidney stones.',
                'precautions' => 'Monitor serum calcium in chronic therapy and renal insufficiency.',
                'pregnancy_lactation' => 'Safe during pregnancy and lactation under medical supervision.',
                'storage' => 'Store below 30°C in a dry place protected from light.',
                'featured_image' => 'images/products/x-corel-g.png',
                'seo_title' => 'X-Corel G Tablet (Coral Calcium 600 mg + Vitamin D3 + Magnesium) | Green Darma',
                'meta_description' => 'X-Corel G Tablet (Coral Calcium 600 mg + Vitamin D3 + Magnesium) for bone health, osteoporosis protection, calcium deficiency, and fracture healing.',
                'meta_keywords' => 'X-Corel G Tablet, Coral Calcium 600mg, Vitamin D3, Magnesium, bone health supplement, Green Darma, xcorel, x-corel g, calcium tablet Bangladesh',
                'search_aliases' => 'x-corel g tablet, xcorel g, xcorel, x-corel, coral calcium tablet, calcium vitamin d3 magnesium tablet, bone health tablet',
                'image_alt' => 'X-Corel G Tablet Coral Calcium 600mg Vitamin D3 Magnesium Green Darma Pharmaceuticals',
                'status' => 'published',
                'is_featured' => true,
                'faqs' => [
                    ['question' => 'What is X-Corel G Tablet used for?', 'answer' => 'X-Corel G Tablet is used for the prevention and treatment of calcium deficiency, osteoporosis, bone loss, and fracture healing.'],
                    ['question' => 'How should X-Corel G Tablet be taken?', 'answer' => 'Take 1 tablet once or twice daily after meals with a glass of water.'],
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
