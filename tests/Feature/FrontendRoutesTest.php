<?php

namespace Tests\Feature;

use Tests\TestCase;

class FrontendRoutesTest extends TestCase
{
    public function test_home_page_returns_ok_and_contains_catalog(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Liva');
        $response->assertSee('All Products');
        $response->assertSee('liva-night-cream');
        $response->assertSee('border-[#B58E3E]');
        $response->assertDontSee('bg-[#B58E3E] text-white font-bold shadow-md shadow-stone-800/10', false);
        $response->assertDontSee('id="desktop-skincare-dropdown"', false);
        $response->assertDontSee('id="desktop-bodycare-dropdown"', false);
        $response->assertDontSee('id="desktop-tools-dropdown"', false);
    }

    public function test_home_page_renders_auto_slide_banners(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('hero-banner-carousel');
        $response->assertSee('banner-1.webp');
        $response->assertSee('banner-2.webp');
        $response->assertSee('carousel-prev-btn');
        $response->assertSee('carousel-next-btn');
    }

    public function test_home_page_supports_khmer_locale(): void
    {
        $response = $this->withSession(['locale' => 'km'])->get('/');

        $response->assertStatus(200);
        $response->assertSee('ផលិតផលទាំងអស់');
        $response->assertSee('ថែរក្សាស្បែកមុខ');
    }

    public function test_products_index_route_returns_ok(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee('liva-night-cream');
    }

    public function test_product_detail_route_returns_ok(): void
    {
        $response = $this->get('/products/liva-night-cream');

        $response->assertStatus(200);
        $response->assertSee('Golden Night Cream');
        $response->assertSee('Deep Hydration');
        $response->assertSee('Add to Cart');
        $response->assertSee('gallery-thumb-btn');
        $response->assertSee('switchProductImage');
        $response->assertSee('switchProductVideo');
        $response->assertSee('thumb-video-btn');
        $response->assertSee('product-commercial.mp4');
        $response->assertSee('daily-edit.png');
        $response->assertSee('result-3.jpg');
        $response->assertSee('ritual-duo.png');
        $response->assertDontSee('alt="thumb 2"', false);
    }

    public function test_cart_route_returns_ok(): void
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
        $response->assertSee(__('frontend.cart.title'));
        $response->assertSee('Order Summary');
        $response->assertSee('$45.75');
    }

    public function test_checkout_route_returns_ok(): void
    {
        $response = $this->get('/checkout');

        $response->assertStatus(200);
        $response->assertSee('Payment Method');
        $response->assertSee('Confirm & Place Order');
        $response->assertSee('Credit / Debit Card');
        $response->assertSee('ABA Bank');
        $response->assertSee('aba-khqr.png');
        $response->assertSee('002 918 345');
        $response->assertSee('Canadia Bank');
        $response->assertSee('Download QR Code');
        $response->assertDontSee('value="paypal"', false);
        $response->assertDontSee('value="apple_pay"', false);
    }

    public function test_order_success_route_returns_ok(): void
    {
        $response = $this->get('/order-success');

        $response->assertStatus(200);
        $response->assertSee('Order Placed Successfully!');
        $response->assertSee('1001');
    }

    public function test_dashboard_route_returns_ok(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('My Dashboard');
        $response->assertSee('Panha');
        $response->assertSee('Total Orders');
        $response->assertSee(__('frontend.dashboard.beauty_banner'));
    }

    public function test_category_and_subcategory_filtering(): void
    {
        $responseBodyCare = $this->get('/?category=body_care');
        $responseBodyCare->assertStatus(200);
        $responseBodyCare->assertSee('Liva Silk Velvet Body Lotion');
        $responseBodyCare->assertSee('Liva Revitalizing Botanical Body Wash');

        $responseCleanser = $this->get('/?category=cleanser');
        $responseCleanser->assertStatus(200);
        $responseCleanser->assertSee('Liva Gentle Golden Cleanser');

        $responseSkincare = $this->get('/?category=skincare');
        $responseSkincare->assertStatus(200);
        $responseSkincare->assertSee('Golden Night Cream');
        $responseSkincare->assertSee('Liva Gentle Golden Cleanser');

        $responseToner = $this->get('/?category=toner');
        $responseToner->assertStatus(200);
        $responseToner->assertSee('border-[#B58E3E]');
        $responseToner->assertDontSee('bg-[#EADFC7]/60', false);
    }

    public function test_language_switcher_redirects_and_sets_session(): void
    {
        $response = $this->get('/lang/km');

        $response->assertRedirect();
        $response->assertSessionHas('locale', 'km');

        $responseEn = $this->get('/lang/en');
        $responseEn->assertRedirect();
        $responseEn->assertSessionHas('locale', 'en');
    }
}
