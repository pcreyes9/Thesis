@extends('admin.layout.admin')
@section('content')  
@section('title', 'Add Product')
<h2 class="intro-y text-lg font-medium mt-10">Add Product</h2>
<livewire:form.product-form/>

<script src="{{asset('dist/js/ckeditor-classic.js')}}"></script>
@endsection

