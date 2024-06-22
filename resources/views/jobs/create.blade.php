@php
    use App\Enums\EmploymentType;
@endphp

<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="CEO" />
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD" />
        <x-forms.input label="Location" name="location" placeholder="Tokyo, Japan" />

        <x-forms.select label="Type" name="employment_type">
            {{-- <option class="text-black">Part time</option> --}}
            @foreach (EmploymentType::cases() as $type)
                <option value="{{ $type->value }}" class="text-black">{{ $type->label() }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="is_featured" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="laracasts, video, education" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
