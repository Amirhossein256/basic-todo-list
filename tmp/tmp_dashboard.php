<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../bootstrap/css/styles.css">
    <link href="../bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <h1 class="fs-4 card-title fw-bold mb-4 text-center">your todo's :</h1>
            <form action="./index?" method="get">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" placeholder="search" name="s"/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">scheduled at</th>
                    <th scope="col">created at</th>
                    <th scope="col">edit</th>
                    <th scope="col">select</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data as $task) {
                    $array = [
                        '1' => 'success',
                        '2' => 'warning',
                        '3' => 'danger'
                    ];
                    $class = $array[$task->status];
                    ?>
                    <tr class='table-<?php echo $class ?>'>
                        <th scope='row'><?php echo $task->id ?></th>
                        <td id="item-title"><?php echo $task->title; ?></td>
                        <td id="item-scheduled_at"><?php echo $task->scheduled_at; ?></td>
                        <td id="item-created_at"><?php echo $task->created_at; ?></td>
                        <td>
                            <button type="button" data-id="<?php echo $task->id; ?>" class="btn btn-info task-edit"
                                    onclick='editItem(<?php print(json_encode($task)) ?>)'
                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                <?php if ($class == 'danger') echo 'disabled' ?> >edit
                            </button>
                        </td>
                        <td>
                            <form action="./delete" method="post">
                            <input class='form-check-input float-end' type='checkbox' value='<?php echo $task->id ?>'
                                   id='flexCheckDefault' name="delete_item">
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-warning float-md-start"
                    onclick="window.location.href='/todolist/user/logout'">exit
            </button>

            <button type="submit" class="btn btn-danger float-end">deleted</button>
            </form>
            <button type="submit" class="btn btn-success float-end me-1">completed</button>
            <button type="submit" class="btn btn-primary float-end me-1" data-bs-toggle="modal"
                    data-bs-target="#createModal">new
            </button>
        </div>
    </div>
</div>


<!--modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit task </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./edit" method="post">
                    <div class="mb-3">
                        <label for="data-title" class="col-form-label"> task id: </label>
                        <input class="data-id" disabled>
                        <input type="hidden" id="data-id" name="id" value="">
                    </div>

                    <div class="mb-3">
                        <label for="data-title" class="col-form-label">title:</label>
                        <input type="text" class="form-control" id="data-title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">description:</label>
                        <textarea class="form-control" id="data-description" name="description"></textarea>
                    </div>
                    <label for="message-text" class="col-form-label">status:</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="1">done</option>
                        <option value="2">In progress</option>
                        <option value="3">canceled</option>
                    </select>
                    <label for="message-text" class="col-form-label">scheduled :</label>
                    <div class="md-form">

                        <input type="datetime-local" id="data-scheduled" class="form-control"
                               name="scheduled_at"
                               placeholder="Now">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--modal create-->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">add new task </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./create" method="post">
                    <div class="mb-3">
                        <label for="data-title" class="col-form-label">title:</label>
                        <input type="text" class="form-control" id="data-title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">description:</label>
                        <textarea class="form-control" id="data-description" name="description"></textarea>
                    </div>
                    <label for="message-text" class="col-form-label">status:</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="1">done</option>
                        <option value="2">In progress</option>
                        <option value="3">canceled</option>
                    </select>
                    <label for="message-text" class="col-form-label">scheduled :</label>
                    <div class="md-form">
                        <input type="datetime-local" id="manual-operations-input" class="form-control"
                               name="scheduled_at"
                               placeholder="Now">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/64d58efce2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    function editItem(value) {
        $('#data-title').val(value.title)
        $('#data-description').val(value.description)
        $('#data-scheduled').val(value.scheduled_at.replace(' ', 'T'))
        $('#data-id').val(value.id)
        $('.data-id').val(value.id)
    }

</script>
</body>
</html>
