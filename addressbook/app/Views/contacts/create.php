<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Contact</h4>
        </div>
        <div class="card-body">
            <form method="post" action="/contacts/store">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Employee Name</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="John Doe">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="john@example.com">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" required placeholder="+91 9876543210">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="3" required placeholder="123 Main St, City, Country"></textarea>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <select name="location" id="location" class="form-select" required>
                        <option value="" disabled selected>Select a location</option>
                        <option value="New York">New York</option>
                        <option value="Delhi">Delhi</option>
                        <option value="London">London</option>
                        <option value="Berlin">Berlin</option>
                        <option value="Tokyo">Tokyo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="job_position" class="form-label">Job Position</label>
                    <input type="text" name="job_position" id="job_position" class="form-control" required placeholder="Software Engineer">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Save Contact</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
