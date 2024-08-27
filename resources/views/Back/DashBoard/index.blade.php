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
                <div> Assign Task LIst
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
{{--                    <a href="  " class="btn-shadow dropdown-toggle btn btn-info">--}}
{{--                         <span class="btn-icon-wrapper pr-2 opacity-7">--}}
{{--                           <i class="fa fa-business-time fa-w-20"></i>--}}
{{--                         </span>--}}
{{--                        Create--}}
{{--                    </a>--}}

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customModal">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                           <i class="fa fa-business-time fa-w-20"></i>
                         </span>
                        Create
                    </button>

                    <!-- Button to Open the Modal -->
                    <button id="openModalBtn" class="btn btn-primary">Launch demo modal</button>

                    <!-- The Modal -->


                </div>
            </div>
        </div>
    </div>
    {{--    body Title End--}}

    {{--    @include('Admin.Home.includes.Massage.sweetInfo')--}}
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-pane active" id="tab-eg115-0" role="tabpanel">


                    <hr>
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered mt-3">
                        <thead>
                        <tr style="text-align: center">
                            <th width="5%">Serial</th>
                            <th width="15%">Title</th>
                            <th width="20%">Duration</th>

                            <th width="20%">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td style="text-align: center">{{$loop->iteration}}</td>
                                <td style="text-align: center">{{$task->title}}</td>
                                <td style="text-align: center">{{$task->due_date}}</td>
<td></td>

                                <td>
                                    <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="confirmDelete({{$task->id}})" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <form id="confirmDelete{{$task->id}}" action="{{route('tasks.destroy',$task->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>

                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <div id="customModal" class="modal">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Add New Task</h5>
                <span id="closeModalBtn" class="close">&times;</span>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="taskForm" action="{{route('tasks.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="taskTitle" class="form-label">Title</label>
                        <input type="text" id="taskTitle" name="title" placeholder="Enter task title" required>
                    </div>
                    <div class="mb-3">
                        <label for="taskDueDate" class="form-label">Due Date</label>
                        <input type="date" id="taskDueDate" name="due_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="taskDescription" class="form-label">Description</label>
                        <textarea id="taskDescription" name="description" rows="3" placeholder="Enter task description" required></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" id="closeModalFooterBtn" class="btn-secondary">Close</button>
                <button type="submit" form="taskForm" class="btn-primary">Save Task</button>
            </div>
        </div>
    </div>

    <script>
        // Get the modal, open button, and close button elements
        var modal = document.getElementById("customModal");
        var openModalBtn = document.getElementById("openModalBtn");
        var closeModalBtn = document.getElementById("closeModalBtn");
        var closeModalFooterBtn = document.getElementById("closeModalFooterBtn");

        // When the user clicks the button, open the modal
        openModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x) or the close button, close the modal
        closeModalBtn.onclick = function() {
            modal.style.display = "none";
        }
        closeModalFooterBtn.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
@endsection
