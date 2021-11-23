<div
     x-data="{content: @entangle($attributes->wire('model')),...setupEditor()}"
     x-init="() => init($refs.editor)"
     wire:ignore
     {{ $attributes->whereDoesntStartWith('wire:model') }}>

    <!-- The Controls -->
    <template x-if="editor">
        <div class="mb-2 flex">

            <!-- bold -->
            <button
                    class="flex items-center p-2 bg-gray-200 shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().toggleBold().focus().run()"
                    :class="{ 'is-active bg-gray-300 fill-current font-bold': editor.isActive('bold') }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                    <path d="M8 11h4.5a2.5 2.5 0 1 0 0-5H8v5zm10 4.5a4.5 4.5 0 0 1-4.5 4.5H6V4h6.5a4.5 4.5 0 0 1 3.256 7.606A4.498 4.498 0 0 1 18 15.5zM8 13v5h5.5a2.5 2.5 0 1 0 0-5H8z" />
                </svg>
            </button>

            <!-- image -->
            <label
                   class="flex items-center p-2 bg-gray-200 shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                   @click="editor.chain().toggleBold().focus().run()"
                   :class="{ 'is-active bg-gray-300 fill-current font-bold': editor.isActive('bold') }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M4.828 21l-.02.02-.021-.02H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H4.828zM20 15V5H4v14L14 9l6 6zm0 2.828l-6-6L6.828 19H20v-1.172zM8 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                </svg>
                <input type="file" class="hidden">
            </label>

            <!-- list -->
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleOrderedList().run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('orderedList') }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                </svg>
            </button>

            <button
                    class="flex items-center p-2 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleItalic().run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('italic') }">italic</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().setParagraph().run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('paragraph') }"> paragraph</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 1}) }">h1</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 2}) }">h2</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 3}) }">h3</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 4}) }">h4</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleHeading({ level: 5 }).run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 5}) }">h5</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleHeading({ level: 6 }).run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 6}) }">h6</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleBulletList().run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('bulletList') }">bullet list</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleCodeBlock().run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('codeBlock') }">code block</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().toggleBlockquote().run()"
                    :class="{ 'is-active bg-gray-600 text-white': editor.isActive('blockquote') }">blockquote</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().undo().run()">undo</button>
            <button
                    class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                    @click="editor.chain().focus().redo().run()">redo</button>
        </div>
    </template>

    <!-- The editor -->
    <div x-ref="editor" class="prose py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent"></div>
</div>