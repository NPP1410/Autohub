<?php

namespace Tests\Unit;

use App\Helpers\Helper;
use App\Models\Backend\MenuModel;
use App\Models\Backend\Role_listModel;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

class SidebarMenuTreeTest extends TestCase
{
    public function test_it_builds_a_visible_tree_from_key_and_legacy_permissions(): void
    {
        $topic = $this->menu([
            'id' => 1,
            'name' => 'Main',
            'position' => 'topic',
            'sort' => 1,
        ]);
        $directMenu = $this->menu([
            'id' => 2,
            'topic_id' => 1,
            'name' => 'Dashboard',
            'menu_key' => 'dashboard',
            'position' => 'main',
            'sort' => 2,
        ]);
        $parentMenu = $this->menu([
            'id' => 3,
            'topic_id' => 1,
            'name' => 'Settings',
            'menu_key' => 'settings',
            'position' => 'main',
            'sort' => 3,
        ]);
        $visibleChild = $this->menu([
            'id' => 4,
            '_id' => 3,
            'name' => 'Users',
            'menu_key' => 'settings.users',
            'position' => 'secondary',
            'sort' => 4,
        ]);
        $hiddenChild = $this->menu([
            'id' => 5,
            '_id' => 3,
            'name' => 'Logs',
            'menu_key' => 'settings.logs',
            'position' => 'secondary',
            'sort' => 5,
        ]);

        $permissions = collect([
            $this->permission(['menu_id' => 2, 'menu_key' => 'dashboard']),
            $this->permission(['menu_id' => 4, 'menu_key' => null]),
        ]);

        $tree = $this->buildTree(
            collect([$topic, $directMenu, $parentMenu, $visibleChild, $hiddenChild]),
            $permissions
        );

        $this->assertCount(1, $tree);
        $this->assertSame([2, 3], $tree->first()->getRelation('sidebarChildren')->pluck('id')->all());
        $this->assertSame(
            [4],
            $tree->first()
                ->getRelation('sidebarChildren')
                ->last()
                ->getRelation('sidebarChildren')
                ->pluck('id')
                ->all()
        );
    }

    public function test_it_hides_empty_topics_and_inaccessible_parents(): void
    {
        $topic = $this->menu([
            'id' => 10,
            'name' => 'Administration',
            'position' => 'topic',
        ]);
        $parentMenu = $this->menu([
            'id' => 11,
            'topic_id' => 10,
            'name' => 'Users',
            'position' => 'main',
        ]);
        $childMenu = $this->menu([
            'id' => 12,
            '_id' => 11,
            'name' => 'User list',
            'position' => 'secondary',
        ]);

        $tree = $this->buildTree(collect([$topic, $parentMenu, $childMenu]), collect());

        $this->assertTrue($tree->isEmpty());
    }

    private function buildTree($menus, $permissions)
    {
        $method = new ReflectionMethod(Helper::class, 'buildSidebarMenuTree');
        $method->setAccessible(true);

        return $method->invoke(null, $menus, $permissions);
    }

    private function menu(array $attributes): MenuModel
    {
        return (new MenuModel())->forceFill($attributes);
    }

    private function permission(array $attributes): Role_listModel
    {
        return (new Role_listModel())->forceFill($attributes);
    }
}
