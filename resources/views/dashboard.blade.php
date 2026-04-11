<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:20px;">
    
    <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Heading -->
        <h2 class="text-2xl font-bold mb-6">Survey Dashboard</h2>

        <!-- Action Buttons -->
        <div class="flex gap-4 mb-8">
            <a href="/upload" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                ⬆️ Upload Survey
            </a>

            <a href="/admin" class="bg-green-500 text-black px-4 py-2 rounded hover:bg-green-600">
                📊 View All Surveys
            </a>
        </div>

        <!-- Survey List -->
        <div class="bg-white shadow rounded p-6">
            <h3 class="text-lg font-semibold mb-4">Your Surveys</h3>

            @if(count($surveys) > 0)
                <div class="space-y-3">
                    @foreach($surveys as $survey)
                        <div class="flex justify-between items-center border p-3 rounded">
                            
                            <div>
                                <p class="font-medium">{{ $survey->name }}</p>
                                <p class="text-sm text-gray-500">{{ $survey->slug }}</p>
                            </div>

                            <div class="flex gap-2">
                                <a href="/survey/{{ $survey->slug }}" 
                                   class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">
                                    View
                                </a>

                                <a href="/admin/results/{{ $survey->id }}" 
                                   class="bg-blue-200 px-3 py-1 rounded hover:bg-blue-300">
                                    Results
                                </a>

                                <a href="/admin/toggle/{{ $survey->id }}" 
                                   class="bg-yellow-200 px-3 py-1 rounded hover:bg-yellow-300">
                                    {{ $survey->is_active ? 'Disable' : 'Enable' }}
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No surveys created yet.</p>
            @endif

        </div>

    </div>
</div>
</x-app-layout>
