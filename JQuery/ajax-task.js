$(document).ready(function () {
    startDataTask();
    $("#btn-edit-task").hide();
    let edit = false;
    function startDataTask() {
        $.ajax({
            type: "GET",
            url: "ControllerTask.php",
            success: function (response) {
                let dataTask = JSON.parse(response);
                console.log(dataTask);
                let table = "";
                dataTask.forEach(task => {
                    table += `
                    <tr>
                        <td>${task.name}</td>
                        <td>${task.description}</td>
                        <td>
                        <button idedit = ${task.id}  class="task-edit btn btn-sm btn-primary">Edit</button>
                        <button iddelete = ${task.id}  class="task-delete btn btn-sm btn-danger">Delete</button>
                        </td>
                        
                    </tr>
                    `;
                });
                $("#table-tasks").html(table);
            }
        });
    }

    $("#task-form").submit(function (e) { 
        e.preventDefault();
        let dataTask = {
            name : $("#name").val(),
            description : $("#description").val(),
            id: $("#id").val(),
        };

        if (edit === false) {
            url = "ControllerTask.php";
            typeaction = "POST";
        } else {
            console.log(dataTask);
            url = "ControllerTask.php?dataTask="+ dataTask;
            typeaction = "PUT";
        }
        $.ajax({
            type: typeaction,
            url: url,
            data: {
                dataTask
            },
            success: function (response) {
                let datajson = JSON.parse(response);
                Object.values(datajson).forEach(task => {
                    console.log(task.name);
                });
                // console.log(json);
                $("#task-form").trigger("reset");
                startDataTask();
            }
        });
    });
    let tesxt ="Prueba Cambio";
    $(document).on("click", ".task-edit" , (e) => {
        const findId = $(this)[0].activeElement;
        const id = $(findId).attr("idedit");
        $.ajax({
            type: "POST",
            url: "ControllerTask.php",
            data : { 
                id 
            },
            success: function (response) {
                // console.log(response);
                let taskFind = JSON.parse(response);
                $('#id').val(taskFind.id);
                $('#name').val(taskFind.name);
                $('#description').val(taskFind.description);
                edit = true;
            }
        });
        e.preventDefault();
    });

    $(document).on("click", ".task-delete" , (e) => {
        const findId = $(this)[0].activeElement;
        const id = $(findId).attr("iddelete");
        let typeaction = "DELETE";       
        $.ajax({
            type: "DELETE",
            url: "ControllerTask.php?id="+ id + "&typeaction="+ typeaction,
            success: function (response) {
                alert(response);
                console.log(response);
                
            }
        });

        startDataTask();
    });
});