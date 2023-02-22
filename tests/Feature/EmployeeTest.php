<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_auth_user_can_see_employee_list()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/crm/employees');

        $response->assertSee('Employee List');
    }

    public function test_unauth_user_cannot_see_employee_list()
    {
        $response = $this->get('/crm/employees');

        $response->assertDontSee('Employee List');
    }

    public function test_auth_user_can_create_new_employee()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();

        $response = $this->actingAs($user)->post('crm/employees', [
            'firstname' => 'Harry',
            'lastname' => 'Potter',
            'email' => 'harry@abc.com',
            'phone' => '9813849584',
            'company_id' => $company->id,
        ]);

        $response->assertRedirect('/crm/employees');
        $this->assertDatabaseHas('employees', [
            'firstname' => 'Harry'
        ]);
    }

    public function test_auth_user_can_see_the_edit_employee_page()
    {
        $user = User::factory()->create();
        $company = Company::factory()->hasEmployees(3)->create();
        $company->load('employees');

        $employee = $company->employees()->first();
        $response = $this->actingAs($user)->get('/crm/employees/'.$employee->id.'/edit');
        $response->assertStatus(200);
        $response->assertSee($employee->name);
    }

    public function test_auth_user_can_update_employee()
    {
        $user = User::factory()->create();
        $company = Company::factory()->hasEmployees(3)->create();
        $company->load('employees');

        $employee = $company->employees()->first();

        $response = $this->actingAs($user)->put('/crm/employees/'.$employee->id, [
            'firstname' => 'Harry',
            'lastname' => 'Potter',
            'email' => 'harry@abc.com',
            'phone' => '9813849584',
            'company_id' => $company->id,
        ]);
        $response->assertSessionHasNoErrors();
        $this->assertEquals('Harry', Employee::first()->firstname);
    }

    public function test_auth_user_can_delete_employee()
    {
        $user = User::factory()->create();
        $company = Company::factory()->hasEmployees(3)->create();
        $company->load('employees');

        $employee = $company->employees()->first();

        $response = $this->actingAs($user)->delete('/crm/employees/'.$employee->id);
        $response->assertSessionHasNoErrors();
        $this->assertNotEquals(3, Employee::count());
    }
}
