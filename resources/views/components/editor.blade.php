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
                                class="flex items-center justify-center w-8 h-8 -ml-2 rounded hover:bg-gray-300 hover:text-gray-700"
                                @click="editor.chain().toggleBold().focus().run()"
                                :class="{ 'is-active bg-gray-200 text-gray-700': editor.isActive('bold') }">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 2a1 1 0 00-1 1v10a1 1 0 001 1h5.5a3.5 3.5 0 001.852-6.47A3.5 3.5 0 008.5 2H4zm4.5 5a1.5 1.5 0 100-3H5v3h3.5zM5 9v3h4.5a1.5 1.5 0 000-3H5z" />
                                </svg>
                        </button>

                        <!-- Image -->
                        <label
                               class="flex items-center justify-center w-8 h-8 -ml-2 rounded hover:bg-gray-300 hover:text-gray-700"
                               @click="editor.chain().toggleBold().focus().run()"
                               :class="{ 'is-active bg-gray-200 text-gray-700': editor.isActive('image') }">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.75 2.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h.94a.76.76 0 01.03-.03l6.077-6.078a1.75 1.75 0 012.412-.06L14.5 10.31V2.75a.25.25 0 00-.25-.25H1.75zm12.5 11H4.81l5.048-5.047a.25.25 0 01.344-.009l4.298 3.889v.917a.25.25 0 01-.25.25zm1.75-.25V2.75A1.75 1.75 0 0014.25 1H1.75A1.75 1.75 0 000 2.75v10.5C0 14.216.784 15 1.75 15h12.5A1.75 1.75 0 0016 13.25zM5.5 6a.5.5 0 11-1 0 .5.5 0 011 0zM7 6a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <input type="file" class="hidden" onchange="uploadImage">
                        </label>

                        <!-- Orderd List -->
                        <button
                                class="flex items-center justify-center w-8 h-8 -ml-2 rounded hover:bg-gray-300 hover:text-gray-700"
                                @click="editor.chain().focus().toggleOrderedList().run()"
                                :class="{ 'is-active bg-gray-200 text-gray-700': editor.isActive('orderedList') }">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                        </button>

                        <!-- Italic -->
                        <button
                                class="flex items-center justify-center w-8 h-8 -ml-2 rounded hover:bg-gray-300 hover:text-gray-700"
                                @click="editor.chain().focus().toggleItalic().run()"
                                :class="{ 'is-active bg-gray-200 text-gray-700': editor.isActive('italic') }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M15 20H7v-2h2.927l2.116-12H9V4h8v2h-2.927l-2.116 12H15z" />
                                </svg>
                        </button>

                        <!-- Link -->
                        <button
                                class="flex items-center justify-center w-8 h-8 -ml-2 rounded hover:bg-gray-300 hover:text-gray-700"
                                @click="setLink"
                                :class="{ 'is-active bg-gray-200 text-gray-700': editor.isActive('link') }">
                                <!-- icon: go-link-16 -->
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z" />
                                </svg>
                        </button>

                        <!-- Paragraph -->
                        <button
                                class="flex items-center justify-center w-8 h-8 -ml-2 rounded hover:bg-gray-300 hover:text-gray-700"
                                @click="editor.chain().focus().setParagraph().run()"
                                :class="{ 'is-active bg-gray-200 text-gray-700': editor.isActive('paragraph') }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M12 6v15h-2v-5a6 6 0 1 1 0-12h10v2h-3v15h-2V6h-3zm-2 0a4 4 0 1 0 0 8V6z" />
                                </svg>
                        </button>

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
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 2}) }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0H24V24H0z" />
                                        <path d="M4 4v7h7V4h2v16h-2v-7H4v7H2V4h2zm14.5 4c2.071 0 3.75 1.679 3.75 3.75 0 .857-.288 1.648-.772 2.28l-.148.18L18.034 18H22v2h-7v-1.556l4.82-5.546c.268-.307.43-.709.43-1.148 0-.966-.784-1.75-1.75-1.75-.918 0-1.671.707-1.744 1.606l-.006.144h-2C14.75 9.679 16.429 8 18.5 8z" />
                                </svg>
                        </button>

                        <!-- Haeder 3 -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 3}) }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0H24V24H0z" />
                                        <path d="M22 8l-.002 2-2.505 2.883c1.59.435 2.757 1.89 2.757 3.617 0 2.071-1.679 3.75-3.75 3.75-1.826 0-3.347-1.305-3.682-3.033l1.964-.382c.156.806.866 1.415 1.718 1.415.966 0 1.75-.784 1.75-1.75s-.784-1.75-1.75-1.75c-.286 0-.556.069-.794.19l-1.307-1.547L19.35 10H15V8h7zM4 4v7h7V4h2v16h-2v-7H4v7H2V4h2z" />
                                </svg>
                        </button>

                        <!-- Haeder 4 -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 4}) }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0H24V24H0z" />
                                        <path d="M13 20h-2v-7H4v7H2V4h2v7h7V4h2v16zm9-12v8h1.5v2H22v2h-2v-2h-5.5v-1.34l5-8.66H22zm-2 3.133L17.19 16H20v-4.867z" />
                                </svg>
                        </button>

                        <!-- Haeder 5 -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleHeading({ level: 5 }).run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 5}) }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0H24V24H0z" />
                                        <path d="M22 8v2h-4.323l-.464 2.636c.33-.089.678-.136 1.037-.136 2.21 0 4 1.79 4 4s-1.79 4-4 4c-1.827 0-3.367-1.224-3.846-2.897l1.923-.551c.24.836 1.01 1.448 1.923 1.448 1.105 0 2-.895 2-2s-.895-2-2-2c-.63 0-1.193.292-1.56.748l-1.81-.904L16 8h6zM4 4v7h7V4h2v16h-2v-7H4v7H2V4h2z" />
                                </svg>
                        </button>

                        <!-- Haeder 6 -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleHeading({ level: 6 }).run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('heading', { level: 6}) }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0H24V24H0z" />
                                        <path d="M21.097 8l-2.598 4.5c2.21 0 4.001 1.79 4.001 4s-1.79 4-4 4-4-1.79-4-4c0-.736.199-1.426.546-2.019L18.788 8h2.309zM4 4v7h7V4h2v16h-2v-7H4v7H2V4h2zm14.5 10.5c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2z" />
                                </svg>
                        </button>

                        <!-- Bullet List -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleBulletList().run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('bulletList') }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                        </button>

                        <!-- Code Block -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleCodeBlock().run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('codeBlock') }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M23 12l-7.071 7.071-1.414-1.414L20.172 12l-5.657-5.657 1.414-1.414L23 12zM3.828 12l5.657 5.657-1.414 1.414L1 12l7.071-7.071 1.414 1.414L3.828 12z" />
                                </svg>
                        </button>

                        <!-- Block Quote -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().toggleBlockquote().run()"
                                :class="{ 'is-active bg-gray-600 text-white': editor.isActive('blockquote') }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z" />
                                </svg>
                        </button>

                        <!-- Undo -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().undo().run()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M5.828 7l2.536 2.536L6.95 10.95 2 6l4.95-4.95 1.414 1.414L5.828 5H13a8 8 0 1 1 0 16H4v-2h9a6 6 0 1 0 0-12H5.828z" />
                                </svg>
                        </button>

                        <!-- Redo -->
                        <button
                                class="flex items-center px-3 py-1 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"
                                @click="editor.chain().focus().redo().run()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M18.172 7H11a6 6 0 1 0 0 12h9v2h-9a8 8 0 1 1 0-16h7.172l-2.536-2.536L17.05 1.05 22 6l-4.95 4.95-1.414-1.414L18.172 7z" />
                                </svg>
                        </button>
                </div>
        </template>

        <!-- The editor -->
        <div x-ref="editor" class="prose py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent"></div>
</div>