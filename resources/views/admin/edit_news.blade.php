@include('admin.layout.header')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="col-span-12 xl:col-span-8 md:col-span-6">
            <div class="card">
                <div class="card-header">
                    <h5>Edit News</h5>
                </div>
                <div class="card-body">
                    <div class="card-body !p-10">
                        <h4 class="text-center font-medium mb-4">Edit News</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="heading" class="text-dark"
                                    style="font-weight: 600; font-size : 18px">Title</label>
                                <input type="text" class="form-control mt-2" id="heading" value="{{ $news->heading }}"
                                    placeholder="Enter title" name="heading">
                            </div>
                            @error('heading')
                            <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <label for="category" class="text-dark"
                                    style="font-weight: 600; font-size : 18px">Category</label>
                                <select name="category" id="category" class="form-control mt-2" name="category">
                                    <option value="">Select Category</option>
                                    <option value="technology" @if($news->category == 'technology') selected @endif>Technology</option>
                                    <option value="business" @if($news->category == 'business') selected @endif>Business</option>
                                    <option value="entertainment" @if($news->category == 'entertainment') selected @endif>Entertainment</option>
                                    <option value="science" @if($news->category == 'science') selected @endif>Science / Health</option>
                                    <option value="travel" @if($news->category == 'travel') selected @endif>Travel</option>
                                </select>
                            </div>
                            @error('category')
                            <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <label for="image" class="text-dark"
                                    style="font-weight: 600; font-size : 18px">Image</label>
                                <input type="file" class="form-control mt-2" id="image" value="{{old('image')}}"
                                    name="image">
                            </div>
                            @error('image')
                            <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <img class="card-img-top mt-4 mb-3" style="height: 100px;"
                                src="{{ asset('admin/upload/news/' . $news->image) }}" alt="Card image"
                                style="width: 100px">
                            <label for="editor" class="text-dark"
                                style="font-weight: 600; font-size : 18px">Description</label>
                            <div class="form-group mt-2">
                                <textarea class="form-control" id="editor" placeholder="Enter description"
                                    name="description">{{ $news->description }}</textarea>
                            </div>
                            @error('description')
                            <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="mt-4 text-center mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <a href="{{ route('manage-news') }}" style="margin-left: 20px" class="text-primary-500">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<!-- CKeditor CDNs -->

<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                // uploadUrl: "{{ route('upload') . '?_token=' . csrf_token() }}"
            },
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', '', '|',
                    'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.log(error);
        });
</script>

@include('admin.layout.footer')