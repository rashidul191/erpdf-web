<x-guest-layout>

    <!-- CONTENT START -->
    <div class="page-content">


        <!-- INNER PAGE BANNER -->
        <x-page-banner :title="$category->name ?? null" :image="getRawImage($category, 'image', true) ?? null" />
        <!-- INNER PAGE BANNER END -->

        @if($documents->count() > 0)
            <!-- SECTION CONTENT START -->
            <div class="section-full py-5">
                <div class="container">

                    <div class="card border-0">
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table align-middle mb-0 text-center">

                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($documents as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>

                                                <td class="fw-semibold">
                                                    {{ $item->name }}
                                                </td>

                                                <td>
                                                    <a href="{{ $item->file }}" download="{{ $item->name }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="icofont-download"></i> Download
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4 text-danger fw-bold">
                                                    No documents found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- SECTION CONTENT END -->
        @else
            <div class="section-full py-5 my-5 text-center">
                <h3 class="text-danger">Content Not Aviable!</h3>
            </div>
        @endif

    </div>
    <!-- CONTENT END -->

</x-guest-layout>
