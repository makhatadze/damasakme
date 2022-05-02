import React, { useEffect, useRef } from "react";
import MyUploadAdapter from "./MyUploaderAdapter";

function Editor({ onChange, editorLoaded, name, value }) {
    const editorRef = useRef();
    const { CKEditor, ClassicEditor } = editorRef.current || {};

    useEffect(() => {
        editorRef.current = {
            CKEditor: require("@ckeditor/ckeditor5-react").CKEditor, // v3+
            ClassicEditor: require("@ckeditor/ckeditor5-build-classic")
        };
    }, []);

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader)
        }
    }
    const custom_config = {
        extraPlugins: [ MyCustomUploadAdapterPlugin ],
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'blockQuote',
                'insertTable',
                '|',
                'imageUpload',
                'undo',
                'redo'
            ]
        },
        table: {
            contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        }
    }
    return (
        <div>
            {editorLoaded ? (
                <CKEditor
                    type=""
                    name={name}
                    editor={ClassicEditor}
                    data={value}
                    config={custom_config}
                    onChange={(event, editor) => {
                        const data = editor.getData();
                        // console.log({ event, editor, data })
                        onChange(data);
                    }}
                />
            ) : (
                <div>Editor loading</div>
            )}
        </div>
    );
}

export default Editor;
