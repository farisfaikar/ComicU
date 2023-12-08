<!-- resources/views/contact/index-contact.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Contact List') }}
        </h2>
    </x-slot>

    <section class="p-5">
        <div class="mt-5 overflow-x-auto">
            <table class="table table-auto">
                <!-- head -->
                <thead class="text-xs text-gray-300 uppercase bg-neutral-950">
                    <tr>
                        <th>no</th>
                        <th>name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>send_copy</th>
                        <th>created_at</th>
                    </tr>
                </thead>
                <tbody class="border-b bg-neutral-900 border-neutral-900">
                    @forelse ($contacts as $key => $contact)
                        <tr class="border-b border-neutral-800">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ $contacts->firstitem() + $key }} </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ $contact->name }} </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ $contact->email }} </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"> {{ $contact->message }} </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"> {{ $contact->send_copy ? 'Yes' : 'No' }} </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"> {{ $contact->created_at }} </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                There are no contacts.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{ $contacts->links() }}
        </div>
    </section>
</x-app-layout>
