
@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <style>
        /*body{*/
            /*overflow-y: hidden;*/
        /*}*/
    </style>
    <script data-cfasync="false" src="{{ url('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    {{--<script src="https://cdn.ckeditor.com/4.6.1/full-all/ckeditor.js"></script>--}}
    <script data-cfasync="false" src="{{ url('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script data-cfasync="false">

        function close_b(){
            var c = confirm("Are you sure you want to close this Post");
            if(c){
                localStorage.clear();
                window.location = "/posts";
            }
        }

        $(document).ready(function()
        {
            @if(!isset($article))
            var content = localStorage.getItem("article_1");
            var header = localStorage.getItem("header");
            $('#my-editor').val(content);
            $('#header_arti').val(header);
            @endif

        });


        setInterval(function(){ save_article() }, 10000);


        function realign(){
            $(this).scrollTop(0);
        }

        function save_article(){
            //save into local storage
            //get the content of the post
            var content = CKEDITOR.instances['my-editor'].getData();
            var header = $('#header_arti').val();
//                $('textarea#my-editor').val();
                    @if(!isset($article))
                        localStorage.setItem("article_1",content);
                        localStorage.setItem("header",header);
            $(".contentPost").delay(1000).fadeIn(500).fadeOut(2000);

            @endif

        }
        <?php $csrf_token = csrf_token();?>

        CKEDITOR.replace( 'my-editor', {
            filebrowserImageBrowseUrl: '/file/upload',
            filebrowserImageUploadUrl: '/file/upload?type=Images&_token={{ $csrf_token }}',
            filebrowserBrowseUrl: '/file/upload',
            filebrowserUploadUrl: '/file/uploadtype=Files&_token={{ $csrf_token }}',


            // filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            // filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ $csrf_token }}',
            // filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ $csrf_token }}',

            toolbar: [
                { name: 'document', items: [ 'Print' ] },
                { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'links', items: [ 'Link', 'Unlink' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
                { name: 'insert', items: [ 'Image', 'Table'] },
                { name: 'tools', items: [ 'Maximize' ] },
                { name: 'editing', items: [ 'Scayt','Source','Iframe' ] },
                { name: 'pastebase64' }
            ],
            customConfig: '',
             allowedContent : {
                $1: {
                    elements: CKEDITOR.dtd,
                    attributes: true,
                    styles: true,
                    classes: true,
                    scripts: true
                }
            },
            extraAllowedContent: 'script; img[width,height,align];style',

            extraPlugins: 'tableresize,uploadimage,uploadfile,sourcearea,iframe,clipboard,pastebase64,base64image,basicstyles',

            height: 450,
            contentsCss: [ 'https://cdn.ckeditor.com/4.6.1/full-all/contents.css', '{{ url('/css/mystyles.css') }}' ],
            bodyClass: 'document-editor',
            format_tags: 'p;h1;h2;h3;pre',
            removeDialogTabs: 'image:advanced;link:advanced',
            stylesSet: [
                /* Inline Styles */
                { name: 'Marker', element: 'span', attributes: { 'class': 'marker' } },
                { name: 'Cited Work', element: 'cite' },
                { name: 'Inline Quotation', element: 'q' },
                /* Object Styles */
                {
                    name: 'Special Container',
                    element: 'div',
                    styles: {
                        padding: '5px 10px',
                        background: '#eee',
                        border: '1px solid #ccc'
                    }
                },
                {
                    name: 'Compact table',
                    element: 'table',
                    attributes: {
                        cellpadding: '5',
                        cellspacing: '0',
                        border: '1',
                        bordercolor: '#ccc'
                    },
                    styles: {
                        'border-collapse': 'collapse'
                    }
                },
                { name: 'Borderless Table', element: 'table', styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
                { name: 'Square Bulleted List', element: 'ul', styles: { 'list-style-type': 'square' } }
            ]
        } );
        CKEDITOR.plugins.registered['save']=
            {
                init : function( editor )
                {
                    var command = editor.addCommand( 'save',
                        {
                            modes : { wysiwyg:1, source:1 },
                            exec : function( editor ) {
                                var fo=editor.element.$.form;
                                editor.updateElement();
                                rxsubmit(fo);
                            }
                        }
                    );
                    editor.ui.addButton( 'Save',{label : 'My Save',command : 'save'});
                }
            };

        window.onscroll = function (e) {

        }
    </script>



@endsection