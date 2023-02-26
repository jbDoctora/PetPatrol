<x-NoNav>
    <div class="m-4 overflow-x-auto">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Lesson</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            @forelse($trainingDet as $trainings)
                <tbody>
                    <tr>
                        <th>{{ $trainings->day }}</th>
                        <td>{{ $trainings->lesson }}</td>
                        <td>{{ $trainings->start_time }}</td>
                        <td>{{ $trainings->end_time }}</td>
                    </tr>
                </tbody>
            @empty
                <tr>
                    <th>empty</th>
                    <td>empty</td>
                    <td>empty</td>
                    <td>empty</td>
                </tr>
                </tbody>
            @endforelse
        </table>
    </div>
</x-NoNav>
