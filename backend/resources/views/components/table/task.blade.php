<table class="w-full">
    <thead class="bg-white border-b">
        <tr>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                ID
            </th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Title
            </th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Category name
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
        @foreach ($tasks as $task)
            <tr class="bg-gray-100 border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $task->id }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $task->title }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $task->category->name }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $task->created_at->format('Y/m/d H:i:s') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="opration-btn-list">
                        <a class="operation-btn"href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
                        <button type="button" class="operation-btn del-btn" data-id="{{ $task->id }}" data-type="tasks">Delete</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>