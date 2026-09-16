<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Employee Profile: {{ $employee->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
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

                        <div class="mb-6 mt-6 flex flex-col gap-2">
                            <input value="{{ old('title', $employee->title) }}" name="title" class="font-semibold bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none w-fit bg-transparent text-2xl block">
                            @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <textarea name="description" class="dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-md text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all items-center text-md font-semibold bg-indigo-50 dark:bg-indigo-900/40 p-0 px-2 text-start">{{ old('description', $employee->description) }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-4 border-t border-gray-100 dark:border-gray-700 pt-6 text-sm">
                            <div class="flex items-center justify-between py-1">
                                <span class="font-medium text-lg text-white">Job Title / Department</span>
                                <input name="department" value="{{ old('department', $employee->department) }}" class="dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-md text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all items-center text-md font-semibold bg-indigo-50 dark:bg-indigo-900/40 px-2 text-end">
                                @error('department')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between py-1">
                                <span class="text-lg text-white font-medium">Address</span>
                                <input name="address" value="{{ old('address', $employee->address) }}" class="dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-md text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all items-center text-md font-semibold bg-indigo-50 dark:bg-indigo-900/40 px-2 text-end">
                                @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between py-1">
                                <span class="text-lg text-white font-medium">Salary</span>
                                <input
                                    type="number"
                                    id="id"
                                    name="salary"
                                    placeholder="placeholder"
                                    value="{{ old('salary', $employee->salary) }}"
                                    class="dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-md text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all items-center text-md font-semibold bg-indigo-50 dark:bg-indigo-900/40 px-2 text-end" />
                                @error('salary')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700 flex flex-wrap items-center justify-between gap-3">

                            <a href="{{ route('employees.show', $employee->id) }}" class="inline-flex items-center justify-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-semibold py-2.5 px-5 rounded-xl transition-all">
                                Cancel
                            </a>

                            <div class="flex items-center gap-3">
                                <button type="submit" class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-md hover:shadow-indigo-500/20 active:scale-[0.98] transition-all">
                                    Save Ubdates
                                </button>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>