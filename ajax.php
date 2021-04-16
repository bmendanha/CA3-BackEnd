<?php
$action = $_REQUEST['action'];

if (!empty($action)) {
    require_once 'includes/member.php';
    $obj = new Member();
}

if ($action == 'adduser' && !empty($_POST)) {
    $mname = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $photo = $_FILES['photo'];
    $memberId = (!empty($_POST['userid'])) ? $_POST['userid'] : '';

    // file (photo) upload
    $imagename = '';
    if (!empty($photo['name'])) {
        $imagename = $obj->uploadPhoto($photo);
        $memberData = [
            'mname' => $mname,
            'email' => $email,
            'phone' => $phone,
            'photo' => $imagename,
        ];
    } else {
        $memberData = [
            'mname' => $mname,
            'email' => $email,
            'phone' => $phone,
        ];
    }

    if ($memberId) {
        $obj->update($memberData, $memberId);
    } else {
        $memberId = $obj->add($memberData);
    }

    if (!empty($memberId)) {
        $member = $obj->getRow('id', $memberId);
        echo json_encode($member);
        exit();
    }
}

if ($action == "getusers") {
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 4;
    $start = ($page - 1) * $limit;

    $member= $obj->getRows($start, $limit);
    if (!empty($member)) {
        $memberlist = $member;
    } else {
        $memberlist = [];
    }
    $total = $obj->getCount();
    $memberArr = ['count' => $total, 'member' => $memberlist];
    echo json_encode($memberArr);
    exit();
}

if ($action == "getuser") {
    $memberId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($memberId)) {
        $member = $obj->getRow('id', $memberId);
        echo json_encode($member);
        exit();
    }
}

if ($action == "deleteuser") {
    $memberId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($memberId)) {
        $isDeleted = $obj->deleteRow($memberId);
        if ($isDeleted) {
            $message = ['deleted' => 1];
        } else {
            $message = ['deleted' => 0];
        }
        echo json_encode($message);
        exit();
    }
}

if ($action == 'search') {
    $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
    $results = $obj->searchmember($queryString);
    echo json_encode($results);
    exit();
}
