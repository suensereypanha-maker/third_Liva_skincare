<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class FrontendController
{
    /**
     * Get mock product catalog (Luxury Gold & Cream Botanical theme, non-pink).
     */
    protected function getProducts(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'liva-night-cream',
                'name' => 'Liva Golden Night Cream',
                'name_km' => 'លីវ៉ា គ្រីមយប់សារធាតុផ្សំមាស (Liva Night Cream)',
                'parent_category' => 'skincare',
                'category' => 'cream',
                'category_name' => 'Cream',
                'category_name_km' => 'គ្រីមផ្ដល់សំណើម',
                'price' => 16.00,
                'original_price' => 20.00,
                'discount' => '-20%',
                'rating' => 4.8,
                'reviews_count' => '12k',
                'image' => asset('img/daily-edit-detail.png'),
                'gallery' => [
                    asset('img/daily-edit-detail.png'),
                    asset('img/daily-edit.png'),
                    asset('img/result-3.jpg'),
                    asset('img/ritual-duo.png'),
                ],
                'skin_types' => ['normal', 'dry', 'sensitive'],
                'brand' => 'liva',
                'is_bestseller' => false,
                'description' => 'Nourish your skin overnight, wake up with brighter and smoother skin.',
                'description_km' => 'ចិញ្ចឹម និងជួសជុលស្បែករបស់អ្នកពេលកំពុងគេងលក់ ភ្ញាក់ឡើងជាមួយស្បែកទន់រលោង និងភ្លឺថ្លា។',
                'features' => ['Deep Hydration', 'Skin Brightening', 'Anti-Aging'],
                'features_km' => ['ផ្ដល់សំណើមជ្រៅដល់ស្បែក', 'ជួយឱ្យស្បែកភ្លឺថ្លាបែបធម្មជាតិ', 'កាត់បន្ថយភាពចាស់ និងស្នាមជ្រួញ'],
            ],
            [
                'id' => 2,
                'slug' => 'liva-brightening-serum',
                'name' => 'Liva Botanical Radiance Serum',
                'name_km' => 'លីវ៉ា សេរ៉ូមបំប៉នស្បែកភ្លឺថ្លាពន្លកមាស',
                'parent_category' => 'skincare',
                'category' => 'serum',
                'category_name' => 'Serum',
                'category_name_km' => 'សេរ៉ូម (Serum)',
                'price' => 21.25,
                'original_price' => 25.00,
                'discount' => '-15%',
                'rating' => 4.8,
                'reviews_count' => '8k',
                'image' => asset('img/botanical.png'),
                'gallery' => [
                    asset('img/botanical.png'),
                    asset('img/result-2.jpg'),
                    asset('img/daily-edit.png'),
                    asset('img/ritual-duo.png'),
                ],
                'skin_types' => ['all', 'oily', 'normal'],
                'brand' => 'liva',
                'is_bestseller' => false,
                'description' => 'Concentrated formula enriched with Vitamin C and botanical gold extracts to fade dark spots.',
                'description_km' => 'រូបមន្តប្រមូលផ្តុំសម្បូរដោយវីតាមីន C និងសារធាតុផ្សំមាស ជួយកាត់បន្ថយស្នាមអុចខ្មៅ។',
                'features' => ['Dark Spot Fading', 'Glow Booster', 'Quick Absorption'],
                'features_km' => ['កាត់បន្ថយស្នាមអុចខ្មៅ', 'ជួយឱ្យស្បែកភ្លឺរលោង', 'ជ្រាបចូលស្បែកបានលឿន'],
            ],
            [
                'id' => 3,
                'slug' => 'liva-facial-cleanser',
                'name' => 'Liva Gentle Golden Cleanser',
                'name_km' => 'លីវ៉ា ហ្វូមលាងមុខសារធាតុរុក្ខជាតិមាស',
                'parent_category' => 'skincare',
                'category' => 'cleanser',
                'category_name' => 'Cleanser',
                'category_name_km' => 'ហ្វូមលាងមុខ',
                'price' => 13.50,
                'original_price' => 16.00,
                'discount' => 'Best Seller',
                'rating' => 4.8,
                'reviews_count' => '10k',
                'image' => asset('img/shower-gel.png'),
                'gallery' => [
                    asset('img/shower-gel.png'),
                    asset('img/daily-edit-detail.png'),
                    asset('img/result-1.jpg'),
                    asset('img/ritual-duo.png'),
                ],
                'skin_types' => ['all', 'sensitive'],
                'brand' => 'liva',
                'is_bestseller' => true,
                'description' => 'Gentle hydrating daily cleanser with amino acids and pure botanical essence.',
                'description_km' => 'ហ្វូមលាងសម្អាតមុខប្រចាំថ្ងៃបែបស្រាលស្រទន់ ផ្សំពីអាស៊ីតអាមីណូ និងសារធាតុរុក្ខជាតិសុទ្ធ។',
                'features' => ['Pore Cleansing', 'Non-Drying', 'Balanced pH'],
                'features_km' => ['សម្អាតរន្ធញើសស្អាតល្អ', 'មិនធ្វើឱ្យស្បែកស្ងួត', 'រក្សាតុល្យភាព pH'],
            ],
            [
                'id' => 4,
                'slug' => 'liva-toner',
                'name' => 'Liva Cellular Calming Toner',
                'name_km' => 'លីវ៉ា ទឹកជូតស្បែកមុខ (Toner) កោសិកាមាស',
                'parent_category' => 'skincare',
                'category' => 'toner',
                'category_name' => 'Toner',
                'category_name_km' => 'ទឹកជូតមុខ (Toner)',
                'price' => 12.80,
                'original_price' => 16.00,
                'discount' => '-25%',
                'rating' => 4.7,
                'reviews_count' => '7k',
                'image' => asset('img/ritual-duo.png'),
                'gallery' => [
                    asset('img/ritual-duo.png'),
                    asset('img/botanical.png'),
                    asset('img/daily-edit.png'),
                    asset('img/result-2.jpg'),
                ],
                'skin_types' => ['oily', 'normal'],
                'brand' => 'liva',
                'is_bestseller' => false,
                'description' => 'Calming toner with fermented rose water and golden chamomile to balance oil.',
                'description_km' => 'ទឹកជូតស្បែកមុខផ្សំពីទឹកកុលាប និងផ្កា chamomile ជួយគ្រប់គ្រងជាតិប្រេង។',
                'features' => ['Skin Calming', 'Pore Tightening', 'Hydrating'],
                'features_km' => ['ជួយសម្រាលស្បែក', 'បន្តឹងរន្ធញើស', 'ផ្ដល់សំណើម'],
            ],
            [
                'id' => 5,
                'slug' => 'liva-day-cream',
                'name' => 'Liva Protective Day Emulsion',
                'name_km' => 'លីវ៉ា គ្រីមការពារពេលថ្ងៃស្បែកភ្លឺរលោង',
                'parent_category' => 'skincare',
                'category' => 'cream',
                'category_name' => 'Cream',
                'category_name_km' => 'គ្រីមផ្ដល់សំណើម',
                'price' => 16.80,
                'original_price' => 20.50,
                'discount' => '-18%',
                'rating' => 4.9,
                'reviews_count' => '6k',
                'image' => asset('img/daily-edit.png'),
                'gallery' => [
                    asset('img/daily-edit.png'),
                    asset('img/daily-edit-detail.png'),
                    asset('img/result-3.jpg'),
                    asset('img/botanical.png'),
                ],
                'skin_types' => ['dry', 'normal'],
                'brand' => 'liva',
                'is_bestseller' => false,
                'description' => 'Daily antioxidant protective cream with silky lightweight golden finish.',
                'description_km' => 'គ្រីមការពារពេលថ្ងៃប្រឆាំងរ៉ាឌីកាល់សេរី ផ្ដល់អារម្មណ៍ស្រាលស្រទន់លើស្បែក។',
                'features' => ['UV Shield', 'All-Day Moisture', 'Glowing Finish'],
                'features_km' => ['ការពារកាំរស្មី UV', 'សំណើមពេញមួយថ្ងៃ', 'ស្បែកភ្លឺរលោង'],
            ],
            [
                'id' => 6,
                'slug' => 'liva-sunscreen-spf50',
                'name' => 'Liva Invisible Shield SPF50+',
                'name_km' => 'លីវ៉ា ឡេការពារកម្ដៅថ្ងៃ SPF50+ ស្រទន់',
                'parent_category' => 'skincare',
                'category' => 'sunscreen',
                'category_name' => 'Sunscreen',
                'category_name_km' => 'ឡេការពារកម្ដៅថ្ងៃ',
                'price' => 18.50,
                'original_price' => 23.50,
                'discount' => '-22%',
                'rating' => 4.8,
                'reviews_count' => '5k',
                'image' => asset('img/conditioner.png'),
                'gallery' => [
                    asset('img/conditioner.png'),
                    asset('img/result-1.jpg'),
                    asset('img/daily-edit.png'),
                    asset('img/botanical.png'),
                ],
                'skin_types' => ['all', 'sensitive'],
                'brand' => 'liva_derma',
                'is_bestseller' => false,
                'description' => 'Ultra-lightweight invisible shield SPF50+ PA++++ with natural porcelain finish.',
                'description_km' => 'ឡេការពារកម្ដៅថ្ងៃការពារខ្ពស់ SPF50+ PA++++ មិនស្អិត មិនឡើងកកកុញ។',
                'features' => ['SPF 50+ PA++++', 'Zero White Cast', 'Sweat Resistant'],
                'features_km' => ['កម្រិតការពារខ្ពស់', 'មិនសថ្លុកលើមុខ', 'ធន់នឹងញើស'],
            ],
            [
                'id' => 7,
                'slug' => 'liva-mask-sheet',
                'name' => 'Liva Nourishing Cream Mask',
                'name_km' => 'លីវ៉ា ម៉ាសគ្រីមចិញ្ចឹមស្បែកជ្រៅ',
                'parent_category' => 'mask',
                'category' => 'sheet_mask',
                'category_name' => 'Mask',
                'category_name_km' => 'ម៉ាសបិទមុខ',
                'price' => 11.90,
                'original_price' => 15.00,
                'discount' => '-17%',
                'rating' => 4.7,
                'reviews_count' => '4k',
                'image' => asset('img/hair-mask.png'),
                'gallery' => [
                    asset('img/hair-mask.png'),
                    asset('img/result-3.jpg'),
                    asset('img/ritual-duo.png'),
                    asset('img/daily-edit-detail.png'),
                ],
                'skin_types' => ['dry', 'sensitive', 'normal'],
                'brand' => 'liva_beauty',
                'is_bestseller' => false,
                'description' => 'Intense hydration hydrogel mask soaked in golden peptide serum.',
                'description_km' => 'ម៉ាសសន្លឹកជាតិទឹកជ្រាបជ្រៅ ផ្ដល់សំណើមបន្ទាន់ដល់ស្បែកហត់នឿយ។',
                'features' => ['Instant Glow', 'Plumping Effect', 'Natural Botanical'],
                'features_km' => ['ភ្លឺថ្លាភ្លាមៗ', 'ស្បែកតឹងណែន', 'សារធាតុធម្មជាតិសុទ្ធ'],
            ],
            [
                'id' => 8,
                'slug' => 'liva-facial-mist',
                'name' => 'Liva Golden Botanical Elixir Mist',
                'name_km' => 'លីវ៉ា ស្ព្រាយបាញ់មុខផ្ដល់សំណើមរុក្ខជាតិមាស',
                'parent_category' => 'skincare',
                'category' => 'toner',
                'category_name' => 'Toner',
                'category_name_km' => 'ទឹកជូតមុខ (Toner)',
                'price' => 14.40,
                'original_price' => 18.00,
                'discount' => '-20%',
                'rating' => 4.8,
                'reviews_count' => '3k',
                'image' => asset('img/botanical.png'),
                'gallery' => [
                    asset('img/botanical.png'),
                    asset('img/shower-gel.png'),
                    asset('img/result-1.jpg'),
                    asset('img/ritual-duo.png'),
                ],
                'skin_types' => ['all'],
                'brand' => 'liva',
                'is_bestseller' => false,
                'description' => 'Refreshing botanical facial mist with chamomile and peptide essence.',
                'description_km' => 'ស្ព្រាយបាញ់មុខធ្វើឱ្យស្រស់ស្រាយ បង្កើនជាតិទឹកបានគ្រប់ពេលវេលា។',
                'features' => ['Instant Freshness', 'Makeup Setting', 'Soothes Redness'],
                'features_km' => ['ស្រស់ស្រាយភ្លាមៗ', 'ជួយរក្សាម្សៅផាត់', 'កាត់បន្ថយការក្រហាយ'],
            ],
            [
                'id' => 9,
                'slug' => 'liva-eye-cream',
                'name' => 'Liva Peptide Eye Contour Cream',
                'name_km' => 'លីវ៉ា គ្រីមលាបបំប៉នជុំវិញភ្នែក peptide មាស',
                'parent_category' => 'skincare',
                'category' => 'cream',
                'category_name' => 'Cream',
                'category_name_km' => 'គ្រីមផ្ដល់សំណើម',
                'price' => 15.30,
                'original_price' => 18.00,
                'discount' => '-15%',
                'rating' => 4.7,
                'reviews_count' => '3k',
                'image' => asset('img/daily-edit-detail.png'),
                'gallery' => [
                    asset('img/daily-edit-detail.png'),
                    asset('img/result-3.jpg'),
                    asset('img/daily-edit.png'),
                    asset('img/botanical.png'),
                ],
                'skin_types' => ['all', 'sensitive'],
                'brand' => 'liva_derma',
                'is_bestseller' => false,
                'description' => 'Revitalizing golden peptide formula for fine lines and dark circles.',
                'description_km' => 'រូបមន្ត peptide បំបាត់រង្វង់ភ្នែកខ្មៅ និងកាត់បន្ថយស្នាមជ្រួញតូចៗ។',
                'features' => ['Reduces Dark Circles', 'Firms Eye Area', 'Non-Greasy'],
                'features_km' => ['បំបាត់ភ្នែកស្លក់ខ្មៅ', 'បន្តឹងស្បែកជុំវិញភ្នែក', 'មិនស្អិត'],
            ],
            [
                'id' => 10,
                'slug' => 'liva-body-lotion',
                'name' => 'Liva Silk Velvet Body Lotion',
                'name_km' => 'លីវ៉ា ឡេលាបបំប៉នស្បែកដងខ្លួនសូត្រមាស',
                'parent_category' => 'body_care',
                'category' => 'body_lotion',
                'category_name' => 'Body Care',
                'category_name_km' => 'ថែរក្សាដងខ្លួន',
                'price' => 17.60,
                'original_price' => 22.00,
                'discount' => '-20%',
                'rating' => 4.8,
                'reviews_count' => '4k',
                'image' => asset('img/body-lotion.png'),
                'gallery' => [
                    asset('img/body-lotion.png'),
                    asset('img/body-wash.png'),
                    asset('img/result-1.jpg'),
                    asset('img/daily-edit.png'),
                ],
                'skin_types' => ['dry', 'normal'],
                'brand' => 'liva',
                'is_bestseller' => false,
                'description' => 'Luxurious body milk infused with golden almond oil and shea butter.',
                'description_km' => 'ឡេលាបខ្លួនផ្សំពីទឹកដោះគោ និងផ្កាកុលាប ធ្វើឱ្យស្បែកទន់រលោង។',
                'features' => ['24h Hydration', 'Delicate Fragrance', 'Velvety Feel'],
                'features_km' => ['សំណើម ២៤ ម៉ោង', 'ក្លិនក្រអូបស្រាល', 'ស្បែកទន់ដូចសូត្រ'],
            ],
            [
                'id' => 11,
                'slug' => 'liva-revitalizing-body-wash',
                'name' => 'Liva Revitalizing Botanical Body Wash',
                'name_km' => 'លីវ៉ា សាប៊ូដុសខ្លួនរុក្ខជាតិមាសផ្ដល់សំណើម',
                'parent_category' => 'body_care',
                'category' => 'body_wash',
                'category_name' => 'Body Care',
                'category_name_km' => 'ថែរក្សាដងខ្លួន',
                'price' => 14.50,
                'original_price' => 18.00,
                'discount' => '-19%',
                'rating' => 4.8,
                'reviews_count' => '3.2k',
                'image' => asset('img/body-wash.png'),
                'gallery' => [
                    asset('img/body-wash.png'),
                    asset('img/body-lotion.png'),
                    asset('img/shower-gel.png'),
                    asset('img/result-1.jpg'),
                ],
                'skin_types' => ['all'],
                'brand' => 'liva',
                'is_bestseller' => false,
                'description' => 'Moisturizing botanical body wash that gently cleanses without stripping moisture.',
                'description_km' => 'សាប៊ូដុសខ្លួនរុក្ខជាតិធម្មជាតិ សម្អាតដោយថ្នមៗ និងរក្សាសំណើមស្បែកបានយ៉ាងល្អ។',
                'features' => ['Silky Foam', 'Gentle Cleanse', 'Moisturizing'],
                'features_km' => ['ពពុះទន់ដូចសូត្រ', 'សម្អាតស្រាលស្រទន់', 'ផ្ដល់សំណើមខ្ពស់'],
            ],
            [
                'id' => 12,
                'slug' => 'liva-luxury-travel-collection',
                'name' => 'Liva Luxury Ritual Collection',
                'name_km' => 'លីវ៉ា ឈុតថែរក្សាសម្រស់ប្រណិត (Ritual Collection)',
                'parent_category' => 'beauty_tools',
                'category' => 'brush',
                'category_name' => 'Beauty Tools',
                'category_name_km' => 'ឧបករណ៍កែសម្ផស្ស',
                'price' => 29.50,
                'original_price' => 38.00,
                'discount' => '-22%',
                'rating' => 4.9,
                'reviews_count' => '2.8k',
                'image' => asset('img/travel-set.png'),
                'gallery' => [
                    asset('img/travel-set.png'),
                    asset('img/ritual-duo.png'),
                    asset('img/daily-edit.png'),
                    asset('img/daily-edit-detail.png'),
                ],
                'skin_types' => ['all'],
                'brand' => 'liva_beauty',
                'is_bestseller' => false,
                'description' => 'Complete signature luxury botanical skincare ritual collection in deluxe travel case.',
                'description_km' => 'ឈុតថែរក្សាសម្រស់ប្រណិតពេញលេញ ផ្ដល់នូវការថែទាំស្បែកយ៉ាងល្អឥតខ្ចោះ។',
                'features' => ['Deluxe Travel Kit', 'Complete Ritual', 'Gift Packaging'],
                'features_km' => ['ឈុតធ្វើដំណើរប្រណិត', 'ថែទាំគ្រប់ជ្រុងជ្រោយ', 'ប្រអប់កាដូដ៏ស្រស់ស្អាត'],
            ],
        ];
    }

    /**
     * Get categories structure with subcategories.
     */
    protected function getCategories(): array
    {
        return [
            [
                'id' => 'all',
                'name' => 'All Products',
                'name_km' => 'ផលិតផលទាំងអស់',
                'count' => 48,
                'children' => [],
            ],
            [
                'id' => 'skincare',
                'name' => 'Skincare',
                'name_km' => 'ថែរក្សាស្បែកមុខ',
                'count' => 18,
                'children' => [
                    ['id' => 'cleanser', 'name' => 'Cleanser', 'name_km' => 'ហ្វូមលាងមុខ', 'count' => 6],
                    ['id' => 'toner', 'name' => 'Toner', 'name_km' => 'ទឹកជូតមុខ (Toner)', 'count' => 6],
                    ['id' => 'serum', 'name' => 'Serum', 'name_km' => 'សេរ៉ូម (Serum)', 'count' => 7],
                    ['id' => 'cream', 'name' => 'Cream', 'name_km' => 'គ្រីមផ្ដល់សំណើម', 'count' => 8],
                    ['id' => 'sunscreen', 'name' => 'Sunscreen', 'name_km' => 'ឡេការពារកម្ដៅថ្ងៃ', 'count' => 5],
                ],
            ],
            [
                'id' => 'body_care',
                'name' => 'Body Care',
                'name_km' => 'ថែរក្សាដងខ្លួន',
                'count' => 8,
                'children' => [
                    ['id' => 'body_lotion', 'name' => 'Body Lotion', 'name_km' => 'ឡេលាបដងខ្លួន', 'count' => 4],
                    ['id' => 'body_wash', 'name' => 'Body Wash', 'name_km' => 'សាប៊ូដុសខ្លួន', 'count' => 4],
                ],
            ],
            [
                'id' => 'mask',
                'name' => 'Mask',
                'name_km' => 'ម៉ាសបិទមុខ',
                'count' => 4,
                'children' => [
                    ['id' => 'sheet_mask', 'name' => 'Sheet Mask', 'name_km' => 'ម៉ាសសន្លឹក', 'count' => 4],
                ],
            ],
            [
                'id' => 'beauty_tools',
                'name' => 'Beauty Tools',
                'name_km' => 'ឧបករណ៍កែសម្ផស្ស',
                'count' => 6,
                'children' => [
                    ['id' => 'roller', 'name' => 'Facial Roller', 'name_km' => 'ឧបករណ៍រមៀលមុខ', 'count' => 3],
                    ['id' => 'brush', 'name' => 'Ritual Kit', 'name_km' => 'ឈុតថែរក្សាសម្រស់', 'count' => 3],
                ],
            ],
        ];
    }

    /**
     * Home / Catalog view.
     */
    public function index(Request $request): View
    {
        $products = $this->getProducts();
        $selectedCategory = $request->query('category', 'all');
        $selectedSkinType = $request->query('skin_type', 'all');
        $sortBy = $request->query('sort', 'popular');
        $searchQuery = trim($request->query('q', ''));
        $maxPrice = $request->query('max_price');

        // Price range filtering
        if ($maxPrice !== null && is_numeric($maxPrice)) {
            $max = (float) $maxPrice;
            $products = array_values(array_filter($products, fn ($p) => $p['price'] <= $max));
        }

        // Search filtering
        if ($searchQuery !== '') {
            $q = mb_strtolower($searchQuery);
            $products = array_values(array_filter($products, function ($p) use ($q) {
                return str_contains(mb_strtolower($p['name']), $q)
                    || str_contains(mb_strtolower($p['name_km']), $q)
                    || str_contains(mb_strtolower($p['category_name']), $q)
                    || str_contains(mb_strtolower($p['description']), $q);
            }));
        }

        // Category & Subcategory filtering
        if ($selectedCategory !== 'all') {
            $products = array_values(array_filter($products, function ($p) use ($selectedCategory) {
                return ($p['category'] ?? '') === $selectedCategory
                    || ($p['parent_category'] ?? '') === $selectedCategory
                    || ($p['slug'] ?? '') === $selectedCategory;
            }));
        }

        // Skin type filtering
        if ($selectedSkinType !== 'all') {
            $products = array_values(array_filter($products, function ($p) use ($selectedSkinType) {
                return in_array($selectedSkinType, $p['skin_types']) || in_array('all', $p['skin_types']);
            }));
        }

        // Sorting
        if ($sortBy === 'price_low') {
            usort($products, fn ($a, $b) => $a['price'] <=> $b['price']);
        } elseif ($sortBy === 'price_high') {
            usort($products, fn ($a, $b) => $b['price'] <=> $a['price']);
        } elseif ($sortBy === 'rating') {
            usort($products, fn ($a, $b) => $b['rating'] <=> $a['rating']);
        }

        $categories = $this->getCategories();

        return view('frontend.home.index', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $selectedCategory,
            'currentSkinType' => $selectedSkinType,
            'currentSort' => $sortBy,
            'currentMaxPrice' => $maxPrice !== null && is_numeric($maxPrice) ? (float) $maxPrice : 50.0,
            'searchQuery' => $searchQuery,
        ]);
    }

    /**
     * Products catalog view (alias to home/catalog).
     */
    public function products(Request $request): View
    {
        return $this->index($request);
    }

    /**
     * Product detail view.
     */
    public function productDetail(string $slug = 'liva-night-cream'): View
    {
        $allProducts = $this->getProducts();
        $product = collect($allProducts)->firstWhere('slug', $slug) ?? $allProducts[0];
        $relatedProducts = array_slice(array_filter($allProducts, fn ($p) => $p['slug'] !== $product['slug']), 0, 4);

        return view('frontend.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    /**
     * Cart view.
     */
    public function cart(): View
    {
        $cartItems = [
            [
                'id' => 1,
                'slug' => 'liva-night-cream',
                'name' => 'Liva Golden Night Cream',
                'name_km' => 'លីវ៉ា គ្រីមយប់សារធាតុផ្សំមាស (Liva Night Cream)',
                'price' => 16.00,
                'original_price' => 20.00,
                'quantity' => 1,
                'image' => asset('img/daily-edit-detail.png'),
            ],
            [
                'id' => 2,
                'slug' => 'liva-brightening-serum',
                'name' => 'Liva Botanical Radiance Serum',
                'name_km' => 'លីវ៉ា សេរ៉ូមបំប៉នស្បែកភ្លឺថ្លាពន្លកមាស',
                'price' => 21.25,
                'original_price' => 25.00,
                'quantity' => 1,
                'image' => asset('img/botanical.png'),
            ],
            [
                'id' => 3,
                'slug' => 'liva-facial-cleanser',
                'name' => 'Liva Gentle Golden Cleanser',
                'name_km' => 'លីវ៉ា ហ្វូមលាងមុខសារធាតុរុក្ខជាតិមាស',
                'price' => 13.50,
                'original_price' => 16.00,
                'quantity' => 1,
                'image' => asset('img/shower-gel.png'),
            ],
        ];

        $subtotal = 50.75;
        $shipping = 0.00;
        $discount = 5.00;
        $total = 45.75;
        $allProducts = $this->getProducts();

        return view('frontend.cart.index', compact('cartItems', 'subtotal', 'shipping', 'discount', 'total', 'allProducts'));
    }

    /**
     * Checkout view.
     */
    public function checkout(): View
    {
        $items = [
            [
                'name' => 'Liva Golden Night Cream',
                'name_km' => 'លីវ៉ា គ្រីមយប់សារធាតុផ្សំមាស (Liva Night Cream)',
                'price' => 16.00,
                'quantity' => 1,
                'image' => asset('img/daily-edit-detail.png'),
            ],
            [
                'name' => 'Liva Botanical Radiance Serum',
                'name_km' => 'លីវ៉ា សេរ៉ូមបំប៉នស្បែកភ្លឺថ្លាពន្លកមាស',
                'price' => 21.25,
                'quantity' => 1,
                'image' => asset('img/botanical.png'),
            ],
        ];

        $subtotal = 37.25;
        $shipping = 0.00;
        $total = 37.25;

        return view('frontend.checkout.index', compact('items', 'subtotal', 'shipping', 'total'));
    }

    /**
     * Order success view.
     */
    public function orderSuccess(): View
    {
        $order = [
            'number' => '1001',
            'date' => '29 Nov 2025',
            'status' => 'Processing',
            'status_km' => 'កំពុងដំណើរការ',
            'total' => 29.50,
            'items_count' => 2,
            'payment_method' => 'Credit / Debit Card (ABA)',
        ];

        return view('frontend.checkout.success', compact('order'));
    }

    /**
     * Dashboard view.
     */
    public function dashboard(): View
    {
        $user = [
            'name' => 'Panha',
            'name_km' => 'បញ្ញា',
            'email' => 'panha@gmail.com',
            'avatar' => asset('img/liva/user-avatar.jpg'),
        ];

        $stats = [
            'total_orders' => 3,
            'total_spent' => 82.50,
            'wishlist_items' => 2,
            'coupons' => 0,
        ];

        $recentOrders = [
            [
                'id' => '#1001',
                'date' => '29 Nov 2025',
                'status' => 'Processing',
                'status_class' => 'bg-[#F5EFEB] text-[#997528] border border-[#EADFC7]',
                'total' => 29.50,
            ],
            [
                'id' => '#0982',
                'date' => '12 Nov 2025',
                'status' => 'Completed',
                'status_class' => 'bg-emerald-50 text-emerald-700 border border-emerald-200',
                'total' => 36.80,
            ],
            [
                'id' => '#0899',
                'date' => '24 Oct 2025',
                'status' => 'Completed',
                'status_class' => 'bg-emerald-50 text-emerald-700 border border-emerald-200',
                'total' => 16.20,
            ],
        ];

        return view('frontend.account.dashboard', compact('user', 'stats', 'recentOrders'));
    }

    /**
     * About brand view.
     */
    public function about(): View
    {
        return view('frontend.about.index');
    }

    /**
     * Contact concierge view.
     */
    public function contact(): View
    {
        return view('frontend.contact.index');
    }

    /**
     * Favorites / Wishlist view.
     */
    public function wishlist(): View
    {
        $allProducts = $this->getProducts();
        // Provide 2 default favorite luxury items
        $wishlistProducts = array_values(array_filter($allProducts, function ($p) {
            return in_array($p['slug'], ['liva-night-cream', 'liva-brightening-serum']);
        }));

        return view('frontend.wishlist.index', compact('wishlistProducts', 'allProducts'));
    }

    /**
     * Login view.
     */
    public function login(): View
    {
        return view('frontend.auth.login');
    }

    /**
     * Register view.
     */
    public function register(): View
    {
        return view('frontend.auth.register');
    }

    /**
     * Switch language locale.
     */
    public function switchLang(string $locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'km'])) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
