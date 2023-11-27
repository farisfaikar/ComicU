<x-app-layout>
    <section class="p-5">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-2xl font-bold">Transaction List</h2>
            <a href="{{ route('transaction.create') }}" type="button" class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                Create Transaction
            </a>
        </div>

        <div class="overflow-x-auto mt-5">
            <table class="table">
                <!-- head -->
                <thead class="text-xs text-gray-300 uppercase bg-neutral-950">
                    <tr class="uppercase">
                        <th>ID</th>
                        <th>User</th>
                        <th>Comic</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody class="bg-neutral-900 border-b border-neutral-900">
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>
                                {{ $transaction->id }}
                            </td>
                            <td>
                                @if ($transaction->user_id !== null)
                                    <p>{{ $transaction->user->name }}</p>
                                @else
                                    No user.
                                @endif
                            </td>
                            <td>
                                @if ($transaction->comic_id !== null)
                                    <p>{{ $transaction->comic->comic_name }}</p>
                                @else
                                    No comic.
                                @endif
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
