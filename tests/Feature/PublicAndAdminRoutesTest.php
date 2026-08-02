<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicAndAdminRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\AdminSeeder::class);
        $this->seed(\Database\Seeders\CategorySeeder::class);
        $this->seed(\Database\Seeders\CompanySettingSeeder::class);
        $this->seed(\Database\Seeders\ProductSeeder::class);
    }

    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Green Darma');
    }

    public function test_products_index_loads_successfully(): void
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('SCABICOD SOAP');
    }

    public function test_only_selected_products_are_visible_on_public_pages(): void
    {
        Product::create([
            'category_id' => Category::first()->id,
            'name' => 'Hidden Product',
            'slug' => 'hidden-product',
            'status' => 'published',
            'short_description' => 'This should not appear publicly.',
        ]);

        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('SCABICOD SOAP');
        $response->assertSee('Tinea Soap');
        $response->assertSee('SCABVAR Lotion');
        $response->assertSee('Greenstar Shampoo');
        $response->assertSee('X-Corel G Tablet');
        $response->assertDontSee('Hidden Product');
    }

    public function test_product_detail_page_loads_successfully(): void
    {
        $product = Product::first();
        $response = $this->get('/products/' . $product->slug);
        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    public function test_live_search_api_returns_json_results(): void
    {
        $response = $this->getJson('/products/search-api?q=Scabicod');
        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'SCABICOD SOAP']);
    }

    public function test_sitemap_xml_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=utf-8');
    }

    public function test_robots_txt_returns_valid_text(): void
    {
        $response = $this->get('/robots.txt');
        $response->assertStatus(200);
        $response->assertSee('Sitemap:');
    }

    public function test_admin_guest_redirects_to_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_login_page_loads(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_dashboard(): void
    {
        $admin = Admin::first();
        $response = $this->actingAs($admin, 'admin')->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }
}
