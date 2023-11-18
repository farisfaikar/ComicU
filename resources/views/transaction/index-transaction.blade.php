<x-app-layout>
    <section class="p-5">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-2xl font-bold">Transaction List</h2>
            <a href="{{ route('transaction.create') }}" class="btn btn-primary">Create Transaction</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="uppercase">
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
                        <tr>
                            <td colspan="5" class="text-center">
                                There are no transactions.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
