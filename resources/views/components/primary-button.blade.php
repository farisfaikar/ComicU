<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block bg-transparent hover:bg-neutral-300 text-neutral-100 font-extrabold hover:text-neutral-900 py-2 px-4 border border-white-500 hover:border-transparent rounded focus:outline-none focus:ring focus:ring-white-200 focus:ring-offset-neutral-100']) }}>
    {{ $slot }}
</button>
