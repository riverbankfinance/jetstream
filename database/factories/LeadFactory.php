<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Lead::class;

    public function definition()
    {
        return [
            'fullName' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fullnameCoborrower' => $this->faker->name(),
            'birthdayCoborrower'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'emailCoborrower' => $this->faker->unique()->safeEmail(),
            'phoneCoborrower' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip' => $this->faker->postcode(),
            'message' =>$this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'url'=>$this->faker->url(),
            'ip'=>$this->faker->ipv4(),
            'referringUrl'=>$this->faker->url(),
            'agent'=>'',
            'status'=>'0',
            'goal'=> 'Purchase',
            'closed'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'noText'=>'',
            'rating'=>'',
            'floifyLoan'=>'',
            'credit'=>'',
            'phone' => $this->faker->phoneNumber(),
            'loan_type' => 'FHA',
            'message' => $this->faker->text(50),
            'goal' => 'Purchase',
            'user_id' => 1,
        ];
    }
}
