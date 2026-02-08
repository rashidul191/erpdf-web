<div class="relative" x-data="liveSearch()" x-cloak @click.outside="hideAll()" @keyup.escape="hideAll()">

    <!-- Search Box -->
    <div class="relative">
        <input type="text" x-model="searchText" @input.debounce.400ms="searchProducts" placeholder="Search Here..."
            class="py-1 rounded w-full" />

        <span class="absolute right-2 top-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
    </div>

    <!-- Suggestions Dropdown -->
    <div class="absolute left-0 w-full md:w-[280px] z-50">
        <div x-show="results.length > 0" x-transition
            class="w-full mt-2 border rounded-lg bg-white shadow-lg max-h-64 overflow-y-auto">

            <template x-for="product in results" :key="product.id">
                <div class="border-b last:border-b-0">
                    <div class="flex items-center justify-between px-1 md:px-3 py-2 hover:bg-gray-50">

                        <a :href="`/products/${product.id}`" class="flex items-center flex-1 space-x-3">
                            <img :src="product.image ?? '/images/no-image.png'" class="w-10 h-10 rounded"
                                alt="" />

                            <div>
                                <p class=" text-xs md:text-sm font-semibold text-gray-700"
                                    x-text="product.name.length > 25
                                        ? product.name.substring(0,25)+'...'
                                        : product.name">
                                </p>

                                <div class="text-xs">
                                    <span x-show="product.display_price.hasSale" class="line-through text-gray-400 mr-1"
                                        x-text="'TK ' + product.display_price.regular">
                                    </span>

                                    <p class="text-green-600 font-semibold"
                                        x-text="'TK ' + (product.display_price.hasSale
                ? product.display_price.sale
                : product.display_price.regular)">
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a :href="`/products/${product.id}`"
                            class="ml-2 bg-[#37b911] text-white text-xs md:text-sm px-3 py-1 rounded font-semibold">
                            Add
                        </a>

                    </div>
                </div>
            </template>
        </div>

        <!-- No Result -->
        <div x-show="!loading && searchText.length > 0 && results.length === 0"
            class="bg-white mt-2 text-red-500 text-center p-2">
            No products found.
        </div>
    </div>
</div>


<script>
    function liveSearch() {
        return {
            searchText: '',
            results: [],
            loading: false,

            searchProducts() {
                if (this.searchText.length < 1) {
                    this.results = [];
                    return;
                }

                this.loading = true;

                fetch(`/products-search?search_text=${encodeURIComponent(this.searchText)}`)
                    .then(res => res.json())
                    .then(data => {
                        this.results = data;
                        this.loading = false;
                    })
                    .catch(() => {
                        this.results = [];
                        this.loading = false;
                    });
            },

            hideAll() {
                this.results = [];
            }
        }
    }
</script>
