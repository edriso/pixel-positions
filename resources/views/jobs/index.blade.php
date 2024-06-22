<x-layout>
    <div class="space-y-10">
        <section class="pt-6 text-center">
            <h1 class="text-4xl font-bold">Let's Find Your Next Job</h1>

            <form action="" class="mt-6">
                <input type="text" placeholder="Web Developer..."
                    class="w-full max-w-xl px-5 py-4 rounded-xl bg-white/5 border-white/10" />
            </form>
        </section>

        <section class="pt-10">
            <x-section-heading>Featured jobs</x-section-heading>

            <div class="grid gap-8 mt-6 lg:grid-cols-3">
                @foreach ($featured_jobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="mt-6 space-x-1 space-y-2">
                @foreach ($tags as $tag)
                    {{-- <x-tag :tag="$tag" /> --}}
                    <x-tag :$tag />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Regular jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach ($regular_jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
