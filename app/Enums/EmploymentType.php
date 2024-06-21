<?php

namespace App\Enums;

enum EmploymentType: string
{
    case FullTime = 'Full time';
    case PartTime = 'Part time';
    case Contract = 'Contract';
    case Temporary = 'Temporary';
    case Internship = 'Internship';
    case Freelance = 'Freelance';

    /**
     * Get the display name for the enum value.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            EmploymentType::FullTime => 'Full-Time Employment',
            EmploymentType::PartTime => 'Part-Time Employment',
            EmploymentType::Contract => 'Contract-Based Employment',
            EmploymentType::Temporary => 'Temporary Employment',
            EmploymentType::Internship => 'Internship Opportunity',
            EmploymentType::Freelance => 'Freelance Work',
        };
    }
}

// The `label` method provides several benefits over directly using `enum->value`, especially in the context of displaying user-friendly strings in your application. Here are some of the benefits:

// 1. **User-Friendly Labels**: The `label` method allows you to define more readable and user-friendly labels that can be used in your views or UI elements. This can be particularly useful if the enum values themselves are not formatted in a way that is suitable for display (e.g., they may be in snake_case or contain underscores).

// 2. **Localization**: The `label` method can be extended to support localization. This means you can return different labels based on the user's locale, making your application more accessible to users who speak different languages.

// 3. **Consistency**: Using the `label` method ensures that the same label is used consistently throughout your application. This reduces the risk of inconsistencies that can occur if you manually format enum values in multiple places.

// 4. **Separation of Concerns**: The `label` method separates the logic of the enum values from their presentation. This adheres to the principle of separation of concerns, making your code more maintainable and easier to read.

// 5. **Flexibility**: The `label` method can be customized to include additional logic for generating labels. For example, you might want to append certain suffixes, handle special cases, or integrate with other parts of your application.

// Here is an example to illustrate these points:

// ### Enum Definition with `label` Method
// ```php
// <?php

// namespace App\Enums;

// enum EmploymentType: string
// {
//     case FullTime = 'Full time';
//     case PartTime = 'Part time';
//     case Contract = 'Contract';
//     case Temporary = 'Temporary';
//     case Internship = 'Internship';
//     case Freelance = 'Freelance';

//     /**
//      * Get the display name for the enum value.
//      *
//      * @return string
//      */
//     public function label(): string
//     {
//         return match($this) {
//             EmploymentType::FullTime => 'Full-Time Employment',
//             EmploymentType::PartTime => 'Part-Time Employment',
//             EmploymentType::Contract => 'Contract-Based Employment',
//             EmploymentType::Temporary => 'Temporary Employment',
//             EmploymentType::Internship => 'Internship Opportunity',
//             EmploymentType::Freelance => 'Freelance Work',
//         };
//     }
// }
// ```

// ### Example Usage
// ```php
// use App\Enums\EmploymentType;

// // Assuming $job is an instance of a Job model
// $employmentType = EmploymentType::from($job->employment_type);

// // Displaying a user-friendly label
// echo $employmentType->label(); // Outputs: Full-Time Employment

// // Displaying the enum value directly
// echo $employmentType->value; // Outputs: Full time
// ```

// In this example, using `label()` provides a more descriptive and user-friendly string compared to directly using `enum->value`. This is especially beneficial in views and user interfaces where clarity and readability are important.