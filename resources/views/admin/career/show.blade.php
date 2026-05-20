<x-admin-app-layout :title="__('Application Details')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Application Details') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.career.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <!-- Details Card -->
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        {{-- Header --}}
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-6 py-5 border-b border-gray-100">

            <div class="flex items-center gap-4">
                {{-- Avatar --}}
                <div class="w-16 h-16 rounded-xl overflow-hidden border border-gray-200 bg-blue-50 flex-shrink-0">
                    <img src="{{ asset($career->image) }}" alt="{{ $career->name }}" class="w-full h-full object-cover">
                </div>

                {{-- Name & badge --}}
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 leading-tight">
                        {{ $career->name }}
                    </h2>
                    @if($career->occupation)
                        <span
                            class="inline-flex items-center gap-1 mt-1 text-xs font-medium text-green-800 bg-green-50 border border-green-100 rounded px-2 py-0.5">
                            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="7" width="20" height="14" rx="2" />
                                <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                            </svg>
                            {{ $career->occupation }}
                        </span>
                    @endif
                </div>
            </div>

            {{-- Delete button --}}
            <form action="{{ route('admin.career.destroy', $career->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center gap-1.5 text-sm font-medium text-red-700 bg-red-50 border border-red-200 hover:bg-red-100 transition rounded-lg px-3 py-2"
                    onclick="return confirm('Are you sure you want to delete this applicant?')">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                        <path d="M10 11v6M14 11v6" />
                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                    </svg>
                    Delete
                </button>
            </form>
        </div>

        {{-- Info Grid --}}
        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-gray-100 border-b border-gray-100">

            <div class="px-6 py-4">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1 flex items-center gap-1">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Full name
                </p>
                <p class="text-sm font-semibold text-gray-800">{{ $career->name }}</p>
            </div>

            <div class="px-6 py-4">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1 flex items-center gap-1">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.8 19.8 0 0 1-3-8.54A2 2 0 0 1 3.12 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L7.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 21 16.92z" />
                    </svg>
                    Phone number
                </p>
                <p class="text-sm font-semibold text-gray-800">{{ $career->phone }}</p>
            </div>

            <div class="px-6 py-4">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1 flex items-center gap-1">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="4" width="20" height="16" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                    Email address
                </p>
                <p class="text-sm font-semibold text-gray-800">{{ $career->email ?? 'N/A' }}</p>
            </div>

            <div class="px-6 py-4 sm:border-t border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1 flex items-center gap-1">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M16 2v4M8 2v4M3 10h18" />
                    </svg>
                    Birth date
                </p>
                <p class="text-sm font-semibold text-gray-800">{{ $career->birth_date }}</p>
            </div>

            <div class="px-6 py-4 sm:border-t border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1 flex items-center gap-1">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                        <path d="M6 12v5c3 3 9 3 12 0v-5" />
                    </svg>
                    Education
                </p>
                <p class="text-sm font-semibold text-gray-800">{{ $career->education ?? 'N/A' }}</p>
            </div>

            <div class="px-6 py-4 sm:border-t border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1 flex items-center gap-1">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" />
                        <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                    </svg>
                    Occupation
                </p>
                <p class="text-sm font-semibold text-gray-800">{{ $career->occupation ?? 'N/A' }}</p>
            </div>

        </div>

        {{-- Address --}}
        <div class="px-6 py-5">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3 flex items-center gap-1">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
                Address
            </p>
            <div class="bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm text-gray-700 leading-relaxed">
                {{ $career->address }}
            </div>
        </div>

    </div>

</x-admin-app-layout>
