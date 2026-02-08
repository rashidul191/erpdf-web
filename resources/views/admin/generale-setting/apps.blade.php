<x-admin-app-layout>
    <div class="mt-4 bg-white w-full md:w-1/2 p-4">
        <div class="w-full mt-4">
            <form action="{{ route('admin.apps.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap items-center w-full">
                    <x-labeled-input type="file" name="apps" accept=".apk,application/vnd.android.package-archive" class="w-full" />
                </div>

                @php
                    $apkSetting = \App\Models\Admin\BusinessSetting::where('key', 'apps')->first();
                    $apkPath = $apkSetting ? $apkSetting->value : null;
                @endphp

                @if ($apkPath)
                    <div class="mt-2 text-sm">
                        Download APK:
                        <a href="{{ Storage::url($apkPath) }}" download class="text-blue-600 hover:underline">
                            {{ basename($apkPath) }}
                        </a>
                        <span class="text-gray-500 ml-2">
                            ({{ round(Storage::disk('public')->size($apkPath) / 1024 / 1024, 2) }} MB)
                        </span>
                    </div>
                @endif

                <div class="w-full pt-4 flex justify-end">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </form>
        </div>      </div>
</x-admin-app-layout>
