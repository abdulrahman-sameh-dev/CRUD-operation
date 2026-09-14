<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl text-white mb-4 font-bold">Employees</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-3 gap-4">
                    @forelse($employees as $employee)
                    <div class="w-full bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                        <div class="bg-gradient-to-r from-indigo-500 to-blue-600 h-20 relative p-4 flex items-start justify-between">
                            <span class="bg-white/20 -mt-2 backdrop-blur-md text-white text-xs font-mono font-bold px-3 py-1 rounded-lg border border-white/30 shadow-sm">
                                ID: {{ $employee->id }}
                            </span>
                        </div>

                        <div class="p-6 pt-4 relative">

                            <div class="absolute -top-10 left-6 w-16 h-16 bg-gradient-to-tr from-indigo-100 to-blue-50 rounded-xl border-4 border-white dark:border-gray-800 shadow-md flex items-center justify-center text-3xl font-semibold text-indigo-600">
                            {{ str($employee->title)->substr(0, 1)->upper()}}{{str($employee->title[1])->upper()}}
                            </div>

                            <div class="mb-5 mt-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white tracking-tight mb-1">
                                    {{ $employee->title }}
                                </h3>
                                <span class="inline-flex items-center text-xs font-semibold text-indigo-700 bg-indigo-50 px-2.5 py-1 rounded-md">
                                    {{ $employee->description }}
                                </span>
                            </div>

                            <div class="space-y-3.5 border-t border-gray-100 dark:border-gray-700 pt-4 text-sm">
                            <div class="flex items-center justify-between">
                                    <span class="text-gray-400 font-medium flex items-center gap-1.5">
                                        Jop Title
                                    </span>
                                    <span class="text-gray-700 dark:text-gray-300 font-medium text-right">
                                        {{ $employee->department }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-400 font-medium flex items-center gap-1.5">
                                        Address
                                    </span>
                                    <span class="text-gray-700 dark:text-gray-300 font-medium text-right">
                                        {{ $employee->address }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-gray-400 font-medium flex items-center gap-1.5">
                                        Salary
                                    </span>
                                    <span class="text-gray-900 dark:text-white font-bold text-right">
                                        ${{ number_format($employee->salary) }}/ mo
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700 flex gap-2">
                                <x-button :href="route('employees.show', $employee->id)" class="w-full bg-gray-900 dark:bg-gray-700 hover:bg-gray-900/40 text-white text-[16px] font-semibold py-2.5 px-4 rounded-xl active:scale-[0.98] transition-all">
                                        View Profile
                                </x-button>
                                <form action="/dashboard/{{$employee->id}}/delete" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <x-button type="submit" variant="destructive" class="bg-gray-50 dark:bg-red-700 hover:bg-red-800 border border-gray-200 dark:border-gray-600 text-gray-600 dark:text-gray-200 rounded-xl p-2.5 active:scale-[0.98] transition-all" title="Edit">
                                        Delete
                                    </x-button>
                                </form>
                            </div>

                        </div>
                    </div>
                    @empty
                    <div class="col-span-full p-8 text-center bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700">
                        <h2 class="text-gray-500 dark:text-gray-400 text-lg font-medium">There are no employees to display.</h2>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
