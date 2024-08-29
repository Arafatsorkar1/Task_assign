@extends('master')

@section('title', 'task')
<style>
    /* Modal container */
    .modal {

        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        overflow: scroll;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); /* Black with opacity */
        display: flex; /* Flexbox to center the modal */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
    }

    /* Modal content box */
    .modal-content {
        background-color: #fefefe;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        margin: 0 auto;
    }

    /* Modal header */
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 10px;
        margin-top: 10%;
    }

    /* Modal body */
    .modal-body {
        margin: 15px 0;
    }

    /* Modal footer */
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        border-top: 1px solid #dee2e6;
        padding-top: 10px;
    }

    /* Close button (x) */
    .close {
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Button styles */
    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        margin-left: 10px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Input styles */
    input[type="text"], input[type="date"], textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-sizing: border-box;
    }


</style>
@section('body')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-phone icon-gradient bg-premium-dark"></i>
                </div>
                <div> Assign Task Edit
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                                        <a href="{{route('dashboard')}}" class="btn-shadow dropdown-toggle btn btn-info">
                                             <span class="btn-icon-wrapper pr-2 opacity-7">
                                               <i class="fa fa-business-time fa-w-20"></i>
                                             </span>
                                            List
                                        </a>






                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-pane active" id="tab-eg115-0" role="tabpanel">



                    <form action="{{route('tasks.update',$task->id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section>
                            <div class="row">
                             </div>
                        </section>
                        <section class="py-5">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            Status <sup><span style="color: red">*</span></sup>
                                        </div>
                                        <div class="col-md-8">

                                            <select  name="status" class="form-control">
                                                <option>Select</option>
                                                <option value="0" {{$task->status == 0 ? 'selected' : ''}}> Ready </option>
                                                <option value="1" {{$task->status == 1 ? 'selected' : ''}}> Pending </option>
                                                <option value="2" {{$task->status == 2 ? 'selected' : ''}}> In Progress </option>
                                                <option value="3" {{$task->status == 3 ? 'selected' : ''}}> Completed </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            Title <sup><span style="color: red">*</span></sup>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" value="{{$task->title ?? ''}}" name="title" class="form-control">

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            Duration <sup><span style="color: red">*</span></sup>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" value="{{$task->due_date ?? ''}}" name="due_date" class="form-control">

                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            Description <sup><span style="color: red">*</span></sup>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="description" id="editor"  style="background-color: white"  class="form-control"> {!!$task->description !!} </textarea>

                                        </div>
                                    </div>


                                    <div class="row mt-5 text-end">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4 text-center ">
                                            <button type="submit" class="btn-shadow  btn btn-info"><span
                                                    class="btn-icon-wrapper pr-2 opacity-7"><i
                                                        class="fa fa-business-time fa-w-20"></i></span> Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                    <script>
                        CKEDITOR.replace('editor');


                    </script>




               </div>
            </div>
        </div>
    </section>





@endsection
