<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Repas Ajax</title>
    <!-- BOOTSTRAP 4  -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div id="alert-delete">

    </div>

    <!-- Search Task -->
    <!--     
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <label for="" class="form-labeñ">Data to Search</label>
                </div>
                <div class="col-5">
                    <input type="text" name="search" id="search" class="form-control">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Search Task -->

<!-- ShowResultSearchTask     -->
    <!-- <div class="card">
        <div class="card-body" id="search-list">

        </div>
    </div> -->
<!-- ShowResultSearchTask -->

<!-- Show in Table Task -->
    <div class="card" style="background-color: beige;">
        <div class="card-body">
            <div class="col-md-7">
                <table class="table table-dark table-sm" id="table-for-task">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Description</td>
                            <td class="col-4">Actions</td>
                        </tr>
                    </thead>
                    <tbody id="table-tasks"></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Show in Table Task -->

    <!-- Form to Create new Task -->
    <div class="">
        <div class="">
            <form id="task-form">
                    <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Task Name" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                        placeholder="Task Description"></textarea>
                </div>
                <button id="btn-send-task" type="submit" class="btn btn-primary btn-block text-center">
                    Save Task
                </button>
                <button id="btn-edit-task" type="submit" class="btn btn-primary btn-block text-center">
                    Edit Task
                </button>
            </form>
        </div>
    </div>
    <!-- Form to Create new Task -->


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="./JQuery/ajax-task.js"></script>
</body>

</html>