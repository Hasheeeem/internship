<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Edit Contact</h2>
        <form method="post" action="/contacts/update/<?= $contact['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Employee Name</label>
                <input type="text" class="form-control" name="name" value="<?= esc($contact['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= esc($contact['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" value="<?= esc($contact['phone']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" required><?= esc($contact['address']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <select class="form-control" name="location" required>
                    <option value="New York" <?= $contact['location'] == 'New York' ? 'selected' : '' ?>>New York</option>
                    <option value="Delhi" <?= $contact['location'] == 'Delhi' ? 'selected' : '' ?>>Delhi</option>
                    <option value="London" <?= $contact['location'] == 'London' ? 'selected' : '' ?>>London</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="job_position" class="form-label">Job Position</label>
                <input type="text" class="form-control" name="job_position" value="<?= esc($contact['job_position']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>