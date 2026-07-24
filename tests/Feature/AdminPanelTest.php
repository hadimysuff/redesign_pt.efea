<?php

use App\Models\Service;
use App\Models\User;

test('guests are redirected from the admin panel to login', function () {
    $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
});

test('non-admin users cannot access the admin panel', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->actingAs($user)->get(route('admin.dashboard'))->assertForbidden();
});

test('admins can view the dashboard', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)->get(route('admin.dashboard'))->assertOk();
});

test('an admin can create a service and the slug is generated', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->post(route('admin.services.store'), [
            'title' => 'Cloud Migration',
            'excerpt' => 'Move to the cloud safely.',
            'is_active' => '1',
            'sort_order' => 1,
        ])
        ->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseHas('services', [
        'title' => 'Cloud Migration',
        'slug' => 'cloud-migration',
    ]);
});

test('service creation is validated', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->post(route('admin.services.store'), ['title' => ''])
        ->assertSessionHasErrors('title');

    expect(Service::count())->toBe(0);
});

test('an admin can update and delete a service', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $service = Service::factory()->create(['title' => 'Old', 'slug' => 'old']);

    $this->actingAs($admin)
        ->put(route('admin.services.update', $service), [
            'title' => 'Renamed',
            'slug' => 'old',
            'is_active' => '1',
            'sort_order' => 2,
        ])
        ->assertRedirect(route('admin.services.index'));

    expect($service->fresh()->title)->toBe('Renamed');

    $this->actingAs($admin)
        ->delete(route('admin.services.destroy', $service))
        ->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseMissing('services', ['id' => $service->id]);
});
