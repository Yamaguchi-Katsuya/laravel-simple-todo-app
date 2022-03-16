<link rel="stylesheet" href="{{ asset('css/list.css') }}">
<script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>