<x-app-layout>
    <h1 class="text-2xl text-white">Index Transaction Page</h1>
    <a href="{{ route('transaction.create') }}" class="btn btn-primary">
        Create Transaction
    </a>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Comic</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td>
                            {{ $transaction->id }}
                        </td>
                        <td>
                            {{ $transaction->user_id }}
                        </td>
                        <td>
                            {{ $transaction->comic_id }}
                        </td>
                        <td>
                            {{ $transaction->created_at->diffForHumans() }}
                        </td>
                        <td>
                            {{ $transaction->updated_at->diffForHumans() }}
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>
