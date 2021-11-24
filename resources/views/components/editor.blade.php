<div
     x-data="{
         content: @entangle($attributes->wire('model')),
         ...setupEditor()
        }"
     x-init="() => init($refs.editor)"
     wire:ignore
     {{ $attributes->whereDoesntStartWith('wire:model') }}>

        <!-- The Controls -->
        <template x-if="editor">
                <div class="flex items-center justify-start p-4 space-x-1 border-b border-gray-300 menu">

                        <!-- Bold -->
                        <button
                                class="flex items-center justify-center w-8 h-8 -ml-2 rounded hover:bg-gray-100 hover:text-gray-700"
                                @click="editor.chain().toggleBold().focus().run()"
                                :class="{ 'bg-gray-300 text-gray-700': editor.isActive('bold') }">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 2a1 1 0 00-1 1v10a1 1 0 001 1h5.5a3.5 3.5 0 001.852-6.47A3.5 3.5 0 008.5 2H4zm4.5 5a1.5 1.5 0 100-3H5v3h3.5zM5 9v3h4.5a1.5 1.5 0 000-3H5z" />
                                </svg>
                        </button>

                        <!-- Image -->
                        <label
                               class="flex items-center justify-center w-8 h-8 text-gray-600 rounded hover:bg-gray-100 hover:text-gray-700 cursor-pointer"
                               @click="editor.chain().toggleBold().focus().run()"
                               :class="{ 'is-active bg-gray-300 fill-current font-bold': editor.isActive('image') }">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.75 2.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h.94a.76.76 0 01.03-.03l6.077-6.078a1.75 1.75 0 012.412-.06L14.5 10.31V2.75a.25.25 0 00-.25-.25H1.75zm12.5 11H4.81l5.048-5.047a.25.25 0 01.344-.009l4.298 3.889v.917a.25.25 0 01-.25.25zm1.75-.25V2.75A1.75 1.75 0 0014.25 1H1.75A1.75 1.75 0 000 2.75v10.5C0 14.216.784 15 1.75 15h12.5A1.75 1.75 0 0016 13.25zM5.5 6a.5.5 0 11-1 0 .5.5 0 011 0zM7 6a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <input type="file" class="hidden" onchange="uploadImage">
                        </label>

                        <!-- List -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleOrderedList().run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('orderedList') }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                        </button>

                        <!-- Italic -->
                        <button
                                class="flex items-center p-2 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleItalic().run()"
                                :class="{ ' is-active bg-gray-600 text-white font-extrabold ': editor.isActive('italic') }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M15 20H7v-2h2.927l2.116-12H9V4h8v2h-2.927l-2.116 12H15z" />
                                </svg>
                        </button>

                        <!-- Paragraph -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().setParagraph().run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('paragraph') }"> paragraph</button>

                        <!-- Haeder 1 -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 1}) }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                                        <path fill="none" d="M0 0H24V24H0z" />
                                        <path d="M13 20h-2v-7H4v7H2V4h2v7h7V4h2v16zm8-12v12h-2v-9.796l-2 .536V8.67L19.5 8H21z" />
                                </svg>
                        </button>

                        <!-- Haeder 2 -->
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