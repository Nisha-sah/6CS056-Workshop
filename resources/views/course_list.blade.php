
<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
</head>
<body>

    <h1>Courses</h1>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('courses.create') }}">Create Course</a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->user_id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }} weeks</td>
                    <td>${{ number_format($course->fee, 2) }}</td>
                    <td>{{ $course->difficulty }}</td>

                    <td>
                        <a href="{{ route('courses.show', $course) }}">
                            View
                        </a>

                        @can('manage-course', $course)

                            <a href="{{ route('courses.edit', $course) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('courses.destroy', $course) }}"
                                method="POST"
                                style="display:inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Delete
                                </button>
                            </form>

                        @endcan
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
