<table class="w-full">
    <thead class="bg-white border-b">
        <tr>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                ID
            </th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Name
            </th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Created at
            </th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Operation
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($taskCategories as $taskCategory)
            <tr class="bg-gray-100 border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $taskCategory->id }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $taskCategory->name }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $taskCategory->created_at->format('Y/m/d H:i:s') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="opration-btn-list">
                        <a class="operation-btn -detail"href="{{ route('task-categories.edit', ['task_category' => $taskCategory->id]) }}">Edit</a>
                        <button type="button" class="operation-btn -detail del-btn" data-id="{{ $taskCategory->id }}" data-type="task-categories">Delete</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>