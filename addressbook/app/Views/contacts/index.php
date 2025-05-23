<!DOCTYPE html>
<html>
<head>
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Address Book</h2>
    <a href="/contacts/create" class="btn btn-success mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Location</th><th>Job Position</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $row): ?>
            <tr>
                <td><?= esc($row['name']) ?></td>
                <td><?= esc($row['email']) ?></td>
                <td><?= esc($row['phone']) ?></td>
                <td><?= esc($row['address']) ?></td>
                <td><?= esc($row['location']) ?></td>
                <td><?= esc($row['job_position']) ?></td>
                <td>
                    <a href="/contacts/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/contacts/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
