<?php

/*
 *
 *
 *
 * */
function add_new_task($title, $description, $status, $scheduled_at, $user_id)
{
    global $conn;
    $sql = "INSERT INTO todoes (user_id, title, description, status, scheduled_at) VALUE (:user_id, :title, :description, :status, :scheduled_at)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'title' => $title,
        'description' => $description,
        'status' => $status,
        'scheduled_at' => $scheduled_at,
        'user_id' => $user_id
    ]);
    return $stmt->rowCount();
}

function edit_task($id, $title, $description, $status, $scheduled_at)
{
    global $conn;
    $sql = "UPDATE `todoes` SET `id`= :id,`title`= :title,`description`= :description,`status`= :status,`scheduled_at`= :scheduled_at WHERE `id` = :id ";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'title' => $title,
        'description' => $description,
        'status' => $status,
        'scheduled_at' => $scheduled_at,
        'id' => $id
    ]);
    return $stmt->rowCount();
}

/*
 * get all tasks list
 * return void
 */
function get_all_task()
{
    global $conn;
    $sql = "SELECT * FROM todoes WHERE status != 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);

}

/*
 *
 *
 *
 */
function search_task($query)
{
    global $conn;
    $sql = "SELECT * FROM todoes WHERE status != 4 and title LIKE :query";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'query' => "%$query%"
    ]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

/*
 *
 *
 */
function delete_task($id)
{
    global $conn;
    $sql = "UPDATE `todoes` SET `status`='4' WHERE `id`=:id and `status`!= 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);

    return $stmt->rowCount();
}

/*
 *
 *
 *
 */
function completed_task($id)
{
    global $conn;
    $sql = "UPDATE `todoes` SET `status`='1' WHERE `id`=:id and `status`!= 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);

    return $stmt->rowCount();
}


