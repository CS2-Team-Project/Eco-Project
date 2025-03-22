<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\ShippingAddress;  // Add this line to use the ShippingAddress model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validate the user input, including the shipping address fields
        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            
            // validation 
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Create the shipping address for the user
        ShippingAddress::create([
            'user_id' => $user->id,  // Link to the user
            'address_line_1' => $input['address_line_1'],
            'address_line_2' => $input['address_line_2'] ?? null,  // Optional field
            'city' => $input['city'],
            'postal_code' => $input['postal_code'],
            'country' => $input['country'],
        ]);

        return $user;
    }
}
