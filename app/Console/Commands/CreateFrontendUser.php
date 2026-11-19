<?php

namespace App\Console\Commands;

use App\Models\Frontend\FrontendUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateFrontendUser extends Command
{
    protected $signature = 'frontend:create-user {email} {--name= : Display name} {--customer-id= : Optional existing customer reference}';
    protected $description = 'Create a frontend account with an interactively entered password';

    public function handle(): int
    {
        if (!Schema::hasTable('frontend_users')) {
            $this->error('Run the frontend auth migration before creating an account.');
            return self::FAILURE;
        }

        $email = Str::lower(trim((string) $this->argument('email')));
        $name = $this->option('name') ?: $this->ask('Display name');
        $customerId = $this->option('customer-id');
        $validator = Validator::make(['email' => $email, 'name' => $name, 'customer_id' => $customerId], [
            'email' => ['required', 'email', 'max:254', 'unique:frontend_users,email'],
            'name' => ['required', 'string', 'max:150'],
            'customer_id' => ['nullable', 'integer', 'min:1', 'exists:tb_customer,id'],
        ]);
        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return self::FAILURE;
        }

        $password = $this->secret('Password (at least 8 characters, letters and numbers)');
        $confirmation = $this->secret('Confirm password');
        $validator = Validator::make(['password' => $password, 'password_confirmation' => $confirmation], [
            'password' => ['required', 'string', 'confirmed', 'max:255', \Illuminate\Validation\Rules\Password::min(8)->letters()->numbers()],
        ]);
        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return self::FAILURE;
        }

        FrontendUser::create(['email' => $email, 'name' => $name, 'password' => $password, 'is_active' => true, 'customer_id' => $customerId]);
        $this->info('Created frontend account for '.$email.'. No admin permissions were granted.');
        return self::SUCCESS;
    }
}
