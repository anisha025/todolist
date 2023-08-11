@extends('layout.main')
@section('content')
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand text-warning text-bold" href="">Todo List App</a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <div class="nav-items float-right d-flex align-items-center">
                <div class="pr-2 dropdown">
                    <!-- Profile Picture -->
                    <div class="d-flex align-items-center">
                        <img src="{{auth()->user()->image}}" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px;">
                        <span class="text-light d-block pl-2"></span>

                        <a href="/logout" class="btn btn-sm btn-danger ml-3">Logout</a>
                    </div>
                    <div class="logout">

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container border mt-3 border-primary p-3" style="width: 80%;">
    <h3 class="text-center text-dark">To do list</h3>
    <div class="form">
        <form class="container mt-3" action="/todo/store" method="post">
            @csrf
            <div class="hello" style="display: flex; flex-direction:row;justify-content:space-between">
                <div class="form-group">
                    <input type="text" class="form-control" name="task" id="" placeholder="Add task here..." style="width:650px;" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="duedate" id="" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Beautiful Dropdown Menu -->
    <div class="dropdown mt-3 mb-2" style="float: right;">
        <button class="btn btn-white border btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-filter"> </i> Filter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item dropdown-item-sm" href="/show-all-tasks">All</a>
            <a class="dropdown-item dropdown-item-sm" href="/show-missed-tasks">Missed</a>
            <a class="dropdown-item dropdown-item-sm" href="/show-pending-tasks">Pending</a>
            <a class="dropdown-item dropdown-item-sm" href="/show-completed-tasks">Completed</a>
        </div>
    </div>


    <!-- Beautiful Table -->
    <table class="table">
        <thead>
            <tr class="p-3">
                <th scope="col"><i class="fa-solid fa-list-check"></i> Task</th>
                <th scope="col"><i class="fa-regular fa-calendar-days"></i> Due Date</th>
                <th scope="col"><i class="fa-solid fa-circle-question"></i> Status</th>
                <th scope="col"><i class="fa-solid fa-person-walking"></i> Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($tasks as $task)
            <tr>
                <td>{{$task->task}}</td>
                <td>{{$task->duedate}}</td>
                <td class="{{ $task->status === 'Missed' ? 'text-danger' : ($task->status === 'Pending' ? 'text-primary' : ($task->status === 'Completed' ? 'text-success' : '')) }} text-bold">{{$task->status}}</td>
                <td>


                <td>
                    @if ($task->status == 'Pending')
                    <a href="/todo/update/{{$task->id}}" class="text-success" style="text-decoration: none;"><i class="fa-solid fa-check text-success"></i> Done</a> |
                    @endif
                    <a href="/todo/delete/{{$task->id}}" class="text-danger" style="text-decoration: none;"><i class="fa-solid fa-trash text-danger"></i> Remove</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection