<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Name: {{ $employee->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h3>
                        <p class="mt-1 text-lg font-semibold">{{ $employee->description }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Department</h3>
                        <p class="mt-1 text-lg font-semibold">{{ $employee->department }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Salary</h3>
                        <p class="mt-1 text-lg font-semibold text-green-600 dark:text-green-400">
                            ${{ number_format($employee->salary, 2) }}
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h3>
                        <p class="mt-1 text-base">{{ $employee->description ?? 'There is no description' }}</p>
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-all">
                        Back to the employees
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>