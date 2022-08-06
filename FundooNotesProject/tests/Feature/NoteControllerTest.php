<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    public function test_Successfull_createNote()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjU4NTA0MTA3LCJleHAiOjE2NTg1MDc3MDcsIm5iZiI6MTY1ODUwNDEwNywianRpIjoiSGV2N2lGZ3JOZGc0VWpGbCIsInN1YiI6IjUiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.vC2DroIXyre5M9OFvJ3eWbqf_Gu6eVmbgY5Xrg4h1VY'
        ])->json('POST', '/api/createNote',
        [
            "title" => "abcd",
            "description" => "efgh",
        ]);

        $response->assertStatus(200)->assertJson(['message' => 'Note created successfully']);
    }

    public function test_Unsuccessfull_createNote()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiJKV1QiLCJhbGciOiJIU.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjU4NTA0NjU4LCJleHAiOjE2NTg1MDgyNTgsIm5iZiI6MTY1ODUwNDY1OCwianRpIjoiZFlaVFlJY20zQUVnSnJwNCIsInN1YiI6IjUiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.AnKvCXdZjzC6s09DIGC4F-tGCfjA6Rg7jPDJWQoxDNI'
        ])->json('POST', '/api/createNote',
        [
            "title" => "abcd",
            "description" => "efgh",
        ]);

        $response->assertStatus(201)->assertJson(['message' => 'Invalid Authorization Token']);
    }

}