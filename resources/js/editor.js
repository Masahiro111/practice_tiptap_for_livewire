
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

window.setupEditor = function() {
    return {
        editor: null,
        init(element) {
            this.editor = new Editor({
                element: element,
                content: 'hello',
                updateAt: Date.now(),
                extensions: [
                    StarterKit
                ],
                onUpdate: ({ editor }) => {
                    this.content = editor.getHTML()
                },
                onSelectionUpdate: () =>{
                    this.updateAt = Date.now()
                },
            })
        },
    }
}