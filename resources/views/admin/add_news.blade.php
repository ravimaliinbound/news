@include('admin.layout.header')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="col-span-12 xl:col-span-8 md:col-span-6">
            <div class="card">
                <div class="card-header">
                    <h5>Post News</h5>
                </div>
                <div class="card-body">
                    <div class="card-body !p-10">
                        <h4 class="text-center font-medium mb-4">Post News</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="heading" class="text-dark"
                                    style="font-weight: 600; font-size : 18px">Title</label>
                                <input type="text" class="form-control mt-2" id="heading" value="{{old('heading')}}"
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
                                    <option value="technology">Technology</option>
                                    <option value="business">Business</option>
                                    <option value="entertainment">Entertainment</option>
                                    <option value="science">Science / Health</option>
                                    <option value="travel">Travel</option>
                                </select>
                            </div>
                            @error('category')
                                <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <label for="editor" class="text-dark"
                                style="font-weight: 600; font-size : 18px">Description</label>
                            <div class="form-group mt-2">
                                <textarea class="form-control" id="editor" placeholder="Enter description"
                                    name="description">{{old('description')}}</textarea>
                            </div>
                            @error('description')
                                <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="mt-4 text-center mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <a href="dashboard" style="margin-left: 20px" class="text-primary-500">Back</a>
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
                uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}"
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