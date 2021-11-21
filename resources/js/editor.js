
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

window.setupEditor = function() {
    return {
        editor: null,
        init(element) {
            this.editor = new Editor({
                element: element,
                content: {
                    "type": "doc",
                    "content": [
                        {
                            "type": "paragraph",
                            "content": [
                              {
                                "type": "text",
                                "text": "Wow, this editor instance exports its content as JSON."
                              }
                            ]
                        },
                        {
                            "type": "paragraph",
                            "content": [
                              {
                                "type": "text",
                                "text": "Wow, this editor instance exports its content as JSON."
                              }
                            ]
                        },
                        {
                            "type": "paragraph",
                            "content": [
                              {
                                "type": "text",
                                "text": "Wow, this editor instance exports its content as JSON."
                              }
                            ]
                        }
                    ]
                },
                updateAt: Date.now(),
                extensions: [
                    StarterKit
                ],
                onUpdate: ({ editor }) => {
                    this.content = JSON.stringify(editor.getJSON());
                },
                onSelectionUpdate: () =>{
                    this.updateAt = Date.now();
                },
            });
        },
    }
}