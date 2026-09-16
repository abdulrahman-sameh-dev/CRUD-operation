<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_dashboard_with_employees()
    {
        $user = User::factory()->create();
        $employee = Employee::factory()->create();

        $this->actingAs($user)
             ->get(route('dashboard'))
             ->assertOk()
             ->assertSee($employee->title);
    }

    public function test_unauthenticated_user_is_redirected_to_login()
    {
        $this->get(route('dashboard'))
             ->assertRedirect('/login');
    }

    public function test_employee_can_be_created_with_valid_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('employees.store'), [
            'title'       => 'Software Engineer',
            'department'  => 'Development',
            'salary'      => 15000,
            'address'     => 'Cairo, Egypt',
            'description' => 'Working on Laravel projects.',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('employees', ['title' => 'Software Engineer']);
    }

    public function test_employee_can_be_updated()
    {
        $user = User::factory()->create();
        $employee = Employee::factory()->create(['title' => 'Old Title']);

        $response = $this->actingAs($user)->put(route('employees.update', $employee->id), [
            'title'       => 'Updated Title',
            'department'  => 'Updated Dept',
            'salary'      => 20000,
            'address'     => 'Alexandria',
            'description' => 'Updated description',
        ]);

        $response->assertRedirect(route('employees.show', $employee->id));
        $this->assertDatabaseHas('employees', ['title' => 'Updated Title']);
    }

    public function test_employee_can_be_deleted()
    {
        $user = User::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->actingAs($user)->delete(route('employees.destroy', $employee->id));

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    }
}