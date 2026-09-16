<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
                
                <div class="bg-gradient-to-r from-indigo-500 to-blue-600 h-20 relative p-6 flex items-center justify-between">
                    <h3 class="text-white text-lg font-bold tracking-tight">Employee Details</h3>
                    <span class="bg-white/20 backdrop-blur-md text-white text-xs font-mono font-bold px-3 py-1 rounded-lg border border-white/30 shadow-sm">
                        New Record
                    </span>
                </div>

                <form action="{{ route('employees.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 dark:text-white uppercase tracking-wider mb-1.5">Full Name</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. John Doe" required 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 dark:text-white uppercase tracking-wider mb-1.5">Department</label>
                        <input type="text" name="department" value="{{ old('department') }}" placeholder="e.g. Engineering" required 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        @error('department') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 dark:text-white uppercase tracking-wider mb-1.5">description</label>
                        <input type="text" name="description" value="{{ old('description') }}" placeholder="e.g. Engineering" 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>


                    <div>
                        <label class="block text-xs font-semibold text-gray-500 dark:text-white uppercase tracking-wider mb-1.5">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="e.g. Cairo, Egypt" 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        @error('address') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 dark:text-white uppercase tracking-wider mb-1.5">Salary ($/mo)</label>
                        <input type="number" step="0.01" name="salary" value="{{ old('salary') }}" placeholder="e.g. 3500" required 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        @error('salary') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>


                    <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end gap-3">
                        <a href="{{ route('dashboard') }}" 
                            class="px-4 py-2.5 bg-gray-50 dark:bg-gray-700 hover:bg-gray-8/800 border border-gray-200 dark:border-gray-600 text-gray-600 dark:text-gray-200 text-xs font-semibold rounded-xl transition-all">
                            Cancel
                        </a>
                        <button type="submit" 
                            class="bg-gray-900 dark:bg-indigo-600 hover:bg-gray-800 dark:hover:bg-indigo-700 text-white text-xs font-semibold py-2.5 px-6 rounded-xl active:scale-[0.98] transition-all">
                            Save Employee
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>