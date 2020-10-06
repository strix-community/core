<textarea
    id="editor"
    name="content"
>
    This is some sample content.
</textarea>


@push('scripts')
    @once
        <script
            src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"
        ></script>
    @endonce

    <script>
        window.ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush
