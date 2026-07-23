<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFaq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DossierProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure Categories Exist
        $dermaCat = Category::firstOrCreate(['slug' => 'dermatology-skin-care'], [
            'name' => 'Dermatology & Skin Care',
            'description' => 'Clinical topical preparations for acne, fungal infections, hyperpigmentation, and eczematous dermatoses.',
            'status' => 'active',
        ]);

        $gastroCat = Category::firstOrCreate(['slug' => 'gastroenterology-gut-health'], [
            'name' => 'Gastroenterology & Gut Health',
            'description' => 'Probiotic formulations and digestive health supplements.',
            'status' => 'active',
        ]);

        $pediatricCat = Category::firstOrCreate(['slug' => 'pediatrics-child-healthcare'], [
            'name' => 'Pediatrics & Child Healthcare',
            'description' => 'Gentle clinical formulations for pediatric patient care.',
            'status' => 'active',
        ]);

        $orthoCat = Category::firstOrCreate(['slug' => 'orthopedics-bone-health'], [
            'name' => 'Orthopedics & Bone Health',
            'description' => 'Joint, bone, and musculoskeletal support preparations.',
            'status' => 'active',
        ]);

        $vitalityCat = Category::firstOrCreate(['slug' => 'general-vitality-tonics'], [
            'name' => 'General Vitality & Tonics',
            'description' => 'Nutraceutical antioxidants, multivitamins, and restorative tonics.',
            'status' => 'active',
        ]);

        $productsData = [
            // 1. DAMCLID GEL
            [
                'category_id' => $dermaCat->id,
                'name' => 'DAMCLID GEL',
                'brand_name' => 'Damclid',
                'generic_name' => 'Clindamycin Phosphate',
                'slug' => 'damclid-gel-clindamycin-1-percent-20g',
                'active_ingredients' => 'Clindamycin Phosphate USP equivalent to Clindamycin 1% w/w',
                'strength' => '1% w/w (10 mg/g)',
                'dosage_form' => 'Topical Gel',
                'pack_size' => '20 gm Aluminum / Lami Tube',
                'manufacturer' => 'Green Darma Pharmaceuticals / Approved Partner Manufacturing Units',
                'price' => null,
                'market_price_range' => 'Generic Reference Available via Rx Channel',
                'availability_status' => 'PRESCRIPTION ONLY (RX)',
                'therapeutic_class' => 'Topical Antibiotics / Anti-Acne Preparations',
                'short_description' => 'Damclid Gel is a topical antibiotic containing Clindamycin Phosphate 1% w/w indicated for the treatment of inflammatory acne vulgaris.',
                'full_description' => 'Damclid Gel is a high-efficacy topical lincosamide antibiotic formulation engineered specifically for acne-prone skin. It targets Cutibacterium acnes, suppresses free fatty acid production, and resolves papules, pustules, and comedones without leaving greasy residue.',
                'pharmacology' => 'Clindamycin phosphate is a lincosamide antibiotic. Although clindamycin phosphate is inactive in vitro, rapid in vivo hydrolysis converts this compound to the antibacterially active clindamycin. Clindamycin inhibits bacterial protein synthesis by binding to the 50S ribosomal subunit of susceptible organisms.',
                'mechanism_of_action' => 'Suppresses Cutibacterium acnes (formerly Propionibacterium acnes), reducing free fatty acid levels on the skin surface from approximately 14% to 2%, thereby decreasing comedones, papules, and pustules in acne vulgaris.',
                'indications' => 'Treatment of Acne Vulgaris characterized by inflammatory lesions, papules, pustules, and comedones.',
                'dosage' => 'Apply a thin film of Damclid Gel twice daily to the affected areas after gentle washing and thoroughly drying the skin.',
                'directions_for_use' => 'Cleanse skin with mild soap. Dry area thoroughly. Massage gel gently until absorbed. Wash hands after application. Avoid eyes and mucosal membranes.',
                'contraindications' => 'Patients with history of hypersensitivity to clindamycin, lincomycin, or history of regional enteritis, ulcerative colitis, or antibiotic-associated colitis.',
                'side_effects' => 'Local skin dryness, erythema, burning, peeling, oily skin, contact dermatitis, and rarely mild gastrointestinal disturbances.',
                'warnings' => 'For external topical use only. Systemic absorption can occur; discontinue if severe diarrhea occurs. Avoid contact with eyes, nose, or mouth.',
                'precautions' => 'Avoid applying to broken skin or severe open wounds. Exercise caution if using concurrent drying acne therapies.',
                'pregnancy_lactation' => 'FDA Pregnancy Category B. Use during pregnancy only if clearly needed. Exercise caution in nursing mothers due to potential excretion in breast milk.',
                'drug_interactions' => 'Antagonism demonstrated with topical erythromycin. Neuromuscular blocking agents may experience enhanced blockade.',
                'storage' => 'Store below 25°C. Do not freeze. Keep tube tightly closed and out of reach of children.',
                'overdose_information' => 'Topical overdose is unlikely. Accidental oral ingestion requires symptomatic treatment and gastric lavage if large quantities are ingested.',
                'featured_image' => 'assets/products/damclid-gel-20g.png',
                'seo_title' => 'Damclid Gel (Clindamycin 1%) - Topical Anti-Acne Treatment | Green Darma',
                'meta_description' => 'Buy or explore Damclid Gel (Clindamycin Phosphate 1% w/w). Learn about acne indications, dosage, mechanism of action, side effects, and application guidelines.',
                'meta_keywords' => 'Damclid Gel, Clindamycin gel, Green Darma acne gel, anti-acne topical gel, Clindamycin phosphate 1%',
                'image_alt' => 'Damclid Gel 20g Tube - Clindamycin Phosphate 1% Anti-Acne Gel Packaging',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => 'DAMCLID-AD GEL: Clindamycin 1% + Adapalene 0.1% Gel Base; DAMCLID-N GEL: Clindamycin 1% + Nicotinamide 4% Gel Base; GLOWZAP FACEWASH: Glutathione & Vitamin C Cleansing Foam',
                'references_list' => "1. Directorate General of Drug Administration (DGDA) Bangladesh Product Database.\n2. MedEx Bangladesh Clindamycin Phosphate Topical Gel Monograph.\n3. Green Darma Official Product Catalog & Dermatological Formulations Index.",
                'faqs' => [
                    ['question' => 'What is Damclid Gel used for?', 'answer' => 'Damclid Gel is a topical antibiotic used to treat inflammatory acne vulgaris by eliminating acne-causing bacteria and reducing red, painful pimples and breakouts.'],
                    ['question' => 'How should I apply Damclid Gel?', 'answer' => 'Wash the affected skin thoroughly with a mild cleanser, pat dry, and apply a thin layer of gel twice daily (morning and night) as directed by your dermatologist.'],
                    ['question' => 'When should I NOT use this medicine?', 'answer' => 'Do not use Damclid Gel if you are allergic to clindamycin or lincomycin, or if you have a history of inflammatory bowel disease or colitis.'],
                ]
            ],

            // 2. LULIGO CREAM
            [
                'category_id' => $dermaCat->id,
                'name' => 'LULIGO CREAM',
                'brand_name' => 'Luligo',
                'generic_name' => 'Luliconazole',
                'slug' => 'luligo-cream-luliconazole-1-percent-30g',
                'active_ingredients' => 'Luliconazole IP 1.0% w/w in a cream base',
                'strength' => '1% w/w',
                'dosage_form' => 'Topical Cream',
                'pack_size' => '30 gm Laminated Tube',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'price' => null,
                'market_price_range' => 'BDT 220.00 to BDT 320.00 (Generic BD Reference)',
                'availability_status' => 'PRESCRIPTION ONLY (RX)',
                'therapeutic_class' => 'Topical Antifungal Agents (Imidazole Derivatives)',
                'short_description' => 'Luligo Cream contains Luliconazole 1% w/w for rapid 1-week resolution of ringworm, jock itch, and fungal skin dermatophytosis.',
                'full_description' => 'Luligo Cream is an advanced 3rd generation imidazole topical antifungal preparation providing potent fungicidal eradication against dermatophytes. It achieves rapid symptomatic relief from intense itching, redness, and flaking in tinea infections.',
                'pharmacology' => 'Luliconazole is an imidazole antifungal agent. It exhibits potent fungicidal activity against dermatophytes such as Trichophyton rubrum, Trichophyton mentagrophytes, and Epidermophyton floccosum.',
                'mechanism_of_action' => 'Inhibits the enzyme lanosterol 14α-demethylase, blocking the synthesis of ergosterol, an essential component of fungal cell membranes. This leads to fungal cell lysis and eradication.',
                'indications' => "Topical treatment of Tinea Pedis (athlete's foot), Tinea Cruris (jock itch), and Tinea Corporis (ringworm).",
                'dosage' => 'Tinea Cruris & Tinea Corporis: Apply once daily for 1 week. Tinea Pedis: Apply once daily for 2 weeks.',
                'directions_for_use' => 'Apply a thin layer to cover the affected lesion and approximately 1 inch of surrounding normal skin. Wash hands after application.',
                'contraindications' => 'Known hypersensitivity to luliconazole or any excipients in the cream.',
                'side_effects' => 'Application site reaction, mild itching, burning sensation, irritation, or dry skin.',
                'warnings' => 'For ophthalmic, oral, or intravaginal use strictly prohibited. Discontinue if severe allergic contact dermatitis occurs.',
                'precautions' => 'Do not use near open wounds or mucous membranes.',
                'pregnancy_lactation' => 'Pregnancy Category C. Use only if potential benefit outweighs risk. Caution advised during lactation.',
                'drug_interactions' => 'Minimal systemic absorption occurs; interaction risks with systemic agents are extremely low.',
                'storage' => 'Store at temperature not exceeding 25°C. Keep out of reach of children. Do not freeze.',
                'overdose_information' => 'Topical overdose is not expected to cause life-threatening symptoms. Rinse with water if accidental eye contact occurs.',
                'featured_image' => 'assets/products/luligo-cream-30g.png',
                'seo_title' => 'Luligo Cream (Luliconazole 1%) - Fast-Acting Topical Antifungal | Green Darma',
                'meta_description' => "Luligo Cream contains Luliconazole 1% w/w for effective 1-week treatment of ringworm, jock itch, and athlete's foot. Explore dosage, uses, and precautions.",
                'meta_keywords' => 'Luligo Cream, Luliconazole cream, Green Darma antifungal, ringworm cream, tinea cruris treatment',
                'image_alt' => 'Luligo Cream 30g Tube - Luliconazole 1% Antifungal Packaging',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => 'LULIGO LOTION: Luliconazole 1% w/w Aqueous Base Lotion (30 ml); EBAHEAL CREAM: Eberconazole 1% Antifungal Cream; GDBIN CREAM: Terbinafine Hydrochloride 1.0% Cream',
                'references_list' => "1. MedEx Bangladesh Luliconazole Technical Summary.\n2. DGDA Drug Registry Index.\n3. Green Darma Derma Products Master Listing.",
                'faqs' => [
                    ['question' => 'What infections does Luligo Cream treat?', 'answer' => 'Luligo Cream is used to treat fungal skin infections including ringworm (tinea corporis), jock itch (tinea cruris), and athlete\'s foot (tinea pedis).'],
                    ['question' => 'How long should I use Luligo Cream?', 'answer' => 'For jock itch and ringworm, use once daily for 1 week. For athlete\'s foot, apply once daily for 2 weeks unless instructed otherwise by your doctor.'],
                ]
            ],

            // 3. RACNOZOLE-SB 65 / 130 CAPSULES
            [
                'category_id' => $dermaCat->id,
                'name' => 'RACNOZOLE-SB 65 / RACNOZOLE-SB 130',
                'brand_name' => 'Racnozole-SB',
                'generic_name' => 'Itraconazole Super Bioavailable (SB)',
                'slug' => 'racnozole-sb-itraconazole-65mg-130mg-capsules',
                'active_ingredients' => 'Itraconazole SB (Solid dispersion technology) 65 mg / 130 mg',
                'strength' => '65 mg and 130 mg',
                'dosage_form' => 'Hard Gelatin Capsule',
                'pack_size' => 'Alu-Alu Blister Pack | 10 x 10 Capsules',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'price' => null,
                'market_price_range' => 'BDT 35.00 to BDT 50.00 per capsule (Generic Reference)',
                'availability_status' => 'PRESCRIPTION ONLY (RX)',
                'therapeutic_class' => 'Systemic Antifungal Triazole Derivatives',
                'short_description' => 'Racnozole-SB delivers Super Bioavailable Itraconazole using solid dispersion technology for double the bioavailability of standard itraconazole.',
                'full_description' => 'Racnozole-SB Capsules represent a major pharmacological advancement in oral antifungal therapy. Utilizing Super Bioavailable (SB) solid dispersion technology, 65mg SB delivers equivalent blood levels to 100mg conventional itraconazole, completely eliminating dependency on stomach acid or food co-ingestion.',
                'pharmacology' => 'Racnozole-SB utilizes Super Bioavailable (SB) solid dispersion technology, providing double the bioavailability of conventional Itraconazole. Thus, 65 mg SB provides equivalent blood therapeutic levels to 100 mg conventional itraconazole, and 130 mg SB equals 200 mg conventional. It does not depend on stomach acidity for absorption.',
                'mechanism_of_action' => 'Inhibits fungal cytochrome P450-dependent 14α-demethylase, disrupting ergosterol synthesis in fungal cell walls.',
                'indications' => 'Recurrent vulvovaginal candidiasis, severe dermatophytosis (Tinea corporis, cruris, pedis), Onychomycosis, and systemic fungal infections.',
                'dosage' => 'Vulvovaginal Candidiasis: 130 mg SB twice daily for 1 day or 130 mg once daily for 3 days. Dermatophytosis: 65 mg to 130 mg SB once daily for 7 to 14 days. Onychomycosis: 130 mg SB twice daily for 1 week per month (Pulse Therapy).',
                'directions_for_use' => 'Swallow capsule whole with water. Can be taken with or without food (unlike conventional itraconazole which requires acidic beverage/food).',
                'contraindications' => 'Co-administration with CYP3A4 substrates (e.g. cisapride, pimozide, quinidine), patients with ventricular dysfunction or heart failure history.',
                'side_effects' => 'Nausea, abdominal pain, headache, elevated liver enzymes, dyspepsia, rash.',
                'warnings' => 'Monitor hepatic function during prolonged therapy. Discontinue if signs of hepatotoxicity develop.',
                'precautions' => 'Use caution in patients with hepatic impairment or heart disease history.',
                'pregnancy_lactation' => 'Contraindicated in pregnancy unless life-threatening. Do not breastfeed while taking Racnozole-SB.',
                'drug_interactions' => 'Interacts with macrolide antibiotics, statins, oral anticoagulants, and antiepileptic agents.',
                'storage' => 'Store in a cool, dry place below 30°C. Protect from moisture and direct light.',
                'overdose_information' => 'In case of accidental overdose, supportive measures and gastric lavage should be performed. Hemodialysis does not remove itraconazole.',
                'featured_image' => 'assets/products/racnozole-sb-130-capsules.png',
                'seo_title' => 'Racnozole-SB (Itraconazole Super Bioavailable 65/130mg) | Green Darma',
                'meta_description' => 'Racnozole-SB Capsules provide super bioavailable Itraconazole 65mg & 130mg for enhanced fungal eradication in nail infections and dermatophytosis.',
                'meta_keywords' => 'Racnozole SB, Itraconazole SB 130, Green Darma antifungal, super bioavailable itraconazole, onychomycosis treatment',
                'image_alt' => 'Racnozole-SB 130mg Capsules Packaging Box - Systemic Antifungal Therapy',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => 'RACNOZOLE-200: Conventional Itraconazole 200mg Capsules; GO-FLUCO 150: Fluconazole 150mg Tablets; AMROHEAL CREAM: Amorolfine 0.25% w/w Cream',
                'references_list' => "1. MedEx Bangladesh Systemic Antifungal Monographs.\n2. DGDA Registered Medicine Index.\n3. Green Darma Technical Product Data Sheet.",
                'faqs' => [
                    ['question' => 'Why is Racnozole-SB superior to standard Itraconazole?', 'answer' => 'Racnozole-SB uses Super Bioavailable technology, meaning you need a lower milligram dose to achieve higher and more consistent blood levels, regardless of stomach food or acidity.'],
                    ['question' => 'Can I take Racnozole-SB without food?', 'answer' => 'Yes, unlike older itraconazole capsules, Racnozole-SB absorption is independent of stomach acid or meals.'],
                ]
            ],

            // 4. BRIGHT-UP CREAM
            [
                'category_id' => $dermaCat->id,
                'name' => 'BRIGHT-UP CREAM',
                'brand_name' => 'Bright-Up',
                'generic_name' => 'Hydroquinone + Tretinoin + Mometasone Furoate',
                'slug' => 'bright-up-cream-melasma-hydroquinone-tretinoin-mometasone',
                'active_ingredients' => 'Hydroquinone USP 2.0% w/w, Tretinoin USP 0.025% w/w, Mometasone Furoate IP 0.1% w/w',
                'strength' => '2.0% + 0.025% + 0.1% w/w',
                'dosage_form' => 'Topical Cream Base',
                'pack_size' => '20 gm Tube',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'price' => null,
                'market_price_range' => 'BDT 180.00 to BDT 260.00 (Generic BD Reference)',
                'availability_status' => 'PRESCRIPTION ONLY (RX)',
                'therapeutic_class' => 'Topical Depigmenting / Anti-Melasma Preparations',
                'short_description' => 'Bright-Up Cream is a triple combination depigmenting therapy combining Hydroquinone 2%, Tretinoin 0.025%, and Mometasone 0.1% for facial melasma.',
                'full_description' => 'Bright-Up Cream is a gold-standard dermatological triple combination formulation designed for moderate to severe melasma and stubborn facial hyperpigmentation. Hydroquinone blocks melanin synthesis, Tretinoin accelerates cellular turnover, and Mometasone suppresses inflammation.',
                'pharmacology' => 'Triple combination therapy: Hydroquinone acts as a depigmenting agent by inhibiting tyrosinase; Tretinoin increases epidermal cell turnover and enhances hydroquinone penetration; Mometasone Furoate is a medium-potency corticosteroid that reduces inflammation and prevents localized irritation.',
                'mechanism_of_action' => 'Inhibits melanin synthesis at the enzymatic step, increases exfoliation of hyperpigmented keratanocytes, and suppresses inflammatory cytokines.',
                'indications' => 'Short-term treatment of moderate to severe melasma of the face, post-inflammatory hyperpigmentation, and resistant dark spots.',
                'dosage' => 'Apply a pea-sized amount once daily at night to hyperpigmented areas only, at least 30 minutes before bedtime. Do not use continuously for more than 8 weeks.',
                'directions_for_use' => 'Gently wash face, pat dry. Rub cream gently into hyperpigmented spots. Mandatory morning application of broad-spectrum sunscreen (SPF 30+).',
                'contraindications' => 'Pregnancy, viral cutaneous lesions (herpes simplex), hypersensitivity to hydroquinone or retinoids.',
                'side_effects' => 'Mild erythema, desquamation, skin burning, dryness, telangiectasia, or skin atrophy with prolonged overuse.',
                'warnings' => 'Strict sun avoidance is mandatory. Protect skin with SPF 30+ daily. Avoid contact with eyes, angles of nose, and lips.',
                'precautions' => 'Do not use near open cuts or eczematous skin.',
                'pregnancy_lactation' => 'Contraindicated in pregnancy due to Tretinoin teratogenic potential. Do not use during breastfeeding.',
                'drug_interactions' => 'Concomitant use with harsh medicated soaps, astringents, or benzoyl peroxide can cause severe skin irritation.',
                'storage' => 'Store in a refrigerator or cool dry place below 25°C. Keep tube tightly closed. Protect from heat and direct sunlight.',
                'overdose_information' => 'Excessive application causes severe redness, peeling, or discomfort. Discontinue use and apply bland emollients.',
                'featured_image' => 'assets/products/bright-up-cream-20g.png',
                'seo_title' => 'Bright-Up Cream (Hydroquinone + Tretinoin + Mometasone) | Green Darma',
                'meta_description' => 'Bright-Up Cream combines Hydroquinone 2%, Tretinoin 0.025%, and Mometasone 0.1% for effective treatment of facial melasma and hyperpigmentation.',
                'meta_keywords' => 'Bright-Up Cream, melasma cream, hydroquinone tretinoin mometasone, Green Darma skin lightening, hyperpigmentation cream',
                'image_alt' => 'Bright-Up Cream 20g Tube - Triple Combination Melasma & Depigmentation Cream',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => 'TECOTOP SPF 30+: Broad Spectrum Sunscreen Lotion (100 ml); GLOWZAP TABLETS: L-Glutathione & Vitamin C Oral Antioxidant; KOJIC ACID & GLUTATHIONE SERUM: Topical Cosmeceutical Serum',
                'references_list' => "1. MedEx Bangladesh Hydroquinone Combination Product Guidelines.\n2. DGDA Approved Dermatological Formulation Index.\n3. Green Darma Product Research Records.",
                'faqs' => [
                    ['question' => 'How quickly will I see results with Bright-Up Cream?', 'answer' => 'Visible lightening of melasma and hyperpigmentation typically begins within 2 to 4 weeks of consistent nightly application alongside strict sunscreen use.'],
                    ['question' => 'Why do I need to wear sunscreen during the day?', 'answer' => 'Hydroquinone and Tretinoin make your skin sensitive to sunlight. UV exposure will trigger melanin production, reversing the cream\'s depigmenting effects.'],
                ]
            ],

            // 5. FESUDEM CREAM
            [
                'category_id' => $dermaCat->id,
                'name' => 'FESUDEM CREAM',
                'brand_name' => 'Fesudem',
                'generic_name' => 'Fusidic Acid + Mometasone Furoate',
                'slug' => 'fesudem-cream-fusidic-acid-mometasone',
                'active_ingredients' => 'Fusidic Acid IP 2.0% w/w, Mometasone Furoate IP 0.1% w/w',
                'strength' => '2.0% + 0.1% w/w',
                'dosage_form' => 'Topical Cream Base',
                'pack_size' => '10 gm Tube',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'price' => null,
                'market_price_range' => 'BDT 120.00 to BDT 170.00 (Generic BD Reference)',
                'availability_status' => 'PRESCRIPTION ONLY (RX)',
                'therapeutic_class' => 'Topical Antibiotic with Corticosteroid Combination',
                'short_description' => 'Fesudem Cream combines potent Fusidic Acid 2% antibacterial with Mometasone 0.1% anti-inflammatory steroid for infected eczema.',
                'full_description' => 'Fesudem Cream provides rapid Dual-Action relief for inflammatory skin conditions complicated by secondary bacterial infection. Fusidic Acid eradicates Staphylococcal and Streptococcal pathogens while Mometasone rapidly cools swelling, redness, and itching.',
                'pharmacology' => 'Combines the potent antibacterial activity of Fusidic Acid against Staphylococcus aureus and Streptococcus spp. with the medium-potency anti-inflammatory, anti-pruritic corticosteroid Mometasone Furoate.',
                'mechanism_of_action' => 'Fusidic acid inhibits bacterial protein synthesis by interfering with elongation factor G (EF-G). Mometasone induces lipocortins, which inhibit phospholipase A2 and reduce inflammatory mediator release.',
                'indications' => 'Inflammatory dermatoses (eczema, atopic dermatitis, allergic contact dermatitis) where bacterial infection is present or suspected.',
                'dosage' => 'Apply a thin film to the affected skin area once or twice daily until clinical improvement is achieved. Maximum duration: 2 weeks.',
                'directions_for_use' => 'Wash hands before and after application. Rub gently into clean, dry affected skin. Do not apply under occlusive dressings unless advised by physician.',
                'contraindications' => 'Fungal or viral skin infections (herpes, varicella), rosacea, perioral dermatitis, hypersensitivity to components.',
                'side_effects' => 'Skin burning, irritation, itching, skin atrophy, hypertrichosis, hypopigmentation.',
                'warnings' => 'Avoid prolonged application on facial skin or thin skin folds. Extended use may lead to bacterial resistance or systemic steroid absorption.',
                'precautions' => 'Discontinue after 2 weeks to prevent steroid thinning of skin.',
                'pregnancy_lactation' => 'Use only if mandatory under clinical supervision. Avoid application on chest/breast area during breastfeeding.',
                'drug_interactions' => 'No major topical drug interactions reported when applied as recommended.',
                'storage' => 'Store below 25°C. Keep tube cap tightly sealed. Do not freeze.',
                'overdose_information' => 'Chronic overuse can suppress the hypothalamic-pituitary-adrenal (HPA) axis. Taper off under medical advice.',
                'featured_image' => 'assets/products/fesudem-cream-10g.png',
                'seo_title' => 'Fesudem Cream (Fusidic Acid 2% + Mometasone 0.1%) | Green Darma',
                'meta_description' => 'Fesudem Cream combines antibacterial Fusidic Acid with anti-inflammatory Mometasone Furoate for infected eczema and dermatitis.',
                'meta_keywords' => 'Fesudem Cream, Fusidic acid mometasone, Green Darma antibacterial steroid, infected eczema cream',
                'image_alt' => 'Fesudem Cream 10g Tube - Fusidic Acid and Mometasone Furoate Packaging',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => 'BACOFUSE CREAM: Fusidic Acid 2% w/w Standalone Antibacterial; FESU-MO CREAM: Mometasone Furoate 0.1% Steroid Cream; GDBATE-PLUS: Quadruple Combination Topical Cream',
                'references_list' => "1. MedEx Bangladesh Fusidic Acid & Mometasone Formulations.\n2. DGDA Registered Pharmaceutical Products.\n3. Green Darma Clinical Data File.",
                'faqs' => [
                    ['question' => 'When is Fesudem Cream prescribed?', 'answer' => 'Fesudem Cream is prescribed for swollen, itchy skin conditions like eczema or dermatitis that have developed a secondary bacterial infection.'],
                    ['question' => 'Can I use Fesudem Cream for more than two weeks?', 'answer' => 'No, continuous use beyond 1 to 2 weeks is not recommended as it increases the risk of steroid side effects and bacterial resistance.'],
                ]
            ],

            // 6. GLOWZAP TABLETS
            [
                'category_id' => $vitalityCat->id,
                'name' => 'GLOWZAP TABLETS',
                'brand_name' => 'Glowzap',
                'generic_name' => 'L-Glutathione + Vitamin C (Ascorbic Acid)',
                'slug' => 'glowzap-tablets-glutathione-500mg-vitamin-c',
                'active_ingredients' => 'L-Glutathione (Reduced) 500 mg (as 25% blend formulation), Vitamin C 80 mg',
                'strength' => '500 mg + 80 mg',
                'dosage_form' => 'Oral Film-Coated Tablet',
                'pack_size' => 'Alu-Alu Blister | 10 x 1 x 10 Tablets',
                'manufacturer' => 'Green Darma Pharmaceuticals / Nutraceutical Division',
                'price' => null,
                'market_price_range' => 'BDT 45.00 to BDT 65.00 per tablet (Nutraceutical BD Reference)',
                'availability_status' => 'OVER-THE-COUNTER (OTC) / SUPPLEMENT',
                'therapeutic_class' => 'Nutraceutical Antioxidant & Skin Radiance Supplements',
                'short_description' => 'Glowzap Tablets combine Reduced L-Glutathione 500mg and Vitamin C 80mg for master cellular antioxidant defense and skin radiance.',
                'full_description' => 'Glowzap Tablets deliver oral tripeptide L-Glutathione potentiated with Vitamin C to neutralize free radicals, reduce oxidative dermal stress, and support clear, luminous skin from within.',
                'pharmacology' => 'L-Glutathione is a master intracellular tripeptide antioxidant. It neutralizes reactive oxygen species (ROS) and free radicals. Vitamin C works synergistically with Glutathione by recycling oxidized glutathione back into its active reduced form while suppressing tyrosinase-mediated melanogenesis.',
                'mechanism_of_action' => 'Shifts melanogenesis pathway from dark eumelanin synthesis to lighter pheomelanin synthesis and scavenges oxidative stress factors in dermal layers.',
                'indications' => 'Generalized skin dullness, hyperpigmentation, photo-aging protection, oxidative stress reduction, and overall skin health support.',
                'dosage' => '1 tablet daily after meals or as directed by a healthcare professional/dermatologist.',
                'directions_for_use' => 'Take tablet with a full glass of water. Recommended continuous therapy for 2 to 3 months for peak antioxidant benefits.',
                'contraindications' => 'Known hypersensitivity to Glutathione or Ascorbic Acid. Patients with history of renal calculi (kidney stones) should consult physician.',
                'side_effects' => 'Generally well tolerated. Mild gastrointestinal discomfort, bloating, or loose stools may rarely occur.',
                'warnings' => 'Do not exceed recommended daily dose. Dietary supplements should not replace a balanced nutrition regimen.',
                'precautions' => 'Maintain adequate fluid intake while taking vitamin supplements.',
                'pregnancy_lactation' => 'Consult physician before taking during pregnancy or breastfeeding.',
                'drug_interactions' => 'High doses of Vitamin C may interact with anticoagulants (warfarin) or chemotherapy regimens.',
                'storage' => 'Store in a cool, dry place below 25°C. Protect from high humidity and light. Keep out of reach of children.',
                'overdose_information' => 'Water-soluble vitamins are excreted in urine. Excessive intake may cause mild diarrhea or stomach cramps.',
                'featured_image' => 'assets/products/glowzap-tablets.png',
                'seo_title' => 'Glowzap Tablets (L-Glutathione 500mg + Vitamin C 80mg) | Green Darma',
                'meta_description' => 'Discover Glowzap Tablets featuring 500mg Reduced Glutathione and 80mg Vitamin C for master antioxidant protection and skin radiance.',
                'meta_keywords' => 'Glowzap tablets, Glutathione tablets, Green Darma skin radiance, L-glutathione vitamin C, oral antioxidant supplement',
                'image_alt' => 'Glowzap L-Glutathione and Vitamin C Tablets Packaging Box',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => 'GLOWZAP FACEWASH: Glutathione & Vitamin C Cleansing Foam; GLOWZAP SOAP: Triclosan, Tea Tree Oil & Vitamin E Soap; KOJIC ACID & GLUTATHIONE FACE SERUM: Topical Brightening Serum',
                'references_list' => "1. Arogga & ePharma Bangladesh Supplement Listings.\n2. International Journal of Dermatology Glutathione Monograph.\n3. Green Darma Cosmeceutical Catalog.",
                'faqs' => [
                    ['question' => 'What are the benefits of Glowzap Tablets?', 'answer' => 'Glowzap combines Glutathione and Vitamin C to combat free radicals, reduce oxidative skin stress, promote even skin tone, and support natural skin brightness.'],
                    ['question' => 'How long should I take Glowzap?', 'answer' => 'For optimal cellular antioxidant effects and skin tone improvement, dermatologists recommend a consistent regimen of 60 to 90 days.'],
                ]
            ],

            // 7. VUTHKETO-Z SHAMPOO
            [
                'category_id' => $dermaCat->id,
                'name' => 'VUTHKETO-Z SHAMPOO',
                'brand_name' => 'Vuthketo-Z',
                'generic_name' => 'Ketoconazole + Zinc Pyrithione (ZPTO)',
                'slug' => 'vuthketo-z-shampoo-ketoconazole-zpto-100ml',
                'active_ingredients' => 'Ketoconazole IP 2.0% w/v, Zinc Pyrithione (ZPTO) 1.0% w/v in shampoo base',
                'strength' => '2.0% w/v + 1.0% w/v',
                'dosage_form' => 'Medicated Scalp Shampoo Liquid',
                'pack_size' => '100 ml PET Bottle',
                'manufacturer' => 'Green Darma Pharmaceuticals',
                'price' => null,
                'market_price_range' => 'BDT 240.00 to BDT 320.00 (Generic BD Reference)',
                'availability_status' => 'PRESCRIPTION / OTC MEDICATED',
                'therapeutic_class' => 'Antifungal / Medicated Anti-Dandruff Scalp Preparations',
                'short_description' => 'Vuthketo-Z Shampoo combines Ketoconazole 2% and Zinc Pyrithione (ZPTO) 1% for fast relief from severe dandruff and scalp seborrheic dermatitis.',
                'full_description' => 'Vuthketo-Z Shampoo is a dual-action medicated scalp treatment containing Ketoconazole and ZPTO. It targets Malassezia yeasts, normalizes scalp cell turnover, relieves intense itching, and prevents dandruff recurrence.',
                'pharmacology' => 'Combines broad-spectrum antifungal Ketoconazole with antimicrobial/cytostatic agent Zinc Pyrithione (ZPTO). Together, they effectively eradicate Malassezia globosa and Malassezia restricta yeasts, the root causes of scalp seborrheic dermatitis and severe dandruff.',
                'mechanism_of_action' => 'Ketoconazole inhibits ergosterol synthesis, breaking fungal cell membranes. ZPTO normalizes scalp epidermal turnover rate and reduces inflammatory flaking.',
                'indications' => 'Treatment and prevention of Seborrheic Dermatitis, Pityriasis Capitis (dandruff), and scalp Pityriasis Versicolor.',
                'dosage' => 'Treatment: Wash scalp twice weekly for 2 to 4 weeks. Maintenance: Use once every 1 to 2 weeks to prevent recurrence.',
                'directions_for_use' => 'Wet hair and scalp thoroughly. Apply generous quantity to form rich lather. Gently massage into scalp. Leave on scalp for 3 to 5 minutes before rinsing thoroughly with water.',
                'contraindications' => 'Hypersensitivity to Ketoconazole, ZPTO, or formulation excipients. Open scalp wounds or severe acute lesions.',
                'side_effects' => 'Mild scalp irritation, dryness, hair texture change, or slight oiliness/dryness of hair.',
                'warnings' => 'Avoid contact with eyes. If shampoo enters eyes, rinse immediately with cold water. For external scalp use only.',
                'precautions' => 'Do not leave on scalp longer than recommended duration.',
                'pregnancy_lactation' => 'Systemic absorption is negligible. Can be used during pregnancy and lactation under medical supervision.',
                'drug_interactions' => 'If using topical steroids on scalp, taper steroid treatment over 2 weeks while initiating Vuthketo-Z to avoid rebound flare.',
                'storage' => 'Store below 30°C. Protect from direct sunlight. Keep bottle tightly closed.',
                'overdose_information' => 'Accidental ingestion requires supportive care. Do not induce vomiting.',
                'featured_image' => 'assets/products/vuthketo-z-shampoo-100ml.png',
                'seo_title' => 'Vuthketo-Z Shampoo (Ketoconazole 2% + ZPTO 1%) | Green Darma',
                'meta_description' => 'Vuthketo-Z Shampoo combines 2% Ketoconazole & 1% Zinc Pyrithione to treat scalp seborrheic dermatitis and persistent dandruff.',
                'meta_keywords' => 'Vuthketo Z shampoo, Ketoconazole ZPTO shampoo, Green Darma anti dandruff, seborrheic dermatitis shampoo',
                'image_alt' => 'Vuthketo-Z 100ml Shampoo Bottle - Medicated Anti-Dandruff Packaging',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => 'VUTHKETO SOAP: Ketoconazole 2% w/w Medicated Soap; FOLLIGET INFUSED HAIR OIL: 24+ Herbal Infused Scalp Nourishing Oil; FOLLIGET TABLETS: Amino Acid, Biotin & Grape Seed Hair Supplement',
                'references_list' => "1. MedEx Bangladesh Medicated Shampoo Index.\n2. DGDA Registered Formulations.\n3. Green Darma Trichology Product Database.",
                'faqs' => [
                    ['question' => 'Why must I leave Vuthketo-Z Shampoo on my scalp for 5 minutes?', 'answer' => 'Leaving the shampoo on your scalp gives Ketoconazole and ZPTO sufficient contact time to penetrate skin layers and eradicate dandruff-causing Malassezia yeasts.'],
                    ['question' => 'Can I use Vuthketo-Z every day?', 'answer' => 'No, twice weekly for 2–4 weeks is sufficient to clear active dandruff. Using it daily may cause excessive scalp dryness.'],
                ]
            ],

            // 8. 10% VITAMIN C SKIN SERUM
            [
                'category_id' => $dermaCat->id,
                'name' => '10% VITAMIN C SKIN SERUM',
                'brand_name' => 'Green Darma Advanced Cosmeceutical Range',
                'generic_name' => 'Vitamin C (L-Ascorbic Acid / Ferulic Acid Complex) Serum',
                'slug' => '10-percent-vitamin-c-skin-serum-30ml',
                'active_ingredients' => '10% Vitamin C (L-Ascorbic Acid), Hyaluronic Acid 1%, Vitamin E, Botanical Extracts',
                'strength' => '10% Concentration',
                'dosage_form' => 'Topical Liquid Serum with Dropper',
                'pack_size' => '30 ml Amber Glass Dropper Bottle',
                'manufacturer' => 'Green Darma Cosmeceutical Division',
                'price' => null,
                'market_price_range' => 'BDT 350.00 to BDT 550.00 (Cosmeceutical Reference)',
                'availability_status' => 'DERMATOLOGICAL COSMECEUTICAL (OTC)',
                'therapeutic_class' => 'Topical Cosmeceutical Antioxidant & Collagen Stimulant',
                'short_description' => 'Advanced 10% L-Ascorbic Acid Vitamin C Serum with Hyaluronic Acid 1% for anti-aging protection, photo-damage defense, and skin brightening.',
                'full_description' => 'Green Darma 10% Vitamin C Skin Serum is an advanced antioxidant cosmeceutical elixir formulated with stabilized L-Ascorbic Acid, Ferulic Acid, and Hyaluronic Acid. It neutralizes UVA/UVB free radicals, stimulates neocollagenesis, and restores radiant youthful skin tone.',
                'pharmacology' => 'L-Ascorbic Acid is a critical cofactor for lysyl and prolyl hydroxylase enzymes responsible for stabilizing collagen triple-helix structures. It acts as an electron donor to neutralize free radicals generated by UVA/UVB radiation and environmental pollution.',
                'mechanism_of_action' => 'Protects dermal extracellular matrix from photo-damage, inhibits tyrosinase-mediated melanogenesis, and boosts neocollagenesis.',
                'indications' => 'Photo-aged skin, fine lines, uneven skin tone, hyperpigmentation, loss of firmness, and environmental oxidation defense.',
                'dosage' => 'Apply 4 to 5 drops once daily in the morning to cleansed, dry face and neck. Follow with moisturizer and broad-spectrum sunscreen.',
                'directions_for_use' => 'Dispense onto fingertips using the glass dropper. Massage gently until fully absorbed. Store away from heat and light to prevent oxidation.',
                'contraindications' => 'Known hypersensitivity to Ascorbic Acid or serum base ingredients. Broken or acutely inflamed eczema skin.',
                'side_effects' => 'Transient mild tingling or warming sensation upon application. Rare redness in hypersensitive skin.',
                'warnings' => 'Avoid direct eye contact. If serum turns dark brown/amber, oxidation has occurred and potency is reduced. Always pair with morning SPF.',
                'precautions' => 'Keep bottle tightly sealed to prevent premature oxidation.',
                'pregnancy_lactation' => 'Safe for use during pregnancy and lactation. Topically applied Vitamin C has no systemic toxicity.',
                'drug_interactions' => 'Do not mix directly with high-concentration Retinoids or Benzoyl Peroxide in the same routine (apply Vitamin C AM, Retinoids PM).',
                'storage' => 'Store in a cool, dark place below 25°C. Keep bottle tightly capped. Refrigerator storage prolongs stability.',
                'overdose_information' => 'Topical excess simply washes off. No systemic toxic risk.',
                'featured_image' => 'assets/products/vitamin-c-10-serum-30ml.png',
                'seo_title' => '10% Vitamin C Skin Serum (Antioxidant & Brightening) | Green Darma',
                'meta_description' => 'Green Darma 10% Vitamin C Serum with Hyaluronic Acid brightens skin, reduces dark spots, and boosts collagen production.',
                'meta_keywords' => '10% Vitamin C serum, Green Darma skin serum, face brightening serum, L-ascorbic acid serum, hyaluronic acid serum',
                'image_alt' => '10% Vitamin C Skin Serum 30ml Dropper Bottle Packaging',
                'status' => 'published',
                'is_featured' => true,
                'related_products_list' => '20% VITAMIN C SKIN SERUM: Higher Potency Ascorbic Acid Serum; ALPHA ARBUTIN FACE SERUM: 2% Alpha Arbutin Pigment Correction Serum; NIACINAMIDE 10% SKIN SERUM: Pore Refining & Barrier Serum',
                'references_list' => "1. Green Darma Advanced Cosmeceutical Monograph Index.\n2. Journal of Clinical and Aesthetic Dermatology (Vitamin C Topicals).\n3. Arogga Cosmetic & Derma Section.",
                'faqs' => [
                    ['question' => 'What does 10% Vitamin C Skin Serum do?', 'answer' => 'It brightens dull skin, fades dark spots, protects against environmental pollution, and boosts collagen for firmer, younger-looking skin.'],
                    ['question' => 'When should I apply this serum?', 'answer' => 'Apply every morning on clean, dry skin before applying your regular moisturizer and sunscreen.'],
                ]
            ],
        ];

        foreach ($productsData as $pData) {
            $faqs = $pData['faqs'] ?? [];
            unset($pData['faqs']);

            $product = Product::updateOrCreate(
                ['slug' => $pData['slug']],
                $pData
            );

            // Re-sync FAQs
            $product->faqs()->delete();
            foreach ($faqs as $idx => $f) {
                ProductFaq::create([
                    'product_id' => $product->id,
                    'question' => $f['question'],
                    'answer' => $f['answer'],
                    'sort_order' => $idx + 1,
                ]);
            }
        }
    }
}
