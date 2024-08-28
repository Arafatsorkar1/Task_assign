@extends('master')

@section('title', 'task')
<style>
    /* Modal container */
    .modal {

        position: absolute;
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
        overflow: scroll;
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

    .modal-backdrop.show, .show.blockOverlay {
        opacity: .01!important;
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
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                        class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">


                    <!-- Button to Open the Modal -->
                    <button id="openModalBtn" class="btn btn-primary">Create</button>

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
                    <table style="width: 100%;" id="example"
                           class="table table-hover table-striped table-bordered mt-3">
                        <thead>
                        <tr style="text-align: center">
                            <th width="5%">Serial</th>
                            <th width="15%">Title</th>
                            <th width="20%">Duration</th>

                            <th width="20%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td style="text-align: center">{{$loop->iteration}}</td>
                                <td style="text-align: center">{{$task->title}}</td>
                                <td style="text-align: center">{{$task->due_date}}</td>
                                <td style="text-align: center">
                                    @if($task->status == 3)
                                  <span class="ml-auto badge badge-success">Completed</span>
                                    @elseif($task->status == 2)
                                        <span class="ml-auto badge badge-primary">In Progress</span>
                                    @elseif($task->status == 1)
                                        <span class="ml-auto badge badge-info">Pending</span>
                                    @else
                                        <span class="ml-auto badge badge-danger">Ready</span>
                                    @endif

                                </td>

                                <td class="">



                                    <div class="dropdown pull-left mr-2">
                                        <a href="#" class="dropdown-toggle  btn-sm btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <li><a class="dropdown-item" href="#">Pending</a></li>
                                            <li><a class="dropdown-item" href="#">In Progress</a></li>
                                            <li><a class="dropdown-item" href="#">Completed</a></li>
                                        </ul>
                                    </div>



                                    <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                       title="{!! $task->description ?? '' !!}"
                                       class="btn btn-success btn-sm view-details"
                                       data-id="{{ $task->id }}"
                                       data-description="{{ $task->description }}"
                                       data-bs-toggle="modal"
                                       data-bs-target="#taskModal">
                                        <i class="fa fa-eye"></i>
                                    </a>


                                    <a href="javascript:void(0)" onclick="confirmDelete({{$task->id}})"
                                       class="  btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <form id="confirmDelete{{$task->id}}" action="{{route('tasks.destroy',$task->id) }}"
                                          method="post">
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
             <div class="modal-header">
                <h5 class="modal-title">Add New Task</h5>
                <span id="closeModalBtn" class="close">&times;</span>
            </div>

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
                        <textarea id=" " name="description" rows="3" placeholder="Enter task description"
                                  required></textarea>
                    </div>
                </form>
            </div>

             <div class="modal-footer">
                <button type="button" id="closeModalFooterBtn" class="btn-secondary">Close</button>
                <button type="submit" form="taskForm" class="btn-primary">Save Task</button>
            </div>
        </div>
    </div>

         <div id="taskModal" class="modal">
        <div class=" ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Task Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 </div>
                <div class="modal-footer">
                    <button type="button" id="closeModalFooterBtn" class="btn-secondary">Close</button> </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>




    CKEDITOR.replace('editor');


        var modal = document.getElementById("customModal");
        var openModalBtn = document.getElementById("openModalBtn");
        var closeModalBtn = document.getElementById("closeModalBtn");
        var closeModalFooterBtn = document.getElementById("closeModalFooterBtn");

         openModalBtn.onclick = function () {
            modal.style.display = "block";
        }

         closeModalBtn.onclick = function () {
            modal.style.display = "none";
        }
        closeModalFooterBtn.onclick = function () {
            modal.style.display = "none";
        }

         window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function () {
                const description = this.getAttribute('data-description') || 'No description available';
                const modalBody = document.querySelector('#taskModal .modal-body');
                modalBody.innerHTML = `
                <p><strong>Description:</strong></p>
                <p>${description}</p>
            `;
            });
        });
    });

    </script>
@endsection
