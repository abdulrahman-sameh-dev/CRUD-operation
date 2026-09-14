<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Employee Profile: {{ $employee->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-indigo-500 to-blue-600 h-28 relative p-6 flex items-start justify-between">
                    <span class="bg-white/20 backdrop-blur-md text-white text-xs font-mono font-bold px-3.5 py-1.5 rounded-lg border border-white/30 shadow-sm">
                        ID: {{ $employee->id }}
                    </span>
                </div>

                <div class="p-8 pt-4 relative">

                    <div class="absolute -top-12 left-8 w-20 h-20 bg-gradient-to-tr from-indigo-100 to-blue-50 dark:from-indigo-950 dark:to-blue-900 rounded-2xl border-4 border-white dark:border-gray-800 shadow-lg flex items-center justify-center text-3xl font-bold text-indigo-600 dark:text-indigo-400">
                        {{ str($employee->title)->substr(0, 1)->upper() }}{{ str($employee->title)->substr(1, 1)->upper() }}
                    </div>

                    <div class="mb-6 mt-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight mb-2">
                            {{ $employee->title }}
                        </h3>
                        @if($employee->description)
                            <span class="inline-flex items-center text-xs font-semibold text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/40 px-3 py-1 rounded-md">
                                {{ $employee->description }}
                            </span>
                        @endif
                    </div>

                    <div class="space-y-4 border-t border-gray-100 dark:border-gray-700 pt-6 text-sm">
                        <div class="flex items-center justify-between py-1">
                            <span class="text-gray-400 font-medium">Job Title / Department</span>
                            <span class="text-gray-900 dark:text-gray-100 font-semibold">
                                {{ $employee->department }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between py-1">
                            <span class="text-gray-400 font-medium">Address</span>
                            <span class="text-gray-900 dark:text-gray-100 font-semibold">
                                {{ $employee->address ?? 'N/A' }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between py-1">
                            <span class="text-gray-400 font-medium">Salary</span>
                            <span class="text-indigo-600 dark:text-indigo-400 font-bold text-base">
                                ${{ number_format($employee->salary, 2) }} / mo
                            </span>
                        </div>

                        <div class="flex items-center justify-between py-1">
                            <span class="text-gray-400 font-medium">Created At</span>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">
                                {{ $employee->created_at?->format('Y-m-d') }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700 flex flex-wrap items-center justify-between gap-3">
                        
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-semibold py-2.5 px-5 rounded-xl transition-all">
                            Back to Dashboard
                        </a>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-md hover:shadow-indigo-500/20 active:scale-[0.98] transition-all">
                                Edit Employee
                            </a>

                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="bg-red-50 dark:bg-red-950/40 hover:bg-red-100 dark:hover:bg-red-900/60 border border-red-200 dark:border-red-800 text-red-600 dark:text-red-400 font-semibold py-2.5 px-5 rounded-xl active:scale-[0.98] transition-all">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>