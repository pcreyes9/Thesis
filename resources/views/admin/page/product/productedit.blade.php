@extends('admin.layout.admin')
@section('content')  
@section('title', 'Product')

<h1>{{$modelID}}</h1>
{{-- <livewire:form.edit-product-form :modelID="$modelID"> --}}
@livewire('form.edit-product-form', ['modelID' => $modelID])


<script>
$(document).ready(function () {
    $("#datatable").on("click", "#deleteImage", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        $("#my_image").attr("src","/product_images/" + name);
        $("#DeleteImageForm").attr("action", "/admin/productimage/" + id);
        const myModal = tailwind.Modal.getInstance(
            document.querySelector("#delete-confirmation-modal")
        );
        myModal.show();
    });
});
</script>
@if(session('SuccessImage'))
    <x-Notification.SuccessNotification title="Image Saved" message="{{session('SuccessImage')}}"/>
@endif

@if(session('DeleteSuccess'))
    <x-Notification.SuccessNotification title="Image Deleted" message="{{session('DeleteSuccess')}}"/>
@endif

<script src="{{asset('dist/js/ckeditor-classic.js')}}"></script>
@endsection