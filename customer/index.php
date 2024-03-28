<?php
require_once "../common/header.php";

$stmt = $db->prepare("SELECT * FROM upload1 WHERE deleted_at is null");
$stmt->execute();
$upload1s = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!empty($_GET['did'])) {
    $statement = $db->prepare('UPDATE upload1 SET deleted_at=:deleted_at WHERE id=:id');
    $statement->execute([
        'deleted_at' => date('Y-m-d H:i:s'),
        'id' => $_GET['did'],
    ]);
    header("location:index.php");
}
?>


<div class="container">

    <h2>All Customers</h2>
    <div class="form-group mt-2">
        <button class="btn btn-primary "><a href="editView.php" class="text-light">ADD CUSTOMER</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" class="checkbox" name="select_all" id="selectAll">
                </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Qualification</th>
                <th>Image</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($upload1s as $upload1) : ?>

                <td><input type="checkbox" class="ids" name="ids[]" value="<?= $upload1['id']; ?>"></td>
                <td><?= $upload1['first_name']; ?></td>
                <td><?= $upload1['last_name']; ?></td>
                <td><?= $upload1['username']; ?></td>
                <td><?= $upload1['mobile']; ?></td>
                <td><?= $upload1['email']; ?></td>
                <td><?= $upload1['gender']; ?></td>
                <td><?= $upload1['hobbies']; ?></td>
                <td><?= $upload1['qualification']; ?></td>
                <td><img src="../img/<?= $upload1['image']; ?>" alt="<?= $upload1['first_name']; ?>" style="width: 100px;"></td>

                <td>
                    <button class="btn btn-primary"><a href="editView.php?uid=<?= $upload1['id'] ?>" class="text-light">UPDATE</a></button>
                    <button class="btn btn-danger"><a href="index.php?did=<?= $upload1['id'] ?>" onClick="return confirm('Are you relly want to delete the record?');" class="text-light">DELETE</a></button>
                </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once "../common/footer.php"; ?>

<script>
    $(document).on('click', '#selectAll', function() {
        if ($(this).prop("checked")) {
            $(".ids").prop("checked", true);
        } else {
            $(".ids").prop("checked", false);
        }
    })
</script>