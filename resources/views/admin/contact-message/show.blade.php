<x-admin-app-layout :title="__('Message Details')">

    <div class="pb-3 flex justify-between">
        <div class="text-md md:text-2xl">{{ __('Message Details') }}</div>
        <div>
            <a class="text-primary-700 font-semibold bg-red-200 py-2 px-3 rounded"
                href="{{ route('admin.contact-message.index') }}">{{ __('Back') }}</a>
        </div>
    </div>

    <div class="w-full bg-white rounded shadow p-6">
        <div class="flex justify-end">
            <div class="bg-blue-200 p-3 rounded">
                {{ $message->created_at->format('d M, Y h:i A') }}
            </div>
        </div>
        <div class="w-full md:w-1/2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="mb-4">
                    <div class="font-semibold">{{ __('Name') }}</div>
                    <div>{{ $message->name }}</div>
                </div>
                <div class="mb-4">
                    <div class="font-semibold">{{ __('Email') }}</div>
                    <div>{{ $message->email }}</div>
                </div>
            </div>
            <!-- <div class="mb-4">
                <div class="font-semibold">{{ __('Subject') }}</div>
                <div>{{ $message->subject ?? 'N/A' }}</div>
            </div> -->
            <div class="mb-4">
                <div class="font-semibold">{{ __('Message') }}</div>
                <div>{{ $message->message }}</div>
            </div>

        </div>
        <div class="flex justify-end">
            <div class="bg-red-600 text-white p-3 rounded">
                <form action="{{ route('admin.contact-message.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white hover:text-red-200">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>