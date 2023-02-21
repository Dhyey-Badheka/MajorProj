<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/resume.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome Student,</h1>
        <div class="row m-b-20">
            <div class="col-sm-5">
                <div class="p-5 bg-light" style="margin-top: 30px;text-align:center">
                    <h2 class="mb-3 he">Primary Resume</h2>
                    <div class="ins">
                        <span>The Primary resume will be created
                            with the data submitted by
                            student from “Your Profile” tab.</span>
                    </div>
                    <button type="button" class="btn btn-success">View Resume</button>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="p-5 bg-light" style="margin-top: 30px;text-align:center">
                    <h2 class="mb-3 he">Secondary Resume</h2>
                    <div class="ins">
                        <span>The secondary resume will be
                            the one which is created by
                            you and you can upload and view it.</span>
                    </div>
                    <button type="button" class="btn btn-primary">Upload Resume</button>
                    <button type="button" class="btn btn-success">View Resume</button>
                </div>
            </div>
        </div>

        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>