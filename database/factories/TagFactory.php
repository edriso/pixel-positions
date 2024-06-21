<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tagNames = [
            'Software Development',
            'Marketing',
            'Sales',
            'Customer Service',
            'Management',
            'Finance',
            'Healthcare',
            'Engineering',
            'Education',
            'Design',
            'Human Resources',
            'Operations',
            'Logistics',
            'Legal',
            'Data Science',
            'Product Management',
            'Content Writing',
            'Consulting',
            'Project Management',
            'IT Support',
        ];

        /*
            below gave an error:
            The memory exhaustion issue typically arises due to the unique constraint in your Tag factory combined with the high number of attempts to generate unique values. To address this, you can optimize the unique value generation and avoid exceeding memory limits.

            // // Try to pick a unique tag name from the predefined list first
            // // The optional() method allows the randomElement to occasionally return null, enabling the fallback mechanism if the predefined list is exhausted.
            // $tagName = fake()->unique()->optional()->randomElement($tagNames);
            // // If all predefined names are exhausted, generate a new unique word
            // if (!$tagName) {
            //     $tagName = fake()->unique()->word();
            // }
        */

        // Try to pick a unique tag name from the predefined list first
        static $usedNames = [];
        $tagName = null;
        if (count($usedNames) < count($tagNames)) {
            do {
                $tagName = $this->faker->randomElement($tagNames);
            } while (in_array($tagName, $usedNames));

            $usedNames[] = $tagName;
        } else {
            // All predefined names are exhausted, generate a new unique word
            $tagName = $this->faker->unique()->word();
        }

        // // below can be a more straightforward approach to ensure unique tag names are selected without the risk of running into memory issues or excessive retries
        // // Static variable to keep track of used indices
        // static $index = 0;
        // // Pick a tag name from the list or generate a unique word
        // $tagName = null;
        // if ($index < count($tagNames)) {
        //     $tagName = $tagNames[$index];
        //     $index++;
        // } else {
        //     $tagName = $this->faker->unique()->word();
        // }

        return [
            'name' => $tagName,
        ];
    }
}