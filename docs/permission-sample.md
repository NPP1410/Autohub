# Permission Sample For Current Template

This sample matches the active backend routes and menus currently kept in the template.

## Active Backend Routes

- `webpanel/` -> Dashboard
- `webpanel/profile` -> Profile
- `webpanel/administrator/user` -> User
- `webpanel/administrator/permission` -> Permission
- `webpanel/administrator/log` -> Error Log

The old Task module is not part of the active template route/menu baseline because its models and schema are not included in the current repo.

## Sample `tb_menu` Structure

| Menu ID | Parent | Menu Key | Name | URL | Position |
| --- | --- | --- | --- | --- | --- |
| `1` | `null` | `null` | Menu | `null` | `topic` |
| `2` | topic `1` | `dashboard` | Dashboard | `` | `main` |
| `3` | topic `1` | `profile` | Profile | `profile` | `main` |
| `1000` | `null` | `null` | Administrator | `null` | `topic` |
| `1001` | topic `1000` | `administrator.permission` | Permission | `administrator/permission` | `main` |
| `1002` | topic `1000` | `administrator.user` | User | `administrator/user` | `main` |
| `1003` | topic `1000` | `administrator.log` | Error Log | `administrator/log` | `main` |

## Sample Role Matrix

| Role ID | Role Name | Dashboard | Profile | User | Permission | Error Log |
| --- | --- | --- | --- | --- | --- | --- |
| `1` | Super Admin | `R` | `R,E` | `R,A,E,D` | `R,A,E,D` | `R` |
| `2` | Admin | `R` | `R,E(self)` | `-` | `-` | `R` |

Legend:

- `R` = read
- `A` = add
- `E` = edit
- `D` = delete

## Seeder

The current baseline seeder is:

- `database/seeders/PermissionSampleSeeder.php`

It will upsert the sample roles, menu tree, and matching permissions into:

- `tb_role`
- `tb_menu`
- `tb_role_list`

`DatabaseSeeder` calls this seeder, so a fresh template install can run:

```bash
php artisan db:seed
```

## Controller Checks

Controllers should use readable `menu_key` checks:

- `Helper::canView('dashboard')`
- `Helper::canEdit('profile')`
- `Helper::canAdd('administrator.user')`
- `Helper::canEdit('administrator.permission')`
