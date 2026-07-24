<?php

use App\Models\Service;

test('the home page renders', function () {
    $this->get(route('home'))->assertOk();
});

test('the services page lists active services', function () {
    Service::factory()->create(['title' => 'Managed Services', 'is_active' => true]);

    $this->get(route('services.index'))
        ->assertOk()
        ->assertSee('Managed Services');
});

test('inactive services return 404 on the public detail page', function () {
    $service = Service::factory()->create(['is_active' => false]);

    $this->get(route('services.show', $service))->assertNotFound();
});

test('the contact form stores a message', function () {
    $this->post(route('contact.store'), [
        'name' => 'Andi',
        'email' => 'andi@example.com',
        'phone' => '0812',
        'subject' => 'Halo',
        'message' => 'Saya tertarik dengan layanan Anda.',
    ])->assertRedirect();

    $this->assertDatabaseHas('contact_messages', [
        'email' => 'andi@example.com',
        'is_read' => false,
    ]);
});

test('the contact form validates required fields', function () {
    $this->post(route('contact.store'), ['name' => '', 'email' => 'not-an-email', 'message' => ''])
        ->assertSessionHasErrors(['name', 'email', 'message']);

    $this->assertDatabaseCount('contact_messages', 0);
});
