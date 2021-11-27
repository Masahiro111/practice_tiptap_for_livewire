
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Image from '@tiptap/extension-image'
import Link from '@tiptap/extension-link'

window.setupEditor = function() {
    return {
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

        // addImage() {
        //     const url = window.prompt('URL')
      
        //     if (url) {
        //       this.editor.chain().focus().setImage({ src: url }).run()
        //     }
        // },
    }
}