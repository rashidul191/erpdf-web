<x-admin-app-layout :title="__('User Details')">
    <div class="py-6 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('User Details') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.user.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="w-full bg-white flex flex-wrap justify-end p-4">
        <div class="w-full md:w-1/2 lg:w-1/3 flex justify-center p-2">
            <img class="h-64 w-64" src="{{ $user->avatar }}" alt="Avatar of {{ $user->name }}" />
        </div>
        <div class="w-full md:w-1/2 lg:w-2/3">
            <table>

                <tr>
                    <td class="p-2 font-semibold">{{ __('Name') }}</td>
                    <td class="p-2">{{ $user->name }}</td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">{{ __('Phone') }}</td>
                    <td class="p-2">{{ $user->phone }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-semibold">{{ __('Email') }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">{{ __('Address') }}</td>
                    <td class="p-2">{{ $user->address }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-semibold">{{ __('Area') }}</td>
                    <td class="p-2">{{ $subArea->area->area_name }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-semibold">{{ __('Subarea') }}</td>
                    <td class="p-2">{{ $subArea->sub_area_name }}</td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">{{ __('User ID') }}</td>
                    <td class="p-2">{{ $user->user_id }}</td>
                </tr>
                <tr>
                    <td class="p-2 font-semibold">{{ __('Username') }}</td>
                    <td class="p-2">{{ $user->username }}</td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">{{ __('Status') }}</td>
                    <td class="p-2">
                        @if (\App\Enums\UserStatus::Active == $user->status->value)
                            <span class="bg-green-600 px-1 rounded text-white"> {{ $user->status->key }}</span>
                        @else
                            <span class="bg-red-600 px-1 rounded text-white"> {{ $user->status->key }}</span>
                        @endif
                    </td>
                </tr>                  <tr>
                    <td class="p-2 font-semibold">{{ __('Email Verified') }}</td>
                    <td class="p-2 flex">
                        @if ($user->hasVerifiedEmail())
                            <div class="rounded bg-green-300 py-1 px-2 text-xs font-semibold text-green-800">
                                {{ __('Yes') }}</div>
                        @else
                            <div class="rounded bg-red-200 py-1 px-2 text-xs font-semibold text-red-800">
                                {{ __('No') }}</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>      <div class="w-full bg-white flex flex-wrap justify-end p-4">
        <div class="w-full md:w-1/2  p-2">
            <div class="w-full text-lg text-center py-2">Trade License</div>
            <img class="h-64 w-64 border mx-auto" src="{{ $user->trade_license }}" alt="Trade License" />
        </div>
        <div class="w-full md:w-1/2  p-2">
            <div class="w-full text-lg text-center py-2">Drag License</div>
            <img class="h-64 w-64 border mx-auto" src="{{ $user->drag_license }}" alt="Drag License" />
        </div>
    </div>

</x-admin-app-layout>
