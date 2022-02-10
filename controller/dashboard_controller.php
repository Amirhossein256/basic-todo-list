<?php


function index($request)
{
    if (!empty($_GET['s'])) {
        $data = search_task($_GET['s']);
    } else {
        $data = get_all_task();
    }
    view('tmp_dashboard.php', $data);

}

function create($request)
{
    add_new_task($request['title'], $request['description'], $request['status'], $request['scheduled_at'], $_SESSION['user_id']);
    $header = 'Location: ' . BASEURL . "/" . "dashboard/index";
    return header($header);
}

function edit($request)
{
    edit_task($request['id'], $request['title'], $request['description'], $request['status'], $request['scheduled_at']);
    $header = 'Location: ' . BASEURL . "/" . "dashboard/index";
    return header($header);

}

function delete($request)
{
    delete_task($request['delete_item']);
    $header = 'Location: ' . BASEURL . "/" . "dashboard/index";
    return header($header);
}