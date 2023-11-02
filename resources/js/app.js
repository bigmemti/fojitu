import './bootstrap';

import Swal from 'sweetalert2';
import Alpine from 'alpinejs';

const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import '@majidh1/jalalidatepicker'


document.addEventListener('alpine:init', () => {
  Alpine.data('editor', (content) => {
    let editor

    return {
        updatedAt: Date.now(), // force Alpine to rerender on selection change
        init() {
            const _this = this

            editor = new Editor({
            element: this.$refs.element,
            extensions: [
                StarterKit
            ],
            content: content,
            onCreate({ editor }) {
                _this.updatedAt = Date.now()
                _this.$refs.textarea.innerHTML = content
            },
            onUpdate({ editor }) {
                _this.updatedAt = Date.now()
                _this.$refs.textarea.innerHTML = _this.$refs.element.children[0].innerHTML
            },
            onSelectionUpdate({ editor }) {
                _this.updatedAt = Date.now()
            }
            })
        },
        isLoaded() {
            return editor
        },
        isActive(type, opts = {}) {
            return editor.isActive(type, opts)
        },
        toggleBold : () => editor.chain().focus().toggleBold().run(),
        toggleItalic() {
            editor.chain().toggleItalic().focus().run()
        },
        toggleStrike() {
            editor.chain().focus().toggleStrike().run()
        },
        toggleCode() {
            editor.chain().focus().toggleCode().run()
        },
        unsetAllMarks() {
            editor.chain().focus().unsetAllMarks().run()
        },
        clearNodes() {
            editor.chain().focus().clearNodes().run()
        },
        setParagraph() {
            editor.chain().focus().setParagraph().run()
        },
        toggleHeading(opts) {
            editor.chain().focus().toggleHeading(opts).run()
        },
        toggleBulletList() {
            editor.chain().focus().toggleBulletList().run()
        },
        toggleOrderedList() {
            editor.chain().focus().toggleOrderedList().run()
            },
            toggleCodeBlock() {
            editor.chain().focus().toggleCodeBlock().run()
            },
        toggleBlockquote() {
            editor.chain().focus().toggleBlockquote().run()
        },
        setHorizontalRule() {
            editor.chain().focus().setHorizontalRule().run()
        },
        setHardBreak() {
            editor.chain().focus().setHardBreak().run()
        },
        undo() {
            editor.chain().focus().undo().run()
        },
        redo() {
            editor.chain().focus().redo().run()
        },
    }
  })
})

window.Alpine = Alpine;
window.Swal = Swal;
window.Toast = Toast;

Alpine.start();
