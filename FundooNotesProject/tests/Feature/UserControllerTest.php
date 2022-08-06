<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    
    public function test_Successfull_Registration()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])
            ->json('POST', '/api/register', [
                "firstname" => "vishnu",
                "lastname" => "vv",
                "email" => "rohanaa@gmail.com",
                "password" => "vishnuvvl321",
                "password_confirmation" => "vishnuvvl321"
            ]);

        $response->assertStatus(201)->assertJson(['message' => 'User successfully registered']);
    }

    public function test_Unsuccessfull_register()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])
            ->json('POST', '/api/register', [
                "firstname" => "vishnu",
                "lastname" => "vv",
                "email" => "rohanaa@gmail.com",
                "password" => "vishnuvvl321",
                "password_confirmation" => "vishnuvvl321"
            ]);
        $response->assertStatus(401)->assertJson(['message' => 'The email has already been taken.']);
    }

    public function test_Successfull_login()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])->json(
            'POST',
            '/api/login',
            [
                "email" => "shara@gmail.com",
                "password" => "sayandhvvl321"
            ]
        );
        $response->assertStatus(200)->assertJson(['success' => 'Login successful']);
    }

    public function test_Unsuccessfull_login()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])->json('POST', '/api/login',
            [
                "email" => "shara@gmail.com",
                "password" => "sayansh@123"
            ]
        );
        $response->assertStatus(400)->assertJson(['message' => 'Login credentials are invalid.']);
    }
    public function test_Successfull_logout()
    { 

            $response = $this->withHeaders([
                'Content-Type' => 'Application/json',
            ])->json('POST', '/api/logout', [
                "token" => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjU4NzI1NjI2LCJleHAiOjE2NTg3MjkyMjYsIm5iZiI6MTY1ODcyNTYyNiwianRpIjoiM01PUEhYWlMyeFpkVEVqbCIsInN1YiI6IjI4IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.uD_qbJUb2AA9xREyA0vfEaD7qJCf7korbCmU2BAyTQE'
            ]);

            $response->assertStatus(200)->assertJson(['message' => 'User has been logged out']);
    }

}