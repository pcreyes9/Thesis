

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Edit Product - {{$product->name}}</h2>
</div>

<!-- Product Information -->
<div class="intro-y box p-5 mt-5">
   <form action="{{Route('product.update',$product->id)}}" method="POST">
        @method('put')
        @csrf
        <!-- Product Name Input -->
        <div class="mt-3">
            <div class="input-form"> 
                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                    Product Name 
                </label> 
                <input id="validation-form-1" type="text" name="name" class="form-control @error('name') border-danger @enderror" placeholder="Product Name" value="{{old('name') ?? $product->name}}" > 
                <div class="text-danger mt-2">@error('name'){{$message}}@enderror</div>
            </div>
        </div>  
        <!-- Category Input -->

        <div class="flex flex-col sm:flex-row items-center">
        <div class="item w-1/2 h-28 mr-2 sm:mr-0 w-full form">
            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                Category 
            </label> 
            <select data-placeholder="Select Category" class="tom-select w-full" name="category">
                @if($categories->count())
                    @foreach($categories as $category)
                        @if(old('category') == $category->id || $product->category_id )
                            <option value="{{$product->category_id }}" selected>{{$product->category->name }}</option>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option disabled>No Results Found Add a Category first</option>
                @endif
            </select> 
            <div class="text-danger mt-2">@error('category'){{$message}}@enderror</div>
        </div>
        <!-- Brand Input -->
        <div class="item w-1/2 h-28 mr-2 sm:mr-1 w-full form">
            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                Brand 
            </label>
            <div style="@error('brand')border: 1px solid red @enderror" class="form-control ">
                <select data-placeholder="Select Brand"  class="tom-select w-full" name="brand" >
                    @forelse($brands as $brand)
                        @if(old('brand') == $brand->id || $product->brand_id)
                        <option value="{{$product->brand_id}}" selected> {{$product->brand->name }}</option>
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @else
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endif
                    @empty
                        <option disabled>No Results Found Add a Brand first</option>
                    @endforelse
                </select> 
            </div>
            <div class="text-danger mt-2">@error('brand'){{$message}}@enderror</div>
        </div>
    </div>
        <div class="flex flex-col sm:flex-row items-center">
            <div class="item w-1/2 h-28 mr-2 sm:mr-0 w-full form">
                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                    Cost Price 
                </label>
                <div class="input-group">
                    <input id="cprice" type="number" class="form-control @error('cprice') border-danger @enderror" placeholder="Purchase Price"  name="cprice" value="{{old('cprice') ?? $product->cprice}}">
                    <div id="input-group-2" class="input-group-text">
                        Unit
                    </div>
                </div>
                <div class="text-danger mt-2">@error('cprice'){{$message}}@enderror</div>
            </div>

        <div class="item w-1/2 h-28 mr-2 sm:mr-0 w-full form">
                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                    Selling Price 
                </label>
                <div class="input-group">
                    <input id="sprice" type="number" class="form-control @error('sprice') border-danger @enderror" placeholder="Selling Price"  name="sprice" value="{{old('sprice') ?? $product->sprice}}">
                    <div id="input-group-2" class="input-group-text">
                        Unit
                    </div>
                </div>
                <div class="text-danger mt-2">@error('sprice'){{$message}}@enderror</div>
            </div>
        </div>
        <!--Stock Input -->
        <div class="mt-3">
            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                Stock 
            </label>
            <div class="input-group ">
                <input type="number" class="form-control @error('stock') border-danger @enderror" placeholder="Quantity" aria-describedby="input-group-1" name="stock" value="{{old('stock') ?? $product->stock}}">
                <div id="input-group-1" class="input-group-text ">pcs</div>
            </div>
            <div class="text-danger mt-2">@error('stock'){{$message}}@enderror</div>
        </div>
        <!-- Weight Input-->
        <div class="mt-3">
            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
             Weight 
            </label>
            <div class="input-group">
                <input id="crud-form-4" type="number" class="form-control @error('weight') border-danger @enderror" placeholder="Weight" aria-describedby="input-group-2" name="weight" value="{{old('weight')  ?? $product->weight}}">
                <div id="input-group-2" class="input-group-text">grams</div>
            </div>
            <div class="text-danger mt-2">@error('weight'){{$message}}@enderror</div>
        </div>
        <!-- Status Input -->
        <div class="mt-3">
            <label>Active Status</label>
            <div class="form-switch mt-2">
                <input type="checkbox" class="form-check-input" name="status" id="status" value="1" {{old('status') || $product->status == 1 ? 'checked' : ''}} >
            </div>
            <div class="text-danger mt-2">@error('status'){{$message}}@enderror</div>
        </div>
        <!-- Description Input -->
        <div class="mt-3">
            <label>Product Description</label>
            <div class="mt-2">
                <textarea id="editor" class="editor" name="description" >{{old('description') ?? $product->description}}</textarea>
            </div>
            <div class="text-danger mt-2">@error('description'){{$message}}@enderror</div>
        </div>
        <!-- Buttons -->
        <div class="text-right mt-5">
            <a href="{{Route('product.index')}}"><button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button></a>
            <button type="submit" class="btn btn-primary w-24 mt-3">Edit</button>
        </div>
    </form>
</div>
<!-- Images Layout -->
<div class="intro-y box p-5 mt-5" id="ImageList">
    <form action="{{url('admin/addimage/'.$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-3">
            <label class="form-label w-full flex flex-col sm:flex-row">Product Image</label>
            <input type="file" name="images[]" placeholder="Choose files" multiple accept="image/*" >
            <div class="text-danger mt-2">
                @error('images'){{$message}}@enderror
            </div>
             <button type="submit" class="btn btn-primary w-24 mt-3">Add Image </button>
             
        </div>
        <div class="intro-y grid grid-cols-12 gap-6 mt-5" id="datatable">
            @foreach ($images as $image)
                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                    <div class="p-5">
                        <div>
                            <img class="object-contain h-48 w-full" src="/product_images/{{$image->images}}"  data-action="zoom" alt="">
                        </div>
                        <a href="javascript:;"  class="block font-medium text-center mt-2" id="deleteImage" data-id="{{$image->id}}" data-name="{{$image->images}}">Delete</a> 
                    </div>
                </div>
            @endforeach
        </div> 
    </form>
</div>
      
<x-Modal.DeleteModal>
    <div class="p-5 text-center">
        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
        <div class="text-3xl mt-5">
            Are you sure? You want to delete this image
        </div>
        <div class="text-slate-500 text-2xl	 mt-2">
            This action cannot be undone
            <img src id="my_image" alt="" >
        </div>
    </div> 
    <form action method="POST" id="DeleteImageForm">
        @method('DELETE')
        @csrf
        <div class="px-5 pb-8 text-center">
            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
            <button type="submit" class="btn btn-danger w-24">Delete</button>
        </div>  
    </form> 
</x-Modal.DeleteModal>