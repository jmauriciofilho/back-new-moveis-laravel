<?php

use App\Domain\_Classes\DefaultService;
use App\Domain\Roles\Role;
use App\Domain\Users\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DefaultServiceTest extends TestCase
{
    use DatabaseMigrations;

    public function testSetBelongsToManyOfUserServiceWithOneRole()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => '...'
        ]);

        $user = factory(User::class)->create();

        DefaultService::setBelongsToMany(['roles' => [$admin->id]], 'roles', 'roles', $user);

        self::assertTrue($user->hasRole($admin->name));
    }

    public function testSetBelongsToManyOfUserServiceWithTwoRoles()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => '...'
        ]);

        $manager = Role::create([
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => '...'
        ]);

        $user = factory(User::class)->create();

        DefaultService::setBelongsToMany(['roles' => [$admin->id, $manager->id]], 'roles', 'roles', $user);

        self::assertTrue($user->hasRole([$admin->name, $manager->name], true));
    }

    public function testPushNotification()
    {
//        $this->assertTrue(
//            \App\Domain\_Classes\DefaultService::pushNotification('channel_admin', 'event', [
//                'title' => str_random('5') . str_random('5'),
//                'message' => str_random('15'),
//                'time' => '5 mins',
//                'src' => '/assets/site/img/no-photo.gif',
//                'href' => 'javascript:void(0);'
//            ])
//        );
    }
}
