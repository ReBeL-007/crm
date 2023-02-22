<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_auth_user_can_see_company_list()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/crm/companies');

        $response->assertSee('Company List');
    }

    public function test_unauth_user_cannot_see_company_list()
    {
        $response = $this->get('/crm/companies');

        $response->assertDontSee('Company List');
    }

    public function test_auth_user_can_create_new_company()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('crm/companies', [
            'name' => 'ABC',
            'email' => 'support@abc.com',
            'website' => 'https://abc.com',
        ]);
        // $response->assertOk();
        $response->assertRedirect('/crm/companies');
        $this->assertDatabaseHas('companies', [
            'name' => 'ABC'
        ]);
    }

    public function test_auth_user_can_see_the_edit_company_page()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();
        $response = $this->actingAs($user)->get('/crm/companies/'.$company->id.'/edit');
        $response->assertStatus(200);
        $response->assertSee($company->name);
    }

    public function test_auth_user_can_update_company()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();
        
        $response = $this->actingAs($user)->put('/crm/companies/'.$company->id, [
            'name' => 'XYZ',
            'email' => 'support@xyz.com',
            'website' => 'https://xyz.com',
        ]);
        $response->assertSessionHasNoErrors();
        $this->assertEquals('XYZ', Company::first()->name);
    }

    public function test_auth_user_can_delete_company()
    {
        $user = User::factory()->create();
        $company =Company::factory()->create();
        $this->assertEquals(1, Company::count());

        $response = $this->actingAs($user)->delete('/crm/companies/'.$company->id);
        $response->assertSessionHasNoErrors();
        $this->assertEquals(0, Company::count());
    }
}
