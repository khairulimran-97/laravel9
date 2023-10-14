<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Function') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('posts.create')}}">Add new post </a>
                    <br /><br />
                    <table>
                        <thead><tr>
                            <th>Name</th>
                            <th>Text</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->post_text}}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        <a href="{{route('posts.edit', $post)}}">Edit</a>
                                        <form id="deleteForm{{$post->id}}" method="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" form="deleteForm{{$post->id}}">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
