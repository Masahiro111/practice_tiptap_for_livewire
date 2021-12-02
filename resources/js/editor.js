import { Editor , Node , mergeAttributes } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Image from '@tiptap/extension-image'
import Link from '@tiptap/extension-link'

// tiptap custom extension
const Divtest = Node.create({
    name: 'divtest',
  
    // Your code goes here.
    priority: 1000,
    addOptions() {
        return {
            HTMLAttributes: {},
        }
    },
    group: 'block',
    content: 'inline*',
    parseHTML() {
        return [
            { tag: 'div' },
            { class: 'line-through'},
        ]
    },
    renderHTML({ HTMLAttributes }) {
        return ['div', mergeAttributes(this.options.HTMLAttributes, HTMLAttributes), 0];
    },
    addCommands() {
        return {
            setDivtest: () => ({ commands }) => {
                return commands.setNode('divtest');
            },
        }
    },
    // Your code goes here.
});

window.setupEditor = function() {
    return {
        options: {
            enableImageUpload: true,
            // enableLinks: true,
            maxSize: 1000,
            // generateImageUploadConfigUrl: '/laravel-tiptap/generate-image-upload-config',
            // ...userOptions,
        },
        editor: null,
        init(element) {
            this.editor = new Editor({
                element: element,
                content: {"type":"doc","content":[{"type":"heading","attrs":{"level":1},"content":[{"type":"text","text":"laravStart"}]},{"type":"paragraph","content":[{"type":"text","text":"Starter Admin For "},{"type":"text","marks":[{"type":"link","attrs":{"href":"https://google.com","target":"_blank"}}],"text":"Laravel"},{"type":"text","text":". This repo is based on practical web application development course on youtube. You can watch the videos on how we make this project or just git clone the project and start using. it. "}]},{"type":"heading","attrs":{"level":2},"content":[{"type":"text","text":"Tutorial Description"}]},{"type":"paragraph","content":[{"type":"text","marks":[{"type":"link","attrs":{"href":"https://www.youtube.com/playlist?list=PLB4AdipoHpxaHDLIaMdtro1eXnQtl_UvE","target":"_blank"}}],"text":"https://www.youtube.com/playlist?list=PLB4AdipoHpxaHDLIaMdtro1eXnQtl_UvE"}]},{"type":"paragraph","content":[{"type":"text","text":"Let's Build a Multi-Purpose Laravel + Vue Application is out now. In this series, you learn everything you need to know about Building a complete web application with Laravel and Vue js. So, I am so excited that so many of you guys like my content and keep inspiring me to create more videos. My goals is to inspire you to write better code and better applications. "}]},{"type":"paragraph","content":[{"type":"text","marks":[{"type":"bold"}],"text":"Here are the things you will learn in this series and what the repo include out of the box: "}]},{"type":"bulletList","content":[{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"How use Vue Router with Laravel * How to Install AdminLTE 3 * How to Use Font Awesome 5 on Laravel * How integrate mailchimp with laravel "}]}]},{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"How to use Laravel Socialite * How to Login Using Social Media "}]}]},{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"How to Use API in Laravel "}]}]},{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"Api Auth with Laravel Passport "}]}]}]},{"type":"bulletList","content":[{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"JWT with Laravel Passport and JavaScript Request "}]}]},{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"Vue Custom Events * Vue form with Laravel * Relational Database with Laravel "}]}]},{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"Axios and Ajax Request * ACL in Laravel * Online Users list * And much more... "}]}]}]},{"type":"heading","attrs":{"level":2},"content":[{"type":"text","text":"Installation"}]},{"type":"paragraph","content":[{"type":"text","text":"It's just like any other Laravel project. Basically here is how you use it for yourself. (it's not completed yet) "}]},{"type":"bulletList","content":[{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"Clone the repo ` git clone https://github.com/Hujjat/laravStart.git ` "}]}]}]},{"type":"bulletList","content":[{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"`cd ` to project folder. * Run ` composer install ` "}]}]}]},{"type":"bulletList","content":[{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"Save as the `.env.example` to `.env` and set your database information * Run ` php artisan key:generate` to generate the app key "}]}]}]},{"type":"bulletList","content":[{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"Run ` npm install ` "}]}]}]},{"type":"bulletList","content":[{"type":"listItem","content":[{"type":"paragraph","content":[{"type":"text","text":"Run ` php artisan migrate ` * Done !!! Enjoy Customizing and building awesome app "}]}]}]},{"type":"heading","attrs":{"level":3},"content":[{"type":"text","text":"Code review"}]},{"type":"codeBlock","attrs":{"language":"js"},"content":[{"type":"text","text":"const a = \"hello\";"}]},{"type":"paragraph","content":[{"type":"text","text":"Create new row is "},{"type":"text","marks":[{"type":"code"}],"text":"Ctrl + Enter"},{"type":"text","text":" "}]},{"type":"paragraph"}]},
                updateAt: Date.now(),
                // editorProps: {
                //     class: 'prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto focus:outline-none',
                // },
                extensions: [
                    StarterKit,
                    Image,
                    Divtest,
                    Link.configure({
                        HTMLAttributes: { 
                            target: '_blank',
                            rel: 'noopener',
                            class: 'text-blue-500',
                        },
                        openOnClick: false,
                    }),
                ],
                editable: true,
                onUpdate: ({ editor }) => {
                    this.content = JSON.stringify(editor.getJSON());
                },
                onSelectionUpdate: () =>{
                    this.updateAt = Date.now();
                },
            });
        },

        // Set Link ------------------------------------------------------------------
        setLink() {
            const previousUrl = this.editor.getAttributes('link').href;
            const url = window.prompt('URL', previousUrl);
      
            // cancelled
            if (url === null) {
              return;
            }
      
            // empty
            if (url === '') {
              this.editor.chain().focus().extendMarkRange('link').unsetLink().run();
              return;
            }
      
            // update link
            this.editor.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
        },

        // Image upload Handle
        async handleFileDrop(event) {
            alert('handleImage');
            alert('handleImage2');
            // alert(event);
            event.stopPropagation()
            event.preventDefault()
    
            if (!event.dataTransfer){
                return
            }
   
            // const editor = Alpine.raw(this.editor) 
            // const coordinates = editor.view.posAtCoords({ left: event.clientX, top: event.clientY })

            alert('left event.clientX = ' +  event.clientX + ' top event.clientY = ' +  event.clientY  );

    
            // for await (const file of Array.from(event.dataTransfer.files)) {
            //     if (! file.type.startsWith('image/')) {
            //         return
            //     }
    
            //     await this.handleUpload(file, coordinates.pos)
            // }
        },

        async handleUpload(file, position) {
            // const imageUploadConfig = await this.getImageUploadConfig()
    
            const formData = new FormData()
            for (const [key, value] of Object.entries(imageUploadConfig.uploadUrlFormData)) {
                formData.set(key, value)
            }

            alert('handleUpload');
    
        //     // resize our image
        //     const resizer = ImageBlobReduce()
        //     const resizedFile = await resizer.toBlob(file, {
        //         max: this.options.maxSize,
        //     })
    
        //     formData.set('Content-Type', file.type)
        //     formData.set('key', `${imageUploadConfig.uploadKeyPrefix}/${file.name}`)
        //     formData.append('file', resizedFile)
    
        //     const uploadResponse = await typedFetch(imageUploadConfig.uploadUrl, {
        //         method: 'post',
        //         body: formData,
        //     })
    
        //     if (uploadResponse.status !== 201) {
        //         throw 'something went wrong while uploading the image'
        //     }
    
        //     const imageUrl = `${imageUploadConfig.downloadUrlPrefix}${file.name}`
    
        //     const editor = Alpine.raw(this.editor) 
    
        //     const node = editor.schema.nodes.image.create({
        //         src: imageUrl,
        //     })
    
        //     const insertTransaction = editor.view.state.tr.insert(
        //         position ?? editor.view.state.selection.anchor,
        //         node
        //     )
    
        //     editor.view.dispatch(insertTransaction)
    
        //     const endPos = editor.state.selection.$to.after() - 1
        //     const resolvedPos = editor.state.doc.resolve(endPos)
        //     const moveCursorTransaction = editor.view.state.tr.setSelection(new TextSelection(resolvedPos))
    
        //     editor.view.dispatch(moveCursorTransaction.scrollIntoView())
        },
    
        removeImage() {
            alert('removeImage');
            // const state = Alpine.raw(this.editor).state
            // const view = Alpine.raw(this.editor).view
            // const transaction = state.tr
            // const pos = state.selection.$anchor.pos
    
            // const nodeSize = state.selection.node.nodeSize
    
            // transaction.delete(pos, pos + nodeSize)
    
            // view.dispatch(transaction)
        },

        // Set Image Link ------------------------------------------------------------------
        addImage() {
            const url = window.prompt('URL')
      
            if (url) {
              this.editor.chain().focus().setImage({ src: url }).run();
            }
        },
    }
}